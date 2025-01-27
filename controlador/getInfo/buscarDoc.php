<?php

// Comprobar si el parámetro "nombre" existe
if (isset($_GET['nombre'])) {
    // Si existe, guardar el valor en una variable
    $nombre = $_GET['nombre'];
    echo "El nombre es: " . $nombre;
} else {
    echo "El parámetro 'nombre' no existe.";
}

?>