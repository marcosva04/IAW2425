<?php
// Conexión con BD
    $servername = "sql107.thsite.top";
    $username = "thsi_38097542";
    $password = "";
    $bd = "thsi_38097542_markos";
    $enlace = mysqli_connect($servername,$username,$password,$bd);
    if (!$enlace){
        die("Ocurrió un problema :" . mysqli_connect_error());
    }
// Construcción de la Query
    $query = "ALTER TABLE usuarios ADD fullname VARCHAR(100), ADD email2 VARCHAR(100)";
// Ejecución de la Query
    $resultado = mysqli_query($enlace, $query);
// Procesamiento de los resultados
    if($resultado){
        echo "<p>Tablas añadidas correctamente</p>";
    }
    else{
        echo "Fallo";
    }
// Cierre de la conexión
    mysqli_close($enlace);
?>