<?php

require '../../modelo/conexion.php';
require_once '../../funciones/info_idv_db.php';
require_once '../../funciones/funciones.php';

$id = (int)$_GET['id'];
$tipo = (int)$_GET['tipo'];

// Validación básica de los parámetros (puedes agregar más validaciones según tus necesidades)
if (empty($id) || empty($tipo)) {
    mysqli_close($conexion);
    die("Los parámetros 'id' y 'tipo' son requeridos.");
}

// estaba prestado
if($tipo == 1){
    $tipo = "Devuelto";
}else if($tipo == 2){
    // estaba devuelto
    $tipo = "Prestado";
}else{
    header("Location: ../../prestamo.php");
    mysqli_close($conexion);
    die();
}

// Preparar la consulta SQL (asumiendo que el nuevo estado se almacena en una columna llamada 'estado')
$sql = "UPDATE prestamos SET estado = ? WHERE id = ?";
echo $tipo;
echo $id;
// Preparar la sentencia
$stmt = mysqli_prepare($conexion, $sql);
// Vincular los parámetros
mysqli_stmt_bind_param($stmt, "si", $tipo, $id);

// Ejecutar la sentencia
if (mysqli_stmt_execute($stmt)) {
    // echo "El estado del préstamo ha sido actualizado correctamente.";
    $datoDoc = '';
    $sql = "SELECT * from prestamos where id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $datoDoc = $row;
    }

    if($datoDoc != ''){
        //tenemos dato
        $tipo_persona = $datoDoc["tipo_persona"];
        $tipo_libro = $datoDoc["tipo_documento"];
        $cedula = $datoDoc['cedula_persona'];
        $cota = $datoDoc['cota_documento'];
        $persona_sql = '';
        $doc_sql = '';

        //validamos para asignarle el nombre de la tabla
        switch($tipo_persona){
            case 'Estudiante': $persona_sql = "estudiantes";
            break;
            case 'Profesor': $persona_sql = "profesores";
            break;
            case 'Obrero': $persona_sql = "obreros";
            break;
            default: $persona_sql = '';
        }
    
        switch($tipo_libro){
            case 'Libro': $doc_sql = "libros";
            break;
            case 'Servicio comunitario': $doc_sql = "servicio_comunitario";
            break;
            case 'Trabajo de investigacion': $doc_sql = "trabajos_investigacion";
            break;
            default: $doc_sql = '';
        }

        //validamos que tenga valores 
        if($persona_sql != '' && $doc_sql != ''){
            // Consulta SQL
            $sql = "UPDATE $persona_sql SET credito = credito + 1 WHERE cedula =    '$cedula'";
            echo $sql;
            ejecutar_actualizacion($sql, $conexion);
            // Consulta SQL
            $sql = "UPDATE $doc_sql SET cantidad = cantidad + 1 WHERE cota = '$cota'";
            ejecutar_actualizacion($sql, $conexion);
            echo "                                    ";
            echo $sql;
        }
    }
    header("Location: ../../prestamo.php");
} else {
    // echo "Error al actualizar el estado: " . mysqli_error($conexion);
    header("Location: ../../prestamo.php");
}

// Cerrar la sentencia y la conexión
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>