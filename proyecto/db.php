<?php
$servername = "sql107.thsite.top";
$username = "thsi_38097542";
$password = "";
$dbname = "thsi_38097542_markos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>