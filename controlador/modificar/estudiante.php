<?php
session_start();
require_once ROOT_DIR . '/funciones/funciones.php';
require_once ROOT_DIR . '/controlador/getInfo/carreras.php'; // se cierra sola la conexion

require ROOT_DIR . '/modelo/conexion.php';
require_once ROOT_DIR . '/funciones/info_idv_db.php';


//sirve para cuando regresemos
$nombreSesion = "modificarEs";
$ruta = '../admin-inicio.php';


$cedula = '';
$nombre = '';
$apellido = '';
$fecha_nacimiento = '2045-01-01';
$direccion = '';
$telefono = '';
$email = '';
$id_carrera = '';
$semestre_actual = '';
$estilosError = '';


if(isset($_SESSION["modificarEs"])){
    // si existe entonces cargamos los datos
    $estilosError = "style=\"border: 2px solid red;\"";
    $cedula = $_SESSION["modificarEs"]->cedula ?? '';
    $nombre = $_SESSION['modificarEs']->nombre ?? '';
    $apellido = $_SESSION['modificarEs']->apellido ?? '';
    $fecha_nacimiento = $_SESSION['modificarEs']->fecha_nacimiento ?? '2045-01-01';
    $direccion = $_SESSION['modificarEs']->direccion ?? '';
    $telefono = $_SESSION['modificarEs']->telefono ?? '';
    $email = $_SESSION['modificarEs']->email ?? '';
    $id_carrera = $_SESSION['modificarEs']->id_carrera ?? '';
    $semestre_actual = $_SESSION['modificarEs']->semestre_actual ?? '';
}else{
    // no hemos cargado los datos de la cota, entonces lo cargaremos
    if (isset($_GET['cedula'])) {
        $cedula = $_GET['cedula'];
        require ROOT_DIR . '/modelo/conexion.php';
        $sql = "SELECT 
        *
        FROM estudiantes WHERE cedula = '$cedula'";
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
            $id_carrera = $info["id_carrera"];
            $semestre_actual = $info["semestre_actual"];
        }else{
            //la consulta fallo
        }
    } else {
        // echo "No se ha ingresado una cota.";
    }
}



// Si el formulario ha sido enviado, aqui controlamos el modificar 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //abrimos una conexion para manejar la base de dato
    require ROOT_DIR . '/modelo/conexion.php';
 
    // variable para controlar si surge un error
    $error = false;
    // Recoger los datos del formulario
    $cedula = validar_y_convertir_numero_cedula($cedula, $error);
    $nombre = validar_nombre($_POST['nombre'], $error);
    $apellido = validar_nombre($_POST['apellido'], $error);
    $fecha_nacimiento = validarFecha2($_POST['fecha_nacimiento'], $error);
    $direccion = validarSoloLetrasNumeros($_POST['direccion'], $error);
    $telefono = esNumeroValido($_POST['telefono'], 0,$error); 
    $email = validarEmail($_POST['email'], $error);
    $id_carrera = esIdValidoCarrera($_POST['carrera'], $carreras ,$error);
    $semestre_actual = esNumeroValido($_POST['semestre'], 9, $error);
    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    //verificamos si tenemos creado el objeto ti para evitar cargarlo luego
    if(isset($_SESSION['modificarEs'])){
        unset($_SESSION['modifcarEs']);
    }

     //validamos que el campo cedula este en el formato adecuado para buscar si se envuentra registrado  
     if($cedula != ''){
        // Preparar la consulta (protege contra inyecciones SQL)
        $stmt = $conexion->prepare("SELECT * FROM estudiantes WHERE cedula = ?");
        $stmt->bind_param("s", $cedula);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

       // Verificar si se encontró algún registro
       if ($result->num_rows > 0) {
        //comprobamos si el unico resultado pertenece a la cota 
        $comprobacion = $result->fetch_assoc();
        
            if($comprobacion["cedula"] == $cedula){
                //quiere decir que la unica coincidencia la tenemos con la CEDULA A ACTUALIZAR

            }else{
                // esa cota se encuentra ocupada, no podemos actualizar
                $error = true;
                $cedula = 'NO HAY COINCIDENCIA';
            }
        }
    }

    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $objeto = new stdClass();

        // Asignar valores a las propiedades del objeto
        $objeto->cedula = $cedula;
        $objeto->nombre = $nombre;
        $objeto->apellido = $apellido;
        $objeto->fecha_nacimiento = $fecha_nacimiento;
        $objeto->direccion = $direccion;
        $objeto->telefono = $telefono;
        $objeto->email = $email;
        $objeto->id_carrera = $id_carrera;
        $objeto->semestre_actual = $semestre_actual;

        // Almacenar el objeto en la sesión
        $_SESSION['modificarEs'] = $objeto;
        header("Location: ./estudiante.php");
        die();
    }

    //modificando al estudiante
    $sql_update_persona = "UPDATE estudiantes SET nombre = ?, apellido = ?, fecha_nacimiento = ?, direccion = ?, telefono = ?, gmail = ?, semestre_actual = ?, id_carrera = ? WHERE cedula = ?";
    $stmt_update_persona = $conexion->prepare($sql_update_persona);
    $stmt_update_persona->bind_param("ssssssiii", $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $email, $semestre_actual, $id_carrera, $cedula);
    
    $stmt_update_persona->execute();


    if ($stmt_update_persona->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al actualizar los datos: " . $stmt_persona->error;
        header("Location: ./admin-inicio.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../todos_estudiantes_ver.php?buscar=$cedula"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_update_persona->close();
    $conexion->close();
}

?>
