<?php
$servername = "sql107.thsite.top";
$username = "thsi_38097542";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexión 3 exitosa";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 