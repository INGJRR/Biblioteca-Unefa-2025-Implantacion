<?php

session_start();

include_once './modelo/conexion.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST["usuario"]) and !empty($_POST["clave"])){
        $usuario = $_POST["usuario"];
        $password = $_POST["clave"];
        $sql=$conexion->query(" SELECT * FROM usuarios WHERE usuario='$usuario' and clave='$password' ");
        if($datos=$sql->fetch_object()){
            $_SESSION["cedula"]=$datos->cedula;
            $_SESSION["usuario"]=$datos->usuario;
            header("location: admin-inicio.php");
        }else{
            echo "<div class='alert alert-danger'>El usuario no existe</div>";
        }

    }else{
        echo "<div class='alert alert-danger'>Los campos estan vacios</div>";
    }
    // Cerrar la conexión
    $conexion->close();
}

?>