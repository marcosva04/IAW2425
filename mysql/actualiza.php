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
    $query = "UPDATE usuario SET nombre='Elver', apellido='Galarga' WHERE id=3";
// Ejecución de la Query
    $resultado = mysqli_query($enlace, $query);
// Procesamiento de los resultados
    if($resultado){
        echo "<p>Registro actualizado correctamente</p>";
    }
    else{
        echo "Fallo";
    }
// Cierre de la conexión
    mysqli_close($enlace);
?>