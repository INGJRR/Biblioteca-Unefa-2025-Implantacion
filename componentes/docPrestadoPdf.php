<?php

$titulo_one = 'Nº';
$value_two = $contador;
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Cédula';
$value_two = $doc_prestado_obj["cedula_persona"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Nombre';
$value_two = $doc_prestado_obj["nombre"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Cota';
$value_two = $doc_prestado_obj["cota_documento"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Titulo';
$value_two = $doc_prestado_obj["titulo_doc"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Prestamo realizado';
$value_two = $doc_prestado_obj["fecha_prestamo"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Prestamo devolución';
$value_two = $doc_prestado_obj["fecha_devolucion"];
require ROOT_DIR . '/Codigo/crear_celda_doble.php';

$titulo_one = 'Estado de devolución';
$value_two = fechaHaPasado($doc_prestado_obj['fecha_devolucion']) ? 'La fecha límite para la devolución ha expirado.' : 'Fecha de devolución aún vigente.';
require ROOT_DIR . '/Codigo/crear_celda_doble.php';



?>