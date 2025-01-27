<?php

// Vamos a obtener toda la informacion de los prestamos
$sql = "SELECT 
    *
FROM prestamos";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $prestamos = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $prestamos[] = $row;
    }
} else {
    // echo "Error al obtener informacion de los prestamos.";
}
 

$conexion->close();

?>