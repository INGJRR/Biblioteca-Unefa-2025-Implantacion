<?php
require '../modelo/conexion.php';
// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono']; 
    $email = $_POST['email'];
    $id_carrera = $_POST['carrera'];
    $estado = $_POST['estado'];
    $moroso = $_POST['moroso'];
    $semestre_actual = $_POST['semestre_actual'];
    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    //registrando un nuevo estudiante
    $sql_persona_insert = "INSERT INTO estudiantes (cedula, nombre, apellido, fecha_nacimiento, direccion, telefono, gmail, estado, moroso, semestre_actual, id_carrera) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_persona_insert = $conexion->prepare($sql_persona_insert);
    $stmt_persona_insert->bind_param("issssssiiii", $cedula, $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $email, $estado, $moroso, $semestre_actual, $id_carrera);
    $stmt_persona_insert->execute();


    if ($stmt_persona->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        echo "Error al actualizar los datos: " . $stmt_persona->error;
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../vistafinal/detalle_indv_personal.php?tipo=estudiante&id=$cedula"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_persona->close();
}
$conexion->close();
?>
