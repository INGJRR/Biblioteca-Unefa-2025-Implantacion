<?php

//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
    header('location: ./index.php');
};

require_once ROOT_DIR . '/funciones/funciones.php';



$existe = isset($_SESSION["registroPersonalUnefa"]);

$cedula = '';
$nombre = '';
$apellido = '';
$fecha_nacimiento = '2045-01-01';
$direccion = '';
$telefono = '';
$email = '';
$categoria = '';
$estilosError = '';
$mensaje = '';

if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cedula = $_SESSION["registroPersonalUnefa"]->cedula ?? '';
    $nombre = $_SESSION['registroPersonalUnefa']->nombre ?? '';
    $apellido = $_SESSION['registroPersonalUnefa']->apellido ?? '';
    $fecha_nacimiento = $_SESSION['registroPersonalUnefa']->fecha_nacimiento ?? '2045-01-01';
    $direccion = $_SESSION['registroPersonalUnefa']->direccion ?? '';
    $telefono = $_SESSION['registroPersonalUnefa']->telefono ?? '';
    $email = $_SESSION['registroPersonalUnefa']->email ?? '';
    $categoria = $_SESSION['registroPersonalUnefa']->categoria ?? '';
    $mensaje = $_SESSION['registroPersonalUnefa']->mensaje;
}

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require ROOT_DIR . '/modelo/conexion.php';
    //para controlar en caso que ocurra un error
    $error = false;
    // Obtener los datos del formulario para validarlo y ver si los formatos estan correctos
    $cedula = validar_y_convertir_numero_cedula($_POST["cedula"], $error);
    $nombre = validar_nombre($_POST['nombre'], $error);
    $apellido = validar_nombre($_POST['apellido'], $error);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = validarSoloLetrasNumeros($_POST['direccion'], $error);
    $telefono = validarNumeroTelefono($_POST['telefono'],$error);
    $email = validarEmail($_POST['email'], $error, $mensaje);
    $categoria = esNumeroValido($_POST['categoria'], 2 ,$error);

    //verificamos si tenemos creado el objeto con datos del registro para evitar cargarlo luego
    if(isset($_SESSION['registroPersonalUnefa'])){
        unset($_SESSION['registroPersonalUnefa']);
    }

    //validamos que el campo cedula sea numerico si es asi buscamos la cedula 
    if($cedula != ''){
        // Preparar la consulta (protege contra inyecciones SQL)
        $stmt = $conexion->prepare("SELECT * FROM obreros WHERE cedula = ?");
        $stmt->bind_param("i", $cedula);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Verificar si se encontró algún registro
        if ($result->num_rows > 0) {
            $error = true;
            $mensaje = "Ya una persona tiene cedula [" . $cedula ."] en Personal Administativo";
            $cedula = '';
            
        }
        // Preparar la consulta (protege contra inyecciones SQL)
        $stmt = $conexion->prepare("SELECT * FROM profesores WHERE cedula = ?");
        $stmt->bind_param("i", $cedula);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Verificar si se encontró algún registro
        if ($result->num_rows > 0) {
            $error = true;
            $mensaje = "Ya una persona tiene la cedula [" . $cedula. "] en Personal Docente";
            $cedula = '';
        }
    }

    if($error){
        $usuario = new stdClass();
        // Crear un objeto stdClass con los datos del usuario
        $usuario = new stdClass();
        $usuario->cedula = $cedula;
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->fecha_nacimiento = $fecha_nacimiento;
        $usuario->direccion = $direccion;
        $usuario->telefono = $telefono;
        $usuario->email = $email;
        $usuario->categoria = $categoria;
        $usuario->mensaje = $mensaje;

        // Almacenar el objeto en la sesión
        $_SESSION['registroPersonalUnefa'] = $usuario;
        header("Location: ./regis_pero.php");
        die();
    }

    $estado = '1';
    $moroso = '0';
    
    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    $sql_persona_insert = null;
    $stmt_persona_insert = null;

    if($categoria == '1'){
        // registramos al profesor
        $sql_persona_insert = "INSERT INTO profesores (cedula, nombre, apellido, fecha_nacimiento, direccion, telefono, gmail, estado, moroso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_persona_insert = $conexion->prepare($sql_persona_insert);
        $stmt_persona_insert->bind_param("issssssii", $cedula, $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $email, $estado, $moroso);
        $stmt_persona_insert->execute();
        
        if ($stmt_persona_insert->error) {
            $conexion->rollback(); // Deshacer los cambios en caso de error
            // echo "Error al actualizar los datos: " . $stmt_persona->error;
            header("Location: ./regis_pero.php");
        } else {
            $conexion->commit(); // Confirmar los cambios
            header("Location: ./docente.php"); // Reemplaza para redirigir a la otra pagina
        }
    
        $stmt_persona_insert->close();
        
    }else if($categoria == '2'){
        //registramos al obrero
        $sql_persona_insert = "INSERT INTO obreros (cedula, nombre, apellido, fecha_nacimiento, direccion, telefono, gmail, estado, moroso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_persona_insert = $conexion->prepare($sql_persona_insert);
        $stmt_persona_insert->bind_param("issssssii", $cedula, $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $email, $estado, $moroso);
        $stmt_persona_insert->execute();
    
        if ($stmt_persona_insert->error) {
            $conexion->rollback(); // Deshacer los cambios en caso de error
            // echo "Error al actualizar los datos: " . $stmt_persona->error;
            header("Location: ./regis_pero.php");
        } else {
            $conexion->commit(); // Confirmar los cambios
            header("Location: ./obrero.php"); // Reemplaza para redirigir a la otra pagina
        }
    
        $stmt_persona_insert->close();
    
    }else{
        // la categoria estuvo incorrecta
    }
    $conexion->close();
}
?>
