<?php

session_start();
require_once ROOT_DIR . '/funciones/funciones.php';
require ROOT_DIR . '/funciones/info_idv_db.php';
 
//sirve para cuando regresemos
$nombreSesion = "modificarSc";
$ruta = '../comunitario.php';
 
$cota = '';
$titulo = '';
$autor = '';
$fecha = '';
$tutor = '';
$tutor_comunitario = '';
$lugar = '';
$cantidad = '';
$carrera = '';
$estilosError = '';

if(isset($_SESSION["modificarSc"])){
    //si existe quiere decir que ya cargamos los datos de la cota
    $estilosError = "style=\"border: 2px solid red;\"";
    $cota = $_SESSION["modificarSc"]->cota ?? '';
    $titulo = $_SESSION['modificarSc']->titulo ?? '';
    $autor = $_SESSION['modificarSc']->autor ?? '';
    $fecha = $_SESSION['modificarSc']->fecha ?? '';
    $tutor = $_SESSION['modificarSc']->tutor ?? '';
    $tutor_comunitario = $_SESSION['modificarSc']->tutor_comunitario ?? '';
    $lugar = $_SESSION['modificarSc']->lugar ?? '';
    $cantidad = $_SESSION['modificarSc']->cantidad ?? '';
    $carrera = $_SESSION['modificarSc']->carrera ?? '';
}else{
    // no hemos cargado los datos de la cota, entonces lo cargaremos
    if (isset($_GET['cota'])) {
        $cota = $_GET['cota'];
        require ROOT_DIR . '/modelo/conexion.php';
        $sql = "SELECT 
        *
        FROM pasantias WHERE cota = '$cota'";
        $sv = info_idv_db($sql, $conexion);
        $conexion->close();

        //comprobamos si libro tiene un valor 
        if($sv != ''){	
            // Guardamos todos los datos en variables
            $cota = $sv["cota"];
            $titulo = $sv["titulo"];
            $autor = $sv["autor"];
            $fecha = substr($sv["fecha_presentacion"], 0, 4);
            $tutor = $sv["tutor"];
            $tutor_comunitario = $sv["tutor_comunitario"];
            $lugar = $sv["lugar"];
            $cantidad = $sv["cantidad"];
            $carrera = $sv["carrera"];
        }else{
            //la consulta fallo
        }
    } else {
        // echo "No se ha ingresado una cota.";
    }
}

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //conexion con la base de dato
    require ROOT_DIR . '/modelo/conexion.php';
    //en caso de que ocurra un error 
    $error = false;
    // Recoger los datos del formulario
    $cota = validar_cota($cota, $error);
    $titulo = validarSoloLetrasNumeros($_POST['titulo'], $error);
    $autor = validar_nombre($_POST['autor'], $error);
    $fecha = validarFecha2($_POST['fecha'], $error);
    $tutor = validar_nombre($_POST['tutor'], $error); 
    $tutor_comunitario = validar_nombre($_POST['tutor_comunitario'], $error); 
    $lugar = validarSoloLetrasNumeros($_POST['lugar'],$error);
    $carrera = validar_nombre($_POST['carrera'], $error); 
    $cantidad = esNumeroValido($_POST['cantidad'], 100, $error);
    $fecha_registro = date("Y-m-d ");

    //verificamos si tenemos creado el objeto usuario para evitar cargarlo luego
    if(isset($_SESSION['modicarSc'])){
        unset($_SESSION['modificarSc']);
    }

    //validamos que el campo cota este en el formato adecuado para buscar si se envuentra registrado  
    if($cota != ''){
        // Preparar la consulta (protege contra inyecciones SQL)
        $stmt = $conexion->prepare("SELECT * FROM pasantias WHERE cota = ?");
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
        $sc = new stdClass();

        // Asignar valores a las propiedades del objeto
        $sc->cota = $cota;
        $sc->titulo = $titulo;
        $sc->autor = $autor;
        $sc->fecha = $fecha;
        $sc->tutor = $tutor;
        $sc->tutor_comunitario =$tutor_comunitario;
        $sc->lugar = $lugar;
        $sc->cantidad = $cantidad;
        $sc->carrera = $carrera;

        // Almacenar el objeto en la sesión
        $_SESSION['modificarSc'] = $sc;
        header("Location: ./sc.php");
        die();
    }


    // Transacción para asegurar la integridad de los datos
    $conexion->begin_transaction();
 
    // registramos libros
    $sql_sc = "UPDATE pasantias SET titulo = ?, autor = ?, tutor = ?, tutor_comunitario = ?, fecha_registro = ?, fecha_presentacion = ?, cantidad = ?, lugar = ?, carrera = ? WHERE cota = ?";
    $stmt_sc = $conexion->prepare($sql_sc);
    $stmt_sc->bind_param("ssssssisss", $titulo, $autor, $tutor, $tutor_comunitario, $fecha_registro, $fecha, $cantidad, $lugar, $carrera, $cota);
    $stmt_sc->execute();


    if ($stmt_sc->error) {
        $conexion->rollback(); // Deshacer los cambios en caso de error
        // echo "Error al registrar libro: " . $stmt_sc->error;
        header("Location: ./regis_comu.php");
    } else {
        $conexion->commit(); // Confirmar los cambios
        header("Location: ../pasantia.php?buscar=$cota"); // Reemplaza con el nombre de tu página
    }

    $stmt_sc->close();
    $conexion->close();
}
?>
