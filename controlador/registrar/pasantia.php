<?php

//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
    header('location: ./index.php');
};


require_once ROOT_DIR . '/funciones/funciones.php';


$existe = isset($_SESSION["registroPasantia"]);

$cota = '';
$titulo = '';
$autor = '';
$fecha = '';
$tutor = '';
$tutor_comunitario = '';
$lugar = '';
$cantidad = '';
$carrera = '';
$estilosError = '';
$mensaje = "";
 
if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cota = $_SESSION["registroPasantia"]->cota ?? '';
    $titulo = $_SESSION['registroPasantia']->titulo ?? '';
    $autor = $_SESSION['registroPasantia']->autor ?? '';
    $fecha = $_SESSION['registroPasantia']->fecha ?? '';
    $tutor = $_SESSION['registroPasantia']->tutor ?? '';
    $tutor_comunitario = $_SESSION['registroPasantia']->tutor_comunitario ?? '';
    $lugar = $_SESSION['registroPasantia']->lugar ?? '';
    $cantidad = $_SESSION['registroPasantia']->cantidad ?? '';
    $carrera = $_SESSION['registroPasantia']->carrera ?? '';
    $mensaje = $_SESSION['registroPasantia']->mensaje;
}

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //conexion con la base de dato
    require ROOT_DIR . '/modelo/conexion.php';
    //en caso de que ocurra un error 
    $error = false;
    // Recoger los datos del formulario
    $cota = validar_cota($_POST['cota'], $error);
    $titulo = validarSoloLetrasNumeros($_POST['titulo'], $error);
    $autor = validar_nombre($_POST['autor'], $error);
    $fecha = validarFecha2($_POST['fecha'], $error);
    $tutor = validar_nombre($_POST['tutor'], $error); 
    $tutor_comunitario = validar_nombre($_POST['tutor_comunitario'], $error); 
    $lugar = validarSoloLetrasNumeros($_POST['lugar'],$error);
    $cantidad = esNumeroValido($_POST['cantidad'], 1000, $error);
    $carrera = validar_nombre($_POST['carrera'], $error);
    $fecha_registro = date("Y-m-d ");

    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if(isset($_SESSION['registroPasantia'])){
        unset($_SESSION['registroPasantia']);
    }

    //validamos que el campo cota este en el formato adecuado para buscar si se envuentra registrado  
    require './Codigo/VerificarLibro.php';

    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $sc = new stdClass();

        // Asignar valores a las propiedades del objeto
        $sc->cota = $cota;
        $sc->titulo = $titulo;
        $sc->autor = $autor;
        $sc->fecha = $fecha;
        $sc->tutor = $tutor;
        $sc->tutor_comunitario =$tutor_comunitario;
        $sc->lugar = $lugar;
        $sc->cantidad = $cantidad;
        $sc->carrera = $carrera;
        $sc->mensaje = $mensaje;

        // Almacenar el objeto en la sesión
        $_SESSION['registroPasantia'] = $sc;
        header("Location: ./regis_pasantia.php");
        die();
    }

    // // modificamos la fecha para que no de error 
    // $fecha = $_POST['fecha'] . '-01-01';

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();
 
    // registramos libros
    $sql_libro = "INSERT INTO pasantias (cota, titulo, autor, tutor, tutor_comunitario, fecha_registro, fecha_presentacion, cantidad, lugar, carrera) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("sssssssiss",$cota, $titulo, $autor, $tutor, $tutor_comunitario, $fecha_registro, $fecha, $cantidad, $lugar, $carrera);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_libro->error;
        header("Location: ./regis_pasantia.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ./pasantia.php"); // Reemplaza con el nombre de tu página
    }

    $stmt_libro->close();
    $conexion->close();
}
?>
