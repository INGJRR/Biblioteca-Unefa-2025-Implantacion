<?php
    require ROOT_DIR . '/modelo/conexion.php';
    $carreras = array();
// Vamos a obtener toda la informacion de las carreras 
$sql = "SELECT 
    *
FROM carreras where activo = 1";
 
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // $carreras = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $carreras[] = $row;
    }
} else {
    // echo "Error al obtener las carreras existentes";
}


$conexion->close();

?>