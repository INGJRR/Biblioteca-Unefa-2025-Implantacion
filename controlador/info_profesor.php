<?php

require "../modelo/conexion.php";

// Vamos a obtener toda la informacion de los estudiante
$sql = "SELECT 
    *
FROM profesores";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $profesores = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $profesores[] = $row;
    }
} else {
    echo "Error al obtener la informacion de los estudiantes";
}

$conexion->close();

?>