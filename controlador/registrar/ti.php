<?php

//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
    header('location: ./index.php');
};

require_once ROOT_DIR . '/funciones/funciones.php';

$existe = isset($_SESSION["registroti"]);

$cota = '';
$titulo = '';
$autor = '';
$tutor = '';
$fecha = '';
$carrera = '';
$linea_investigacion = '';
$mencion = '';
$metodologia = '';
$tipo = '';
$palabras_claves = '';
$estilosError = '';
$mensaje = '';

if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cota = $_SESSION["registroti"]->cota ?? '';
    $titulo = $_SESSION['registroti']->titulo ?? '';
    $autor = $_SESSION['registroti']->autor ?? '';
    $tutor = $_SESSION['registroti']->tutor ?? '';
    $fecha = $_SESSION['registroti']->fecha ?? '';
    $carrera = $_SESSION['registroti']->carrera ?? '';
    $tipo = $_SESSION['registroti']->tipo ?? '';

    //datos opcionales 
    $linea_investigacion = $_SESSION['registroti']->linea_investigacion;
    $mencion = $_SESSION['registroti']->mencion;
    $metodologia = $_SESSION['registroti']->metodologia;
    $palabras_claves = $_SESSION['registroti']->palabras_claves;
    $mensaje = $_SESSION['registroti']->mensaje;
}

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require ROOT_DIR . '/modelo/conexion.php';
    //variable que gestiona si encuentra un error en la validacion
    $error = false;
    
    // Recoger los datos del formulario
    $cota = validar_cota($_POST['cota'], $error);
    $titulo = validarSoloLetrasNumeros($_POST['titulo'], $error);
    $autor = validar_nombre($_POST['autor'], $error);
    $tutor = validar_nombre($_POST['tutor'], $error);
    $fecha = validarFecha2($_POST['fecha'], $error);
    $carrera = validar_nombre($_POST['carrera'], $error);
    $tipo = $_POST['tipo'];

    //datos opcionales 
    $linea_investigacion = ($_POST['linea_investigacion'] == '') ? false : validar_nombre($_POST['linea_investigacion'], $error);
    $mencion = ($_POST['mencion'] == '') ? false : validar_nombre($_POST['mencion'], $error);
    $metodologia = ($_POST['metodologia'] == '') ? false : validar_nombre($_POST['metodologia'], $error);
    $palabras_claves = ($_POST['palabras_claves'] == '') ? false : validar_nombre($_POST['palabras_claves'], $error);

    //opcionales
    $nivel_academico = 'Tesis';
    $fecha_registro = date("Y-m-d ");
    $metodo = "";
    $cantidad = 1;



    //verificamos si tenemos creado el objeto ti para evitar cargarlo luego
    if(isset($_SESSION['registroti'])){
        unset($_SESSION['registroti']);
    }

    //validamos que el campo cota este en el formato adecuado para buscar si se envuentra registrado  
    if($cota != ''){
       // Preparar la consulta (protege contra inyecciones SQL)
       $stmt = $conexion->prepare("SELECT * FROM libros WHERE cota = ?");
       $stmt->bind_param("s", $cota);

       // Ejecutar la consulta
       $stmt->execute();

       // Obtener el resultado
       $result = $stmt->get_result();

       // Verificar si se encontró algún registro
       if ($result->num_rows > 0) {
           $error = true;
           $cota = '';
           $datos = 
           $mensaje = "Un libro ya tiene la cota [" . $_POST["cota"] . "]. La cota no puede estar en 2 documento";
       }

       $stmt = $conexion->prepare("SELECT * FROM servicio_comunitario WHERE cota = ?");
       $stmt->bind_param("s", $cota);

       // Ejecutar la consulta
       $stmt->execute();

       // Obtener el resultado
       $result = $stmt->get_result();

       // Verificar si se encontró algún registro
       if ($result->num_rows > 0) {
           $error = true;
           $cota = '';
           $mensaje = "Un Trabajo de servicio comunitario ya tiene la cota [" . $_POST["cota"] . "]. La cota no puede estar en 2 documento";
       }

       $stmt = $conexion->prepare("SELECT * FROM trabajos_investigacion WHERE cota = ?");
       $stmt->bind_param("s", $cota);

       // Ejecutar la consulta
       $stmt->execute();

       // Obtener el resultado
       $result = $stmt->get_result();

       // Verificar si se encontró algún registro
       if ($result->num_rows > 0) {
           $error = true;
           $cota = '';
           $mensaje = "Un Trabajo de investigacion ya tiene la cota [" . $_POST["cota"] . "]. La cota no puede estar en 2 documento";
       }
    }

    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $objeto = new stdClass();

        // Asignar valores a las propiedades del objeto
        $objeto->cota = $cota;
        $objeto->titulo = $titulo;
        $objeto->autor = $autor;
        $objeto->tutor = $tutor;
        $objeto->fecha = $fecha;
        $objeto->carrera = $carrera;
        $objeto->linea_investigacion = $linea_investigacion;
        $objeto->mencion = $mencion;
        $objeto->metodologia = $metodologia;
        $objeto->tipo = $tipo;
        $objeto->palabras_claves = $palabras_claves;
        $objeto->mensaje = $mensaje;

        // Almacenar el objeto en la sesión
        $_SESSION['registroti'] = $objeto;
        header("Location: ./regis_grado.php");
        die();
    }

    // // modificamos la fecha para que no de error 
    // $fecha = $_POST['fecha'] . '-01-01';

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    //registrando el trabajo de investigacion
    $sql_trabajo_inv = "INSERT INTO trabajos_investigacion (titulo, autor, tutor ,nivel_academico, fecha_presentacion, carrera, fecha_registro, cantidad, linea_investigacion, mencion, metodologia, metodo, tipo, palabras_claves, cota) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_trabajo_inv = $conexion->prepare($sql_trabajo_inv);
    $stmt_trabajo_inv->bind_param("sssssssisssssss", $titulo, $autor, $tutor ,$nivel_academico, $fecha, $carrera, $fecha_registro, $cantidad, $linea_investigacion, $mencion, $metodologia, $metodo, $tipo, $palabras_claves, $cota);
    $stmt_trabajo_inv->execute();


    if ($stmt_trabajo_inv->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar trabajo de investigacion: " . $stmt_trabajo_inv->error;
        header("Location: ./regis_grado.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ./grado.php"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_trabajo_inv->close();
    $conexion->close();
}
?>
