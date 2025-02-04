<?php
//validamos que el campo cota este en el formato adecuado para buscar si se envuentra registrado  
if($cota != ''){
    // Preparar la consulta (protege contra inyecciones SQL)
    $stmt = $conexion->prepare("SELECT * FROM libros WHERE cota = ?");
    $stmt->bind_param("s", $cota);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró algún registro
    if ($result->num_rows > 0) {
        $error = true;
        $cota = '';
        $mensaje = "La cota [".$_POST["cota"]."] ya ha sido asignada a otro libro. Cada libro debe tener una cota única.";
    }

    $stmt = $conexion->prepare("SELECT * FROM servicio_comunitario WHERE cota = ?");
    $stmt->bind_param("s", $cota);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró algún registro
    if ($result->num_rows > 0) {
        $error = true;
        $cota = '';
        $mensaje = "La cota [".$_POST["cota"]."] ya ha sido asignada a otro Trabajo de servicio comunitario. Cada Trabajo de servicio comunitario debe tener una cota única.";
    }

    $stmt = $conexion->prepare("SELECT * FROM trabajos_investigacion WHERE cota = ?");
    $stmt->bind_param("s", $cota);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró algún registro
    if ($result->num_rows > 0) {
        $error = true;
        $cota = '';
        $mensaje = "La cota [".$_POST["cota"]."] ya ha sido asignada a otro Trabajo de investigación. Cada Trabajo de investigación debe tener una cota única.";
    }

    $stmt = $conexion->prepare("SELECT * FROM pasantias WHERE cota = ?");
    $stmt->bind_param("s", $cota);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró algún registro
    if ($result->num_rows > 0) {
        $error = true;
        $cota = '';
        $mensaje = "La cota [".$_POST["cota"]."] ya ha sido asignada a otro Trabajo de pasantías. Cada Trabajo de pasantías debe tener una cota única.";
    }

}else{
    $mensaje = '';
}

if($cota != ''){
    $mensaje = '';
}

?>