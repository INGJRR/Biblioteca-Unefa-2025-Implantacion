<?php

// Función para agregar un objeto al array en la sesión
function agregar_objeto_a_sesion($nombre_array, $objeto) {
    if (!isset($_SESSION[$nombre_array])) {
        $_SESSION[$nombre_array] = []; // Crear el array si no existe
    }
    array_push($_SESSION[$nombre_array], $objeto); // Agregar el objeto al array
}

// Función para obtener el array de objetos de la sesión
function obtener_array_de_objetos_de_sesion($nombre_array) {
    if (isset($_SESSION[$nombre_array])) {
        return $_SESSION[$nombre_array];
    } else {
        return []; // Devolver un array vacío si no existe
    }
}

// Función para agregar un objeto a una propiedad específica de un objeto en el array en la sesión
function agregar_objeto_a_propiedad_en_sesion($nombre_array, $nombre_propiedad, $objeto) {
    // Verificar si el array global existe, si no, crearlo vacío
    if (!isset($_SESSION[$nombre_array])) {
        $_SESSION[$nombre_array] = [];
    }
 
    // Verificar si la propiedad existe dentro del array global, si no, crearla con un array vacío
    if (!isset($_SESSION[$nombre_array][$nombre_propiedad])) {
        $_SESSION[$nombre_array][$nombre_propiedad] = [];
    }

    // Agregar el objeto al array dentro de la propiedad
    array_push($_SESSION[$nombre_array][$nombre_propiedad], $objeto);
}

// Función para eliminar el array completo de la sesión
function eliminar_array_de_sesion($nombre_array) {
    // Verificar si el array global existe
    if (isset($_SESSION[$nombre_array])) {
        // Eliminar el array completo
        unset($_SESSION[$nombre_array]);

        return true; // Indica que el array fue eliminado exitosamente
    }

    return false; // Indica que el array no existía o no se pudo eliminar
}

// // Crear un objeto
// $objeto1 = [
//     'inicio' => '10:00:00.1234',
//     'registrar' => '10:05:00.5678',
//     'dbOperaciones' => [
//         'errores' => '00:00:00.0000',
//         'sqldb' => '00:00:00.0000'
//     ]
// ];

?>