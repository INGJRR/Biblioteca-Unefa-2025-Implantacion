<?php
    session_start();
    if (empty($_SESSION['nombre']) and empty($_SESSION['usuario'])) {
    header('location: ../index.php');
    };

    if (isset($_GET['tipo'])){
        
        $tipo = $_GET['tipo'];

    }else{
        echo "Error en los parametros";
    }
?>