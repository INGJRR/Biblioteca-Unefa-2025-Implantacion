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
    $estado = $_POST['estado'];
    $moroso = $_POST['moroso'];


    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // Actualizar la tabla profesor
    $sql_persona = "UPDATE profesores SET nombre=?, apellido=?, fecha_nacimiento=?, direccion=?, telefono=?, gmail=?, estado=?, moroso=? WHERE cedula=?";
    $stmt_persona = $conexion->prepare($sql_persona);
    $stmt_persona->bind_param("ssssssiii", $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $email, $estado, $moroso, $cedula);
    $stmt_persona->execute();

    if ($stmt_persona->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        echo "Error al actualizar los datos: " . $stmt_persona->error;
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../vistafinal/detalle_indv_personal.php?tipo=profesor&id=$cedula"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_persona->close();
}
$conexion->close();
?>
