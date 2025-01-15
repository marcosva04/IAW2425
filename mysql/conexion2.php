<?php
$servername = "sql107.thsite.top";
$username = "thsi_38097542";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conexión exitosa";
?>