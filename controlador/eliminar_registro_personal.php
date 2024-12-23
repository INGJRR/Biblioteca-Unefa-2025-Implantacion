<?php
// Verificamos si se ha enviado algo por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los valores del formulario
    $id_personal = $_POST["id_personal"];
    $tipo = $_POST["tipo"];

    // Verificamos el tipo de persona
    if ($tipo == "estudiante") {
        // Preparamos la consulta SQL para eliminar el registro
        $sql = "DELETE FROM tu_tabla WHERE id_personal = :id";

        // Ejecutamos la consulta utilizando la conexión existente
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id_personal, PDO::PARAM_INT);
        $stmt->execute();
        
    } else if($tipo == "profesor"){

    }else {
        echo "Error: Tipo de persona inválido.";
    }
} else {
    echo "No se ha enviado ningún formulario.";
}
?>