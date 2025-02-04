<?php

//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
    header('location: ./index.php');
};

require_once ROOT_DIR . '/funciones/funciones.php';

$existe = isset($_SESSION["registroLibro"]);

$cota = '';
$titulo = '';
$autor = '';
$fecha = '';
$carrera = '';
$cantidad = '';
$editorial = '';
$estilosError = '';
$mensaje = "";

if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cota = $_SESSION['registroLibro']->cota ?? '';
    $titulo = $_SESSION['registroLibro']->titulo ?? '';
    $autor = $_SESSION['registroLibro']->autor ?? '';
    $fecha = $_SESSION['registroLibro']->fecha ?? '';
    $carrera = $_SESSION['registroLibro']->carrera ?? '';
    $cantidad = $_SESSION['registroLibro']->cantidad ?? '';
    $editorial = $_SESSION['registroLibro']->editorial ?? '';
    $mensaje = $_SESSION['registroLibro']->mensaje ?? '';
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
    $carrera = validar_nombre($_POST['carrera'], $error); 
    $cantidad = esNumeroValido($_POST['cantidad'], 1000, $error);
    $editorial = validarSoloLetrasNumeros($_POST['editorial'],$error);

    $fecha_registro = date("Y-m-d ");;
    $tipo_libro = "Libro";

    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if(isset($_SESSION['registroLibro'])){
        unset($_SESSION['registroLibro']);
    }

    require './Codigo/VerificarLibro.php';

    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $libro = new stdClass();

        // Asignar valores a las propiedades del objeto
        $libro->cota = $cota;
        $libro->titulo = $titulo;
        $libro->autor = $autor;
        $libro->fecha = $fecha;
        $libro->carrera = $carrera;
        $libro->cantidad = $cantidad;
        $libro->editorial = $editorial;
        $libro->mensaje = $mensaje;

        // Almacenar el objeto en la sesión
        $_SESSION['registroLibro'] = $libro;
        header("Location: ./regis_libro.php");
        die();
    }

    // modificamos la fecha para que no de error 
    // $fecha = $_POST['fecha'] . '-01-01';

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // registramos libros
    $sql_libro = "INSERT INTO libros (cota, titulo, autor, tipo_libro, fecha, carrera, fecha_registro, cantidad, editorial) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("sssssssis",$cota, $titulo, $autor, $tipo_libro, $fecha, $carrera, $fecha_registro, $cantidad, $editorial);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_libro->error;
        header("Location: ./regis_libro.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ./ver_libro.php"); // Reemplaza con el nombre de tu página
    }

    $stmt_libro->close();
    $conexion->close();
}
?>
