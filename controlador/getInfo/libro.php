<?php

// Vamos a obtener toda la informacion de los libros 
$sql = "SELECT 
    *
FROM libros";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $libros = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $libros[] = $row;
    }
} else {
    // echo "Error al obtener el número de registros.";
}


$conexion->close();

?>