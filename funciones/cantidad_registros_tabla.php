<?php

function obtener_cantidad_base_dato($sql, $conexion){

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["cantidad"];
    } else {
        echo "Error al obtener el número de registros.";
    }
}

?>