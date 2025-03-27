<?php


require "./modelo/conexion.php";

//obtenemos el numero total de documento prestados, es decir ausente
$sql = "SELECT COUNT(*) AS prestados
FROM prestamos
WHERE estado = 'Prestado'";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_prestados = $row["prestados"];
} else {
    $total_prestados = 0;
    echo "Error al obtener la cantidad de doc prestados.";
}

// obtenemos el numero total de libros
$sql = "SELECT COUNT(*) as total_libro FROM libros";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_libro = $row["total_libro"];
} else {
    $total_libro = 0;
    echo "Error al obtener la cantidad de libros.";
}


//obtenemos el numero total de trabajo de investigacion

$sql = "SELECT COUNT(*) as total_ti FROM trabajos_investigacion ti";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_ti = $row["total_ti"];
} else {
    $total_ti = 0;
    echo "Error al obtener la cantidad de trabajos de investigacion.";
}

//obtenemos el numero total de personas registrada en el sistema

// $sql = "SELECT
//     (SELECT COUNT(*) FROM estudiantes) AS total_estudiantes,
//     (SELECT COUNT(*) FROM obreros) AS total_obreros,
//     (SELECT COUNT(*) FROM profesores) AS total_profesores";


// $result = $conexion->query($sql);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $total_personas = $row["total_estudiantes"] + $row["total_obreros"] + $row["total_profesores"] ;
// } else {
//     echo "Error al obtener el número de registros.";
// }


//obtenemos los libros prestados para mostrarlo como lista de ausentes

// $sql = "SELECT * FROM prestamos p
// INNER JOIN libros l ON l.cota = p.cota_documento
// where p.estado = 'Prestado' and p.tipo_documento = 'Libro'";


// $result = $conexion->query($sql);

// if ($result->num_rows > 0) {
//     $li_prestado = array(); // Inicializamos un array vacío para almacenar los resultados
//     while ($row = $result->fetch_assoc()) {
//         $li_prestado[] = $row;
//     }
// } else {
//     echo "Error al obtener el número de registros.";
// }

//obtener la cantidad de ejemplares

$sql = "WITH datos_contados AS (
    SELECT 
        'libros' AS tipo, SUM(cantidad) AS cantidad FROM libros
    UNION ALL
    SELECT 
        'pasantias' AS tipo, SUM(cantidad) AS cantidad FROM pasantias
	UNION ALL
    SELECT 
        'servicio comunitario' AS tipo, SUM(cantidad) AS cantidad FROM servicio_comunitario
	    UNION ALL
    SELECT 
        'trabajos de investigacion' AS tipo, SUM(cantidad) AS cantidad FROM trabajos_investigacion
)
SELECT
    tipo,
    COALESCE(cantidad, 0) AS total
FROM datos_contados";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Inicializamos un array para almacenar las filas
    $ejemplares_doc = [];
    $total_general = 0;
    // Iteramos sobre cada fila del resultado
    while ($row = $result->fetch_assoc()) {
        $ejemplares_doc[] = $row;
        $total_general += $row["total"];
    }

} else {
    $total_general = 0;
    //echo "Error al obtener la cantidad de ejemplares total.";
}

// para obtener el numero total de ejemplares

$sql = "WITH datos_contados AS (
    SELECT 
        'libros' AS tipo, COUNT(*) AS cantidad FROM libros
    UNION ALL
    SELECT 
        'pasantias' AS tipo, COUNT(*) AS cantidad FROM pasantias
    UNION ALL
    SELECT 
        'servicio comunitario' AS tipo, COUNT(*) AS cantidad FROM servicio_comunitario
    UNION ALL
    SELECT 
        'trabajo de investigacion' AS tipo, COUNT(*) AS cantidad FROM trabajos_investigacion
)
SELECT
    tipo,
    COALESCE(cantidad, 0) AS total_registros
FROM datos_contados";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Inicializamos un array para almacenar las filas
    $registro_doc = [];
    $total_general_registro_doc = 0;
    // Iteramos sobre cada fila del resultado
    while ($row = $result->fetch_assoc()) {
        $registro_doc[] = $row;
        $total_general_registro_doc += $row["total_registros"];
    }

} else {
    $total_general_registro_doc = 0;
    //echo "Error al obtener la cantidad de registro de doc.";
}






$conexion->close();

?>