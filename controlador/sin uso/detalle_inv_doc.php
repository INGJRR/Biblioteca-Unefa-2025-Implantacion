<?php

require '../modelo/conexion.php';

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id_string = $_GET['id'];
    $tipo = $_GET['tipo'];
    $id = $id_string;

    if($tipo == 'libro'){
        //Seleccionamos toda la informacion de los libros
        // $sql = "SELECT 
        //     *
        // FROM libros l WHERE l.cota = $id_string";

        // $result = $conexion->query($sql);

        // if ($result->num_rows > 0) {
        //     $libro_uno = $result->fetch_assoc();
        // } else {
        //     echo "Error al obtener el libro";
        // }
        
        $stmt = $conexion->prepare("SELECT * FROM libros WHERE cota = ?");
        $stmt->bind_param("s", $id_string);
        
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
        
            if ($resultado->num_rows > 0) {
                // Si hay resultados, los procesamos
                $libro_uno = $resultado->fetch_assoc();
            } else {
                echo "No se encontraron libros con la cota especificada.";
            }
        } else {
            echo "Error al ejecutar la consulta: ";
        }

        $conexion->close();

    }else if($tipo == 'trabajo_inv'){
        // Seleccionamos toda la informacion de los trabajo de investigacion
        
        $stmt = $conexion->prepare("SELECT * FROM trabajos_investigacion WHERE cota = ?");
        $stmt->bind_param("s", $id_string);
        
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
        
            if ($resultado->num_rows > 0) {
                // Si hay resultados, los procesamos
                $ti_uno = $resultado->fetch_assoc();
            } else {
                echo "No se encontraron libros con la cota especificada.";
            }
        } else {
            echo "Error al ejecutar la consulta: ";
        }

        $conexion->close();
    }else{
        echo "Error en el tipo de documento";
    }

} else {
    echo "Faltan parámetros en la URL.";
}

?>