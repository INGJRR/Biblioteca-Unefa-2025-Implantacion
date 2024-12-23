<?php
require '../modelo/conexion.php';
// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $cota = $_POST['cota'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $nivel_academico = $_POST['nivel_academico'];
    $fecha_presentacion = $_POST['fecha_presentacion'];
    $carrera = $_POST['carrera']; 
    $fecha_registro = $_POST['fecha_registro'];
    $cantidad = $_POST['cantidad'];
    $linea_investigacion = $_POST['linea_investigacion'];
    $mencion = $_POST['mencion'];
    $metodologia = $_POST['metodologia'];
    $metodo = $_POST['metodo'];
    $tipo = $_POST['tipo'];
    $palabras_claves = $_POST['palabras_claves'];

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // Actualizar la tabla trabajo_inv
    $sql_trabajo_inv = "UPDATE trabajos_investigacion SET titulo=?, autor=?, nivel_academico=?, fecha_presentacion=?, carrera=?, fecha_registro=?, cantidad=?, linea_investigacion=?, mencion=?, metodologia=?, metodo=?, tipo=?, palabras_claves=? WHERE cota=?";
    $stmt_trabajo_inv = $conexion->prepare($sql_trabajo_inv);
    $stmt_trabajo_inv->bind_param("ssssssisssssss", $titulo, $autor, $nivel_academico, $fecha_presentacion, $carrera, $fecha_registro, $cantidad, $linea_investigacion, $mencion, $metodologia, $metodo, $tipo, $palabras_claves, $cota);
    $stmt_trabajo_inv->execute();


    if ($stmt_trabajo_inv->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        echo "Error al actualizar los datos: " . $stmt_trabajo_inv->error;
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../vistafinal/detalle_inv_doc.php?tipo=trabajo_inv&id=$cota"); // Reemplaza con el nombre de tu página
        exit;
    }

    $stmt_trabajo_inv->close();
}
$conexion->close();
?>
