<?php

// Vamos a obtener toda la informacion de los prestamos
$sql = "SELECT
p.cedula_persona,
p.tipo_persona,
p.cota_documento,
p.tipo_documento,
p.fecha_prestamo,
p.fecha_devolucion,
CASE 
    WHEN p.tipo_persona = 'Estudiante' THEN e.nombre
    WHEN p.tipo_persona = 'Profesor' THEN pr.nombre
END AS nombre,
CASE 
    WHEN p.tipo_documento = 'Libro' THEN l.titulo
    WHEN p.tipo_documento = 'Trabajo de investigacion' THEN ti.titulo
    WHEN p.tipo_documento = 'Servicio comunitario' THEN sc.titulo
    WHEN p.tipo_documento = 'Pasantia' THEN pa.titulo
END AS titulo_doc
FROM prestamos p
LEFT JOIN estudiantes e ON p.cedula_persona = e.cedula
LEFT JOIN profesores pr ON p.cedula_persona = pr.cedula
Left join libros l on p.cota_documento = l.cota
left join servicio_comunitario sc on p.cota_documento = sc.cota
left join trabajos_investigacion ti on p.cota_documento = ti.cota
left join pasantias pa on p.cota_documento = pa.cota where p.estado = 'Prestado'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $doc_prestados = array(); // Inicializamos un array vacío para almacenar los resultados
    while ($row = $result->fetch_assoc()) {
        $doc_prestados[] = $row;
    }
} else {
    // echo "Error al obtener informacion de los prestamos.";
}
 

$conexion->close();

?>