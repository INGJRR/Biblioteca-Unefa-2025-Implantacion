<?php
date_default_timezone_set('America/Caracas');
//proteccion de rutas
session_start();

function validarFecha($fecha) {
    try {
        $fechaObj = new DateTime($fecha);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function calcularFechaDevolucion($fecha_prestamo, $dias_agregar) {
    // Validar que la fecha de préstamo sea válida
    if (!validarFecha($fecha_prestamo)) {
        return "Fecha de préstamo inválida";
    }

    $fecha_devolucion = date('Y-m-d', strtotime("+$dias_agregar days", strtotime($fecha_prestamo)));
    return $fecha_devolucion;
}

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
    header('location: ./index.php');
};

require_once ROOT_DIR . '/funciones/funciones.php';

$existe = isset($_SESSION["registroPrestamo"]);

$cota = '';
$cedula = '';
$estilosError = '';

if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cota = $_SESSION["registroPrestamo"]->cota ?? '';
    $cedula = $_SESSION['registroPrestamo']->cedula ?? '';
}

if(!empty($_GET['cota'])){
    //cargamos la cota
    $cota = $_GET['cota'];
}

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //conexion con la base de dato
    require ROOT_DIR . '/modelo/conexion.php';
    //en caso de que ocurra un error 
    $error = false;
    // Recoger los datos del formulario
    $cota = validar_cota($_POST['cota'], $error);
    $cedula = validar_y_convertir_numero($_POST['cedula'], $error);

    $fecha_prestamo = date("Y-m-d");
    $dias_a_agregar = 5;
    $fecha_devolucion = calcularFechaDevolucion($fecha_prestamo, $dias_a_agregar);
    $tipo_libro = "Libro";
    $estado = "Prestado";
    $usuario = $_SESSION['usuario'];

    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if(isset($_SESSION['registroPrestamo'])){
        unset($_SESSION['registroPrestamo']);
    }

    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $libro = new stdClass();

        // Asignar valores a las propiedades del objeto
        $libro->cota = $cota;
        $libro->cedula = $cedula;

        // Almacenar el objeto en la sesión
        $_SESSION['registroPrestamo'] = $libro;
        header("Location: ./regis_prestamo.php");
        die();
    }

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // registramos libros
    $sql_libro = "INSERT INTO prestamos (cedula_persona, cota_documento, fecha_prestamo, fecha_devolucion, estado, usuario_registro) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("isssss", $cedula, $cota, $fecha_prestamo, $fecha_devolucion, $estado, $usuario);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_libro->error;
        header("Location: ./regis_prestamo.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ./prestamo.php"); // Reemplaza con el nombre de tu página
    }

    $stmt_libro->close();
    $conexion->close();
}
?>
