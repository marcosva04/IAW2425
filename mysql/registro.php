<?php
if(isset($_POST['enviar'])){

    //Obtenemos los datos del usuario 
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellidos = htmlspecialchars(trim($_POST['apellidos']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $dni = htmlspecialchars(trim($_POST['dni']));
    $email = htmlspecialchars(trim($_POST['email']));
    $contrasena = htmlspecialchars(trim($_POST['contrasena']));
    $contrasena2 = htmlspecialchars(trim($_POST['contrasena2']));
    $provincia = htmlspecialchars(trim($_POST['provincia']));
    $codPostal = htmlspecialchars(trim($_POST['codPostal']));

    if ($contrasena !== $contrasena2){
        die("Las contrasenas deben coincidir.");
    }else{
        $hashX = crypt($contrasena, '$6$rounds=5000$' . uniqid(mt_rand(), true) . '$');
        //Datos de conexión con la base de datos
        $servername = "sql107.thsite.top";
        $username = "thsi_38097542";
        $password = "";
        $bd = "thsi_38097542_markos";
        $enlace = mysqli_connect($servername,$username,$password,$bd);
        if(!$enlace){
            die("Ha ocurrido un error en la comunicación con la base de datos." . mysqli_connect_error());
        }
        
        // Verificar si el usuario ya existe
        $query = "SELECT id FROM usuarios WHERE email='$email'";
        $resultado = mysqli_query($enlace, $query);
 
        if (mysqli_num_rows($resultado) > 0) {
            echo "<p>Error: El usuario ya está registrado.</p>";
        }else{
            //Construcción de la consulta
            $query = "INSERT INTO registro (nombre,apellidos,telefono,dni,correo,contrasena,provincia,codpostal) VALUES ('$nombre','$apellidos','$telefono','$dni','$email','$hashX','$provincia','$codPostal')";

            //Ejecución de la consulta
            if (mysqli_query($enlace, $query)) {
                // Enviar correo electrónico de confirmación
                $asunto = "Registro exitoso";
                $mensaje = "Hola $nombre,\n\nGracias por registrarte. Estos son tus datos:\nNombre: $nombre\nApellidos: $apellidos\nEmail: $email\n\nSaludos.";
                $cabeceras = "From: no-reply@mi-sitio.com";

                if (mail($email, $asunto, $mensaje, $cabeceras)) {
                    echo "Usuario registrado correctamente. Se ha enviado un correo de confirmación.";
                } else {
                    echo "Usuario registrado, pero no se pudo enviar el correo.";
                }
            } else {
                echo "Error al registrar el usuario: " . mysqli_error($enlace);
            }

            //Cerramos conexión
            mysqli_close($enlace);
        }
        
    }
} 
?>