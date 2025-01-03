<?php

session_start();
require_once ROOT_DIR . '/funciones/funciones.php';
require_once ROOT_DIR . '/funciones/info_idv_db.php';

	
	
//sirve para cuando regresemos
$nombreSesion = "modificarUnefa";
$ruta = '../unefaper.php';

$cedula = '';
$nombre = '';
$apellido = '';
$fecha_nacimiento = '2045-01-01';
$direccion = '';
$telefono = '';
$email = '';
$categoria = '';
$estilosError = '';

if(isset($_SESSION["modificarUnefa"])){
    // si existe entonces cargamos los datos
    $estilosError = "style=\"border: 2px solid red;\"";
    $cedula = $_SESSION["modificarUnefa"]->cedula ?? '';
    $nombre = $_SESSION['modificarUnefa']->nombre ?? '';
    $apellido = $_SESSION['modificarUnefa']->apellido ?? '';
    $fecha_nacimiento = $_SESSION['modificarUnefa']->fecha_nacimiento ?? '2045-01-01';
    $direccion = $_SESSION['modificarUnefa']->direccion ?? '';
    $telefono = $_SESSION['modificarUnefa']->telefono ?? '';
    $email = $_SESSION['modificarUnefa']->email ?? '';
    $categoria = $_SESSION['modificarUnefa']->categoria ?? '';
}else{
    // no hemos cargado los datos de la cota, entonces lo cargaremos
    if (isset($_GET['cedula']) && isset($_GET['tipo']) ) {
        $cedula = $_GET['cedula'];
        $tipo = $_GET['tipo'];
        require ROOT_DIR . '/modelo/conexion.php';

        $sql = "";

        if($tipo == 1){
            $sql = "SELECT 
            *
            FROM profesores WHERE cedula = '$cedula'";
        }else if($tipo == 2){
            $sql = "SELECT 
            *
            FROM obreros WHERE cedula = '$cedula'";
        }else{
            // error en el tipo de personal unefa
            header("Location: " . $ruta);
            die();
        }

        $categoria = $tipo;
        $info = info_idv_db($sql, $conexion);
        $conexion->close();

        //comprobamos si libro tiene un valor 
        if($info != ''){	
            // Guardamos todos los datos en variables
            $cedula = $info["cedula"];
            $nombre = $info["nombre"];
            $apellido = $info["apellido"];
            $fecha_nacimiento = $info["fecha_nacimiento"];
            $direccion = $info["direccion"];
            $telefono = $info["telefono"];
            $email = $info["gmail"];
        }else{
            //la consulta fallo
        }
    } else {
        // echo "No se ha ingresado una cota.";
    }
}

// Si el formulario ha sido enviado para la modificacion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // conexion con la base de dato
    require ROOT_DIR . '/modelo/conexion.php';
    //para controlar en caso que ocurra un error
    $error = false;
    // Obtener los datos del formulario para validarlo y ver si los formatos estan correctos
    $cedula = validar_y_convertir_numero($_POST["cedula"], $error);
    $nombre = validar_nombre($_POST['nombre'], $error);
    $apellido = validar_nombre($_POST['apellido'], $error);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = validarSoloLetrasNumeros($_POST['direccion'], $error);
    $telefono = esNumeroValido($_POST['telefono'], 0 ,$error);
    $email = validarEmail($_POST['email'], $error);
    $categoria = esNumeroValido($_POST['categoria'], 2 ,$error);

    //verificamos si tenemos creado el objeto con datos del registro para evitar cargarlo luego
    if(isset($_SESSION['modificarUnefa'])){
        unset($_SESSION['modificarUnefa']);
    }

    //validamos que el campo cedula sea numerico si es asi buscamos la cedula 
    if($cedula != ''){
        // Preparar la consulta (protege contra inyecciones SQL)
        $tipo = ($categoria == 1) ? 'profesores' : 'obreros';
        $stmt = $conexion->prepare("SELECT * FROM $tipo WHERE cedula = ?");
        $stmt->bind_param("i", $cedula);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

       // Verificar si se encontró algún registro
       if ($result->num_rows > 0) {
        //comprobamos si el unico resultado pertenece a la cota 
        $comprobacion = $result->fetch_assoc();
        
            if($comprobacion["cedula"] == $cedula){
                //quiere decir que la unica coincidencia la tenemos con la cedula del estudiante que estamos modificando

            }else{
                // esa cedula se encuentra ocupada, no podemos actualizar
                $error = true;
                $cedula = '';
            }
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

        // Almacenar el objeto en la sesión
        $_SESSION['modificarUnefa'] = $usuario;
        header("Location: ./personalUnefa.php");
        die();
    } 

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // $sql_persona_insert = null;
    // $stmt_persona_insert = null;

    if($categoria == '1'){
        // actualizamos la tabla de profesor
        $sql_update_persona = "UPDATE profesores SET nombre = ?, apellido = ?, fecha_nacimiento = ?, direccion = ?, telefono = ?, gmail = ? WHERE cedula = ?";
        $stmt_update_persona = $conexion->prepare($sql_update_persona);
        $stmt_update_persona->bind_param("ssssssi", $nombre, $apellido,  $fecha_nacimiento, $direccion, $telefono, $email, $cedula);
        
        $stmt_update_persona->execute();
        
        if ($stmt_update_persona->error) {
            $conexion->rollback(); // Deshacer los cambios en caso de error
            // echo "Error al actualizar los datos: " . $stmt_persona->error;
            header("Location: ./personalUnefa");
        } else {
            $conexion->commit(); // Confirmar los cambios
            header("Location: ../docente.php"); // Reemplaza para redirigir a la otra pagina
        }
    
        $stmt_update_persona->close();
        
    }else if($categoria == '2'){
        // actualizamos la tabla de los obreros
        $sql_update_persona = "UPDATE obreros SET nombre = ?, apellido = ?, fecha_nacimiento = ?, direccion = ?, telefono = ?, gmail = ? WHERE cedula = ?";
        $stmt_update_persona = $conexion->prepare($sql_update_persona);
        $stmt_update_persona->bind_param("ssssssi", $nombre, $apellido,  $fecha_nacimiento, $direccion, $telefono, $email, $cedula);
        
        $stmt_update_persona->execute();
        
        if ($stmt_update_persona->error) {
            $conexion->rollback(); // Deshacer los cambios en caso de error
            // echo "Error al actualizar los datos: " . $stmt_persona->error;
            header("Location: ./personalUnefa");
        } else {
            $conexion->commit(); // Confirmar los cambios
            header("Location: ../obrero.php"); // Reemplaza para redirigir a la otra pagina
        }
    
        $stmt_update_persona->close();
    
    }else{
        // la categoria estuvo incorrecta
    }
    $conexion->close();
}
?>
