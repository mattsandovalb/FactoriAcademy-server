<?php
//Conexion a la base de datos(Hacer con laravel)
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chatapp";
  //Variable que se utilizara para conectar en todo momento a la base de datos
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
