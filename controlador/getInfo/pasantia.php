<?php

// Vamos a obtener toda la informacion de los servicio comunitarios 
$sql = "SELECT 
    *
FROM pasantias";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $pasantias = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $pasantias[] = $row;
    }
} else {
    // echo "Error al obtener informacion de los servicios comunitario";
}


$conexion->close();

?>