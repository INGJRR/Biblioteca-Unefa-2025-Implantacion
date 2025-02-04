<?php

function fechaHaPasado($fecha) {
    // Obtener la fecha actual
    $fecha_actual = date("Y-m-d");
  
    // Crear objetos DateTime para las fechas
    $fecha_obj = new DateTime($fecha);
    $fecha_actual_obj = new DateTime($fecha_actual);
  
    // Comparar las fechas
    if ($fecha_obj < $fecha_actual_obj) {
      return true; // La fecha ya ha pasado
    } else {
      return false; // La fecha aún no ha pasado
    }
}

?>