<?php

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST["usuario"]) and !empty($_POST["password"])){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        


        $sql=$conexion->query(" SELECT * FROM usuarios WHERE usuario='$usuario' and clave='$password' ");
        if($datos=$sql->fetch_object()){
            $_SESSION["nombre"]='Jesus';
            $_SESSION["usuario"]=$datos->usuario;
            header("location: vistafinal/inicio.php");
        }else{
            // echo "<div class='alert alert-danger'>El usuario no existe</div>";
            ?>
                <script>
                    PNotify.error({
                        text: "Usuario o clave incorrecto, intentelo de nuevo"
                    });
                </script>
            <?php
        }

    }else{
        // echo "<div class='alert alert-danger'>Los campos estan vacios</div>";
        ?> 
        <script>
            PNotify.error({
                text: "Los campos estan vacios"
            });
        </script>
        <?php
    }
    // Cerrar la conexión
    $conexion->close();
}

?>