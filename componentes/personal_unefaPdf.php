<?php

$titulo_one = 'Nº';
$value_two = $contador;
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Cédula';
$value_two = $personal_unefa["cedula"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Nombre';
$value_two = $personal_unefa["nombre"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Apellido';
$value_two = $personal_unefa["apellido"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Fecha de nacimiento';
$value_two = $personal_unefa["fecha_nacimiento"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Dirección';
$value_two = $personal_unefa["direccion"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Télefono';
$value_two = $personal_unefa["telefono"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Correo Electrónico';
$value_two = $personal_unefa["gmail"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Estado';
$value_two = ($personal_unefa["estado"]) ? 'Activo' : 'Inactivo';
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Moroso';
$value_two = ($personal_unefa["moroso"]) ? 'SI' : 'NO';
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Credito Disponible';
$value_two = $personal_unefa["credito"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';
?>