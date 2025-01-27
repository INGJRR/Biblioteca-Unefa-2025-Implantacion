<?php


//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
    header('location: ./index.php');
};

require_once ROOT_DIR . '/funciones/funciones.php';

$existe = isset($_SESSION["registroEstudiante"]);

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
$mensaje = '';

if ($existe) {
    $estilosError = "style=\"border: 2px solid red;\"";
    $cedula = $_SESSION["registroEstudiante"]->cedula ?? '';
    $nombre = $_SESSION['registroEstudiante']->nombre ?? '';
    $apellido = $_SESSION['registroEstudiante']->apellido ?? '';
    $fecha_nacimiento = $_SESSION['registroEstudiante']->fecha_nacimiento ?? '2045-01-01';
    $direccion = $_SESSION['registroEstudiante']->direccion ?? '';
    $telefono = $_SESSION['registroEstudiante']->telefono ?? '';
    $email = $_SESSION['registroEstudiante']->email ?? '';
    $id_carrera = $_SESSION['registroEstudiante']->id_carrera ?? '';
    $semestre_actual = $_SESSION['registroEstudiante']->semestre_actual ?? '';
    $mensaje = $_SESSION['registroEstudiante']->mensaje;
}

   
// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //conexion con la base de dato
    require ROOT_DIR . '/modelo/conexion.php';
    // variable para controlar si surge un error
    $error = false;
    // Recoger los datos del formulario
    $cedula = validar_y_convertir_numero_cedula($_POST['cedula'], $error);
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

    //datos por defecto 
    $estado = 1;
    $moroso = 0;

    //verificamos si tenemos creado el objeto ti para evitar cargarlo luego
    if(isset($_SESSION['registroEstudiante'])){
        unset($_SESSION['registroEstudiante']);
    }

     //validamos que el campo cedula este en el formato adecuado para buscar si se envuentra registrado  
     if($cedula != ''){
        // Preparar la consulta (protege contra inyecciones SQL)
        $stmt = $conexion->prepare("SELECT * FROM estudiantes WHERE cedula = ?");
        $stmt->bind_param("i", $cedula);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Verificar si se encontró algún registro
        if ($result->num_rows > 0) {
            $error = true;
            $mensaje = "Ya hay un estudiante registrado con la cedula [" . $cedula . "]. ";
            $cedula = '';
            
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
        $objeto->mensaje = $mensaje;

        // Almacenar el objeto en la sesión
        $_SESSION['registroEstudiante'] = $objeto;
        header("Location: ./regis_estu.php");
        die();
    }

    //registrando un nuevo estudiante
    $sql_persona_insert = "INSERT INTO estudiantes (cedula, nombre, apellido, fecha_nacimiento, direccion, telefono, gmail, estado, moroso, semestre_actual, id_carrera) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_persona_insert = $conexion->prepare($sql_persona_insert);
    $stmt_persona_insert->bind_param("issssssiiii", $cedula, $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $email, $estado, $moroso, $semestre_actual, $id_carrera);
    $stmt_persona_insert->execute();


    if ($stmt_persona->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al actualizar los datos: " . $stmt_persona->error;
        header("Location: ./regis_estu.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ./admin-inicio.php"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_persona->close();
    $conexion->close();
}
?>
