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

    // registramos libros
    $sql_libro = "INSERT INTO libros (cota, titulo, autor, tipo_libro, fecha, carrera, fecha_registro, cantidad, editorial) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("sssssssis",$cota, $titulo, $autor, $tipo_libro, $fecha, $carrera, $fecha_registro, $cantidad, $editorial);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        echo "Error al registrar libro: " . $stmt_libro->error;
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../vistafinal/detalle_inv_doc.php?tipo=libro&id=$cota"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_libro->close();
}
$conexion->close();
?>
