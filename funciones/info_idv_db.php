<?php

function info_idv_db($sql,$conexion){
    // Vamos a obtener toda la info de un libro en particular  
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        // echo "Error al obtener el número de registros.";
        return '';
    }
}
?>