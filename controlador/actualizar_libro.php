<?php
require '../modelo/conexion.php';
// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $cota = $_POST['cota'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $tipo_libro = $_POST['tipo_libro'];
    $fecha = $_POST['fecha'];
    $carrera = $_POST['carrera']; 
    $fecha_registro = $_POST['fecha_registro'];
    $cantidad = $_POST['cantidad'];
    $editorial = $_POST['editorial'];

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // Actualizar la tabla libros
    $stmt_libro = "UPDATE libros SET titulo=?, autor=?, tipo_libro=?, fecha=?, carrera=?, fecha_registro=?, cantidad=?, editorial=? WHERE cota=?";
    $stmt_libro = $conexion->prepare($stmt_libro);
    $stmt_libro->bind_param("ssssssiss", $titulo, $autor, $tipo_libro, $fecha, $carrera, $fecha_registro, $cantidad, $editorial, $cota);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        echo "Error al actualizar los datos: " . $stmt_libro->error;
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../vistafinal/detalle_inv_doc.php?tipo=libro&id=$cota"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_libro->close();
}
$conexion->close();
?>
