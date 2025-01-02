<?php
    session_start();
    require_once ROOT_DIR . '/funciones/funciones.php';

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //en caso de que ocurra un error 
    $error = false;
    // Recoger los datos del formulario
    $cota = validar_cota($_POST['cota'], $error);
    $titulo = validarSoloLetrasNumeros($_POST['titulo'], $error);
    $autor = validar_nombre($_POST['autor'], $error);
    $fecha = $_POST['fecha'];
    $carrera = validar_nombre($_POST['carrera'], $error); 
    $cantidad = esNumeroValido($_POST['cantidad'], 100, $error);
    $editorial = validarSoloLetrasNumeros($_POST['editorial'],$error);

    $fecha_registro = date("Y-m-d ");;
    $tipo_libro = "Libro";

    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if(isset($_SESSION['modificarLibro'])){
        unset($_SESSION['modificarLibro']);
    }

    //validamos que el campo cota este en el formato adecuado para buscar si se encuentra registrado  
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
            //comprobamos si el unico resultado pertenece a la cota 
            $comprobacion = $result->fetch_assoc();
            
            if($comprobacion["cota"] == $cota){
                //quiere decir que la unica coincidencia la tenemos con la cota del libro

            }else{
                // esa cota se encuentra ocupada, no podemos actualizar
                $error = true;
                $cota = '';
            }
            

        }
    }


    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $libro = new stdClass();

        // Asignar valores a las propiedades del objeto
        $libro->cota = $cota;
        $libro->titulo = $titulo;
        $libro->autor = $autor;
        $libro->fecha = $fecha;
        $libro->carrera = $carrera;
        $libro->cantidad = $cantidad;
        $libro->editorial = $editorial;

        // Almacenar el objeto en la sesión
        $_SESSION['modificarLibro'] = $libro;
        header("Location: ./libro.php");
        die();
    }

    // modificamos la fecha para que no de error 
    $fecha = $_POST['fecha'] . '-01-01';

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // Actualizamos el libro
    $sql_libro = "UPDATE libros SET titulo = ?, autor = ?, tipo_libro = ?, fecha = ?, carrera = ?, fecha_registro = ?, cantidad = ?, editorial = ? WHERE cota = ?";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("ssssssiss", $titulo, $autor, $tipo_libro, $fecha, $carrera, $fecha_registro, $cantidad, $editorial, $cota);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_libro->error;
        header("Location: ./libro.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../ver_libro.php"); // Reemplaza con el nombre de tu página
    }

    $stmt_libro->close();
}
$conexion->close();
?>
