<?php

//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
    header('location: ./index.php');
};

require_once ROOT_DIR . '/funciones/funciones.php';

$existe = isset($_SESSION["registroServicioComunitario"]);

$cota = '';
$titulo = '';
$autor = '';
$fecha = '';
$tutor = '';
$tutor_comunitario = '';
$lugar = '';
$cantidad = '';
$estilosError = '';
$mensaje = "";
if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cota = $_SESSION["registroServicioComunitario"]->cota ?? '';
    $titulo = $_SESSION['registroServicioComunitario']->titulo ?? '';
    $autor = $_SESSION['registroServicioComunitario']->autor ?? '';
    $fecha = $_SESSION['registroServicioComunitario']->fecha ?? '';
    $tutor = $_SESSION['registroServicioComunitario']->tutor ?? '';
    $tutor_comunitario = $_SESSION['registroServicioComunitario']->tutor_comunitario ?? '';
    $lugar = $_SESSION['registroServicioComunitario']->lugar ?? '';
    $cantidad = $_SESSION['registroServicioComunitario']->cantidad ?? '';
    $mensaje = $_SESSION['registroServicioComunitario']->mensaje;
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
    $lugar = validarSoloLetrasNumeros($_POST['lugar'], $error);
    $cantidad = esNumeroValido($_POST['cantidad'], 1000, $error);
    $fecha_registro = date("Y-m-d ");

    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if (isset($_SESSION['registroServicioComunitario'])) {
        unset($_SESSION['registroServicioComunitario']);
    }

    //validamos que el campo cota este en el formato adecuado para buscar si se envuentra registrado  
    require './Codigo/VerificarLibro.php';

    if ($error) {
        // Crear un nuevo objeto de tipo stdClass
        $sc = new stdClass();

        // Asignar valores a las propiedades del objeto
        $sc->cota = $cota;
        $sc->titulo = $titulo;
        $sc->autor = $autor;
        $sc->fecha = $fecha;
        $sc->tutor = $tutor;
        $sc->tutor_comunitario = $tutor_comunitario;
        $sc->lugar = $lugar;
        $sc->cantidad = $cantidad;
        $sc->mensaje = $mensaje;

        // Almacenar el objeto en la sesión
        $_SESSION['registroServicioComunitario'] = $sc;
        header("Location: ./regis_comu.php");
        die();
    }

    // // modificamos la fecha para que no de error 
    // $fecha = $_POST['fecha'] . '-01-01';

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();
 
    // registramos libros
    $sql_libro = "INSERT INTO servicio_comunitario (cota, titulo, autor, tutor, tutor_comunitario, fecha_registro, fecha_presentacion, cantidad, lugar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("sssssssis", $cota, $titulo, $autor, $tutor, $tutor_comunitario, $fecha_registro, $fecha, $cantidad, $lugar);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_libro->error;
        header("Location: ./regis_comu.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ./comunitario.php"); // Reemplaza con el nombre de tu página
    }

    $stmt_libro->close();
    $conexion->close();
}
