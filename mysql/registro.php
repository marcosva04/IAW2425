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
    $nombre = 'nombre';
    $apellidos = 'apellidos';
    $email = 'email';
    $query = "INSERT INTO usuarios($nombre, $apellidos, $email) VALUES ('Pepe', 'Bonal López', 'pepebonal@algo.com') NOT NULL";

    if (empty($nombre) || empty($apellidos) || empty($email)){
        echo "Uno de los campos coincide con un usuario ya registrado";
    }
// Ejecución de la Query
    $resultado = mysqli_query($enlace, $query);
// Procesamiento de los resultados
    if($resultado){
        echo "<p>Insertado correctamente</p>";
        echo "<p>$nombre $apellidos, $email</p>";
    }
    else{
        echo "Fallo";
    }
// Cierre de la conexión
    mysqli_close($enlace);
?>