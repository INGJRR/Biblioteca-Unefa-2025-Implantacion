<?php

$titulo_one = 'Nº';
$value_two = $contador;
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Cédula';
$value_two = $estudiante["cedula"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Nombre';
$value_two = $estudiante["nombre"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Apellido';
$value_two = $estudiante["apellido"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Fecha de nacimiento';
$value_two = $estudiante["fecha_nacimiento"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Dirección';
$value_two = $estudiante["direccion"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Teléfono';
$value_two = $estudiante["telefono"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Correo Electrónico';
$value_two = $estudiante["gmail"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Estado';
$value_two = $estudiante["estado"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Moroso';
$value_two = ($estudiante["moroso"]) ? 'SI' : 'NO';
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Semestre';
$value_two = $estudiante["semestre_actual"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Credito Disponible';
$value_two = $estudiante["credito"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';
?>