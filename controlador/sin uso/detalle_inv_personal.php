<?php

require '../modelo/conexion.php';

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id_string = $_GET['id'];
    $tipo = $_GET['tipo'];
    $id = 0;

    // Convertir a entero y validar
    if (is_numeric($id_string)) {
        $id = intval($id_string);
    } else {
        echo "El valor ingresado no es un número válido.";
    }

    if($tipo == 'estudiante'){
        //Seleccionamos toda la informacion del estudiante
        $sql = "SELECT 
            *,
            estudiantes.nombre as nombre,
            c.nombre as carrera
        FROM estudiantes 
        inner join carreras c on estudiantes.id_carrera = c.id
        WHERE ". $id ." = estudiantes.cedula";

        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $estudiante = $result->fetch_assoc();
        } else {
            echo "Error al obtener la informacion del estudiante";
        }


        $conexion->close();

    }else if($tipo == 'profesor'){
        //Seleccionamos toda la informacion del profesor
        $sql = "SELECT 
            *
        FROM profesores pr WHERE ". $id ." = pr.cedula";

        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $profesor = $result->fetch_assoc();
        } else {
            echo "Error al obtener la informacion del profesor";
        }


        $conexion->close();
    }else{
        echo "Error en el tipo de persona";
    }

} else {
    echo "Faltan parámetros en la URL.";
}

?>