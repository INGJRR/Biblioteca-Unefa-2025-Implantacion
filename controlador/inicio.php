<?php


require "../modelo/conexion.php";

//obtenemos el numero total de documento prestados, es decir ausente
$sql = "SELECT COUNT(*) AS prestados
FROM prestamos
WHERE estado = 'Prestado'";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $prestados = $row["prestados"];
} else {
    echo "Error al obtener el número de registros.";
}

// obtenemos el numero total de libros
$sql = "SELECT 
SUM(l.cantidad) AS total_libro
FROM 
libros l";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_libro = $row["total_libro"];
} else {
    echo "Error al obtener el número de registros.";
}


//obtenemos el numero total de trabajo de investigacion

$sql = "SELECT 
SUM(ti.cantidad) AS total_ti
FROM 
trabajos_investigacion ti";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total = $row["total_ti"];
} else {
    echo "Error al obtener el número de registros.";
}


//obtenemos los libros prestados para mostrarlo como lista de ausentes

$sql = "SELECT * FROM prestamos p
INNER JOIN libros l ON l.cota = p.cota_documento
where p.estado = 'Prestado' and p.tipo_documento = 'Libro'";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $li_prestado = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $li_prestado[] = $row;
    }
} else {
    echo "Error al obtener el número de registros.";
}


$conexion->close();


?>