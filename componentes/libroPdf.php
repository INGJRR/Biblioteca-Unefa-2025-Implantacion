<?php

$titulo_one = 'Nº';
$value_two = $contador;
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Cota';
$value_two = $libro["cota"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Titulo';
$value_two = $libro["titulo"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Autor';
$value_two = $libro["autor"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Año';
$value_two = $libro["fecha"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';


$titulo_one = 'Area de estudio';
$value_two = $libro["carrera"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';


$titulo_one = 'Ejemplares';
$value_two = $libro["cantidad"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Editorial';
$value_two = $libro["editorial"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

?>