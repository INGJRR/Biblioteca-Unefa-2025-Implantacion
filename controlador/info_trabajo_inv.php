<?php

require "../modelo/conexion.php";

// Vamos a obtener toda la informacion de los libros 
$sql = "SELECT 
    *
from trabajos_investigacion";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $tis = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $tis[] = $row;
    }
} else {
    echo "Error al obtener el número de registros.";
}


$conexion->close();

?>