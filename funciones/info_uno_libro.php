<?php

function info_uno_libro($cota,$conexion){
    // Vamos a obtener toda la info de un libro en particular  
    $sql = "SELECT 
    *
    FROM libros WHERE cota = '$cota'";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $libro = $result->fetch_assoc();
        return $libro;
    } else {
        // echo "Error al obtener el número de registros.";
        return '';
    }
}
?>