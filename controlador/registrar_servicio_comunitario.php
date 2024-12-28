<?php
    session_start();
    require_once './funciones/funciones.php';

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //en caso de que ocurra un error 
    $error = false;
    // Recoger los datos del formulario
    $cota = validar_cota($_POST['cota'], $error);
    $titulo = validarSoloLetrasNumeros($_POST['titulo'], $error);
    $autor = validar_nombre($_POST['autor'], $error);
    $fecha = esNumeroValido($_POST['fecha'], 2050, $error);
    $tutor = validar_nombre($_POST['tutor'], $error); 
    $tutor_comunitario = validar_nombre($_POST['tutor_comunitario'], $error); 
    $lugar = validarSoloLetrasNumeros($_POST['lugar'],$error);

    $fecha_registro = date("Y-m-d ");;
    $cantidad = 1;
    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if(isset($_SESSION['registroServicioComunitario'])){
        unset($_SESSION['registroServicioComunitario']);
    }

    //validamos que el campo cota este en el formato adecuado para buscar si se envuentra registrado  
    if($cota != ''){
        // Preparar la consulta (protege contra inyecciones SQL)
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
        }
    }


    if($error){
        // Crear un nuevo objeto de tipo stdClass
        $sc = new stdClass();

        // Asignar valores a las propiedades del objeto
        $sc->cota = $cota;
        $sc->titulo = $titulo;
        $sc->autor = $autor;
        $sc->fecha = $fecha;
        $sc->tutor = $tutor;
        $sc->tutor_comunitario =$tutor_comunitario;
        $sc->lugar = $lugar;

        // Almacenar el objeto en la sesión
        $_SESSION['registroServicioComunitario'] = $sc;
        header("Location: ./regis_comu.php");
        die();
    }

    // modificamos la fecha para que no de error 
    $fecha = $_POST['fecha'] . '-01-01';

    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();

    // registramos libros
    $sql_libro = "INSERT INTO servicio_comunitario (cota, titulo, autor, tutor, tutor_comunitario, fecha_registro, fecha_presentacion, cantidad, lugar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_libro = $conexion->prepare($sql_libro);
    $stmt_libro->bind_param("sssssssis",$cota, $titulo, $autor, $tutor, $tutor_comunitario, $fecha_registro, $fecha, $cantidad, $lugar);
    $stmt_libro->execute();


    if ($stmt_libro->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_libro->error;
        header("Location: ./regis_comu.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ./comunitario.php"); // Reemplaza con el nombre de tu página
    }

    $stmt_libro->close();
}
$conexion->close();
?>
