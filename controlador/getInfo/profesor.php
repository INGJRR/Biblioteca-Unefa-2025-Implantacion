<?php

// Vamos a obtener toda la informacion de los profesores
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
    // echo "No hay informacion de los estudiantes para mostrar";
}

$conexion->close();

?>