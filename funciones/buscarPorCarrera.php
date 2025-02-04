<?php
function buscarElementosPorCarrera($array, $carrera) {
    $resultado = []; // Inicializa un array vacío para almacenar los resultados
  
    foreach ($array as $elemento) {
      if (isset($elemento['carrera']) && $elemento['carrera'] === $carrera) {
        $resultado[] = $elemento; // Agrega el elemento al array de resultados
      }
    }
  
    return $resultado;
  }
?>