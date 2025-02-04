<?php

$titulo_one = 'Nº';
$value_two = $contador;
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Cota';
$value_two = $ti["cota"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Titulo';
$value_two = $ti["titulo"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Autor';
$value_two = $ti["autor"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Tutor';
$value_two = $ti["tutor"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Año';
$value_two = $ti["fecha_presentacion"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';


$titulo_one = 'Area de estudio';
$value_two = $ti["carrera"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';


$titulo_one = 'Ejemplares';
$value_two = $ti["cantidad"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Linea de investigación';
$value_two = $ti["linea_investigacion"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Mención';
$value_two = $ti["mencion"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Metodología';
$value_two = $ti["metodologia"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Tipo';
$value_two = ($ti["tipo"] == 'post') ? 'Posgrado' : 'Pregrado';
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Palabras claves';
$value_two = $ti["palabras_claves"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

?>