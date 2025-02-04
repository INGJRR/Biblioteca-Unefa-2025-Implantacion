<?php
date_default_timezone_set('America/Caracas');

//proteccion de rutas
session_start();
require_once ROOT_DIR . '/funciones/funciones.php';

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


$existe = isset($_SESSION["registroPrestamo"]);

$cota = '';
$cedula = '';
$estilosError = '';
$mensajeDoc = '';
$mensajePer = '';

if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cota = $_SESSION["registroPrestamo"]->cota ?? '';
    $cedula = $_SESSION['registroPrestamo']->cedula ?? '';
    $mensajeDoc = $_SESSION['registroPrestamo']->mensajeDoc;
    $mensajePer = $_SESSION['registroPrestamo']->mensajePer;
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
    $cedula = validar_y_convertir_numero_cedula($_POST['cedula'], $error);

    $fecha_prestamo = date("Y-m-d");
    $dias_a_agregar = 5;
    $fecha_devolucion = calcularFechaDevolucion($fecha_prestamo, $dias_a_agregar);
    $tipo_libro = "";
    $tipo_persona = '';
    $estado = "Prestado";
    $usuario = $_SESSION['usuario'];

    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if(isset($_SESSION['registroPrestamo'])){
        unset($_SESSION['registroPrestamo']);
    }

    //verificamos que la cota exista 
    if($cota != ''){
        $tipo_libro = "Libro";
        $encontrado = false;
        BuscarDocumento($cota, 'libros', $conexion, $encontrado, $mensajeDoc, $tipo_libro);
        if(!$encontrado){
            $mensajeDoc = "100";
            $tipo_libro = "Servicio comunitario";
            BuscarDocumento($cota, 'servicio_comunitario', $conexion, $encontrado, $mensajeDoc, $tipo_libro);
            if(!$encontrado){
                $tipo_libro = "Trabajo de investigacion";
                BuscarDocumento($cota, 'trabajos_investigacion', $conexion, $encontrado, $mensajeDoc, $tipo_libro);
                if(!$encontrado){
                    $tipo_libro = "Pasantia";
                    BuscarDocumento($cota, 'pasantias', $conexion, $encontrado, $mensajeDoc, $tipo_libro);
                }
            }
        }
        if(!$encontrado){
            // $mensajeDoc = "El documento con cota [" . $cota . "] no se encuentra registrado en el sistema.";
            $cota = '';
            $error = true;
        }else if($encontrado && $mensajeDoc != ''){
            $cota = '';
            $error = true;
        }else{
            $mensajeDoc = '';
        }
    }else{
        $mensajeDoc = "";
    }

    //verificamos que la cedula exista y no tenga ningun problema
    if($cedula != ''){
        $tipo_persona = "Estudiante";
        $encontrado = false;
        BuscarPersona($cedula, 'estudiantes', $conexion, $encontrado, $mensajePer, $tipo_persona);
        if(!$encontrado){
            $tipo_persona = "Profesor";
            BuscarPersona($cedula, 'profesores', $conexion, $encontrado, $mensajePer, $tipo_persona);
            if(!$encontrado){
                $tipo_persona = "Obrero";
                BuscarPersona($cedula, 'obreros', $conexion, $encontrado, $mensajePer, $tipo_persona);
            }
        }
        if(!$encontrado){
            $mensajePer = "La persona con cédula [" . $cedula . "] no se encuentra registrada en el sistema.";
            $cedula = '';
            $error = true;
        }else if($encontrado && $mensajePer != ''){
            $cedula = '';
            $error = true;
        }else{
            //no hay error y esta todo bien
            $mensajePer = "";
        }
    }else{
        $mensajePer = '';
    }

    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $libro = new stdClass();

        // Asignar valores a las propiedades del objeto
        $libro->cota = $cota;
        $libro->cedula = $cedula;
        $libro->mensajeDoc = $mensajeDoc;
        $libro->mensajePer = $mensajePer;

        // Almacenar el objeto en la sesión
        $_SESSION['registroPrestamo'] = $libro;
        header("Location: ./regis_prestamo.php");
        die();
    }

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // registramos libros
    $sql_libro = "INSERT INTO prestamos (cedula_persona, cota_documento, fecha_prestamo, fecha_devolucion, estado, usuario_registro,tipo_persona, tipo_documento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("isssssss", $cedula, $cota, $fecha_prestamo, $fecha_devolucion, $estado, $usuario, $tipo_persona, $tipo_libro);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_libro->error;
        header("Location: ./regis_prestamo.php");
    } else {
        $conexion->commit(); // Confirmar los cambios

        $persona_sql = '';
        switch($tipo_persona){
            case 'Estudiante': $persona_sql = "estudiantes";
            break;
            case 'Profesor': $persona_sql = "profesores";
            break;
            case 'Obrero': $persona_sql = "obreros";
            break;
            default: $persona_sql = '';
        }

        $doc_sql = '';
        switch($tipo_libro){
            case 'Libro': $doc_sql = "libros";
            break;
            case 'Servicio comunitario': $doc_sql = "servicio_comunitario";
            break;
            case 'Trabajo de investigacion': $doc_sql = "trabajos_investigacion";
            break;
            default: $doc_sql = '';
        }

        if($persona_sql != '' && $doc_sql != ''){
            // Consulta SQL
            $sql = "UPDATE $persona_sql SET credito = credito - 1 WHERE cedula =    '$cedula'";
            ejecutar_actualizacion($sql, $conexion);
            // Consulta SQL
            $sql = "UPDATE $doc_sql SET cantidad = cantidad - 1 WHERE cota = '$cota'";
            ejecutar_actualizacion($sql, $conexion);
        }

        header("Location: ./prestamo.php"); // Reemplaza con el nombre de tu página
    }

    $stmt_libro->close();
    $conexion->close();
}
?>
