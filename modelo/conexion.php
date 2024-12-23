<?php
  // Datos de conexión (reemplaza con tus propios datos)
  $servername = "localhost";
  $username = "root";
  $password = "123321";
  $dbname = "biblioteca1_0";

  // Crear una csonexión
  $conexion = new mysqli($servername, $username, $password, $dbname);

  // Verificar la conexión
  if ($conexion->connect_error) {
      die("Connection failed: " . $conexion->connect_error);
  } 
/*   else {
      echo "Connected successfully";
  } */
  $conexion->set_charset("utf8");
?>