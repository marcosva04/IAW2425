<?php
    $servername = "sql107.thsite.top";
    $username = "thsi_38097542";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }
    echo "Conexión exitosa!";
?>