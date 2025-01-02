<?php
    require '../ruta.php';
    session_start();
    
function eliminar_sesion_regresar($nombre, $ruta){
    // verificamos que exista la sesion
    if(isset($_SESSION["$nombre"])){
        unset($_SESSION["$nombre"]);
    }

    header("Location: $ruta");
}


// Verifica si los parámetros están definidos y tienen valor
if (isset($_GET['nombre']) && isset($_GET['ruta']) && !empty($_GET['nombre']) && !empty($_GET['ruta'])) {
    // Obtiene los valores de los parámetros
    $nombre = $_GET['nombre'];
    $ruta = $_GET['ruta'];

    eliminar_sesion_regresar($nombre, $ruta);
} else {
    // echo "Los parámetros 'nombre' o 'redireccion' no están definidos o están vacíos.";
}


?>