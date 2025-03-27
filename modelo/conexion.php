<?php
  // Datos de conexión 
  $servername = "localhost";
  $username = "root";
  $password = "unefa2020";
  $dbname = "biblioteca1_0";

  // Crear una csonexión
  $conexion = new mysqli($servername, $username, $password,$dbname);

  // Verificar la conexión
  if ($conexion->connect_error) {
      die("Connection failed: " . $conexion->connect_error);
  } 
/*   else {
      echo "Connected successfully";
  } */
  $conexion->set_charset("utf8");
?>