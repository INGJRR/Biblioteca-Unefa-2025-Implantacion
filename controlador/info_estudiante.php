<?php

require "../modelo/conexion.php";

// Vamos a obtener toda la informacion de los estudiante
$sql = "SELECT 
    *,
    c.nombre as carrera,
    e.nombre as nombre
FROM estudiantes e
INNER JOIN carreras c ON e.id_carrera = c.id";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $estudiantes = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $estudiantes[] = $row;
    }
} else {
    echo "Error al obtener a los estudiantes";
}

$conexion->close();

?>