<?php

$titulo_one = 'Cota';
$value_two = $row["cota_documento"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Tipo de documento';
$value_two = $row["tipo_documento"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Fecha del prestamos';
$value_two = $row["fecha_prestamo"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Fecha de devolucion';
$value_two = $row["fecha_devolucion"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

?>