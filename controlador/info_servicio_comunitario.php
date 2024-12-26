<?php

// Vamos a obtener toda la informacion de los servicio comunitarios 
$sql = "SELECT 
    *
FROM servicio_comunitario";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $servicios_comunitarios = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $servicios_comunitarios[] = $row;
    }
} else {
    echo "Error al obtener informacion de los servicios comunitario";
}


$conexion->close();

?>