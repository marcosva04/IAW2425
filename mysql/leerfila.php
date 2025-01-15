<?php
// Conexión con BD
    $servername = "";
    $username = "";
    $password = "";
    $bd = "";
    $enlace = mysqli_connect($servername,$username,$password,$bd);
    if (!$enlace){
        die("Ocurrió un problema :" . mysqli_connect_error());
    }
// Construcción de la Query
    $query = "SELECT * FROM usuarios LIMIT 1";
// Ejecución de la Query
    $resultado = mysqli_query($enlace, $query);
// Procesamiento de los resultados
    print_r($resultado);
// Cierre de la conexión
    mysqli_close($enlace);
?>