<?php

// Vamos a obtener toda la informacion de los estudiante
$sql = "SELECT *, 'Profesor' tipo FROM profesores
UNION ALL SELECT *, 'Administrativo' AS tipo FROM obreros;";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $personal_une = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $personal_une[] = $row;
    }
} else {
    // echo "Error al obtener la informacion de los estudiantes";
}

$conexion->close();

?> 