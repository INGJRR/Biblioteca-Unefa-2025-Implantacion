<?php


function VolverMoroso($cedula, $tipo, $conexion){
    if($tipo == 1){
        //estudiante
        $id_estudiante = $cedula; // Obtén el ID del estudiante desde un formulario
        $sql = "UPDATE estudiantes SET moroso = 1 WHERE cedula = '$id_estudiante'";

        if ($conexion->query($sql) === TRUE) {
        // echo "Registro actualizado correctamente";
        } else {
        // echo "Error al actualizar el registro: " . $conexion->error;
        }

    }else if($tipo == 2){
        //Profesor
        $id_estudiante = $cedula; // Obtén el ID del estudiante desde un formulario
        $sql = "UPDATE profesores SET moroso = 1 WHERE cedula = '$id_estudiante'";

        if ($conexion->query($sql) === TRUE) {
        // echo "Registro actualizado correctamente";
        } else {
        // echo "Error al actualizar el registro: " . $conexion->error;
        }

    }else if($tipo == 3){
        //Obrero
        $id_estudiante = $cedula; // Obtén el ID del estudiante desde un formulario
        $sql = "UPDATE obreros SET moroso = 1 WHERE cedula = '$id_estudiante'";

        if ($conexion->query($sql) === TRUE) {
        // echo "Registro actualizado correctamente";
        } else {
        // echo "Error al actualizar el registro: " . $conexion->error;
        }

    }else{

    }
}

function quitarMoroso($cedula, $tipo, $conexion){
    if($tipo == 1){
        //estudiante
        $id_estudiante = $cedula; // Obtén el ID del estudiante desde un formulario
        $sql = "UPDATE estudiantes SET moroso = 0 WHERE cedula = '$id_estudiante'";

        if ($conexion->query($sql) === TRUE) {
        // echo "Registro actualizado correctamente";
        } else {
        // echo "Error al actualizar el registro: " . $conexion->error;
        }

    }else if($tipo == 2){
        //Profesor
        $id_estudiante = $cedula; // Obtén el ID del estudiante desde un formulario
        $sql = "UPDATE profesores SET moroso = 0 WHERE cedula = '$id_estudiante'";

        if ($conexion->query($sql) === TRUE) {
        // echo "Registro actualizado correctamente";
        } else {
        // echo "Error al actualizar el registro: " . $conexion->error;
        }

    }else if($tipo == 3){
        //Obrero
        $id_estudiante = $cedula; // Obtén el ID del estudiante desde un formulario
        $sql = "UPDATE obreros SET moroso = 0 WHERE cedula = '$id_estudiante'";

        if ($conexion->query($sql) === TRUE) {
        // echo "Registro actualizado correctamente";
        } else {
        // echo "Error al actualizar el registro: " . $conexion->error;
        }

    }else{

    }
}



function Moroso($cedula, $tipo, $conexion){
    // Vamos a obtener toda la informacion de los prestamos
    $sql = "SELECT 
    *
    FROM prestamos where cedula_persona = '$cedula' and estado = 'Prestado'";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if(fechaHaPasado($row["fecha_devolucion"])){
            VolverMoroso($cedula, $tipo, $conexion);
            return;
        }else{
            quitarMoroso($cedula, $tipo, $conexion);
        }
    }
    } else {
    // echo "Error al obtener informacion de los prestamos.";
    }  
}
?>