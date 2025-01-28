<?php

$sql = "SELECT titulo, autor, cota, cantidad, 'Libro' as tipo FROM libros
        UNION ALL
        SELECT titulo, autor, cota, cantidad, 'Servicio comunitario' as tipo FROM servicio_comunitario
        UNION ALL
        SELECT titulo, autor, cota, cantidad, 'Pasantia' as tipo FROM pasantias
        UNION ALL
        SELECT titulo, autor, cota, cantidad, 'Trabajo de investigacion' as tipo FROM trabajos_investigacion;";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $docs = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $docs[] = $row;
    }
} else {
    // echo "Error al obtener el número de registros.";
}


$conexion->close();

?>