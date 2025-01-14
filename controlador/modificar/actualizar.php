<?php
// Obtener los parámetros de la URL
echo "Verificadooo";

require '../../modelo/conexion.php';


$id = (int)$_GET['id'];
$tipo = (int)$_GET['tipo'];

// Validación básica de los parámetros (puedes agregar más validaciones según tus necesidades)
if (empty($id) || empty($tipo)) {
    mysqli_close($conexion);
    die("Los parámetros 'id' y 'tipo' son requeridos.");
}

// estaba prestado
if($tipo == 1){
    $tipo = "Devuelto";
}else if($tipo == 2){
    // estaba devuelto
    $tipo = "Prestado";
}else{
    header("Location: ../../prestamo.php");
    mysqli_close($conexion);
    die();
}

// Preparar la consulta SQL (asumiendo que el nuevo estado se almacena en una columna llamada 'estado')
$sql = "UPDATE prestamos SET estado = ? WHERE id = ?";

// Preparar la sentencia
$stmt = mysqli_prepare($conexion, $sql);

// Vincular los parámetros
mysqli_stmt_bind_param($stmt, "si", $tipo, $id);

// Ejecutar la sentencia
if (mysqli_stmt_execute($stmt)) {
    echo "El estado del préstamo ha sido actualizado correctamente.";
    header("Location: ../../prestamo.php");
} else {
    echo "Error al actualizar el estado: " . mysqli_error($conexion);
    header("Location: ../../prestamo.php");
}

// Cerrar la sentencia y la conexión
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>