<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Formulario de Reserva</h1>
    <form action="ej4-reserva.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" id="apellidos" name="apellidos" required>
        <br>
        <label for="dni">DNI: </label>
        <input type="text" id="dni" name="dni" pattern="\d{8}[A-Z]" title="Debe contener 8 números y una letra mayúscula." required>
        <br>
        <label for="email">Correo electrónico: </label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="entrada">Dia de entrada: </label>
        <input type="date" id="entrada" name="entrada" required>
        <br>
        <label for="dias">Número de días de reserva: </label>
        <input type="number" id="dias" name="dias" required>
        <br>
        <label for="habitacion">Tipo de habitación: </label>
        <select name="habitacion" id="habitacion">
            <option value="30">Simple(30€)</option>
            <option value="50">Doble(50€)</option>
            <option value="80">Triple(80€)</option>
            <option value="100">Suite(100€)</option>
        </select><br>
     
        <button type="submit">Registrar</button>
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validación del nombre
    if (empty($_POST["nombre"])) {
        $error_nombre = "El nombre es obligatorio.";
    } else {
        $nombre = htmlspecialchars($_POST["nombre"]);
    }

    // Validación de los apellidos
    if (empty($_POST["apellidos"])) {
        $error_apellidos = "Los apellidos son obligatorios.";
    } else {
        $apellidos = htmlspecialchars($_POST["apellidos"]);
    }

    // Validación del DNI
    $dni = $_POST["dni"];
    if (!preg_match("/^\d{8}[A-Z]$/", $dni)) {
        $error_dni = "DNI inválido. Debe contener 8 números y una letra mayúscula.";
    }

    // Validación del correo electrónico (opcional)
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);



    // Mostrar mensajes de error si existen
    if (isset($error_nombre) || isset($error_apellidos) || isset($error_dni) || isset($error_password) || isset($error_politicas)) {
        echo isset($error_nombre) ? "<p class='error'>$error_nombre</p>" : "";
        echo isset($error_apellidos) ? "<p class='error'>$error_apellidos</p>" : "";
        echo isset($error_dni) ? "<p class='error'>$error_dni</p>" : "";
        exit;
    }

    $entrada = htmlspecialchars($_POST["entrada"]);
    $dias = htmlspecialchars($_POST["dias"]);
    $habitacion = htmlspecialchars($_POST["habitacion"]);
    $precio = $dias * $habitacion;

    // Procesar el formulario si no hay errores
    echo "<h1>Usuario Registrado</h1>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellidos: $apellidos</p>";
    echo "<p>DNI: $dni</p>";
    echo "<p>Correo electrónico: $email</p>";
    echo "<p>Día de entrada: $entrada</p>";
    echo "<p>Cantidad de días: $dias</p>";
    echo "<p>Tipo de habitación: $habitacion</p>";
    echo "<p>Precio total: $precio €</p>";/*
    if($habitacion = "30"){
        echo "<img src='../images/hab0.png' width=100px height=100px>"
    }
    else if($habitacion = "50"){
        echo "<img src='../images/hab1.png' width=100px height=100px>"
    }
    else if($habitacion = "80"){
        echo "<img src='../images/hab2.png' width=100px height=100px>"
    }
    else if($habitacion = "100"){
        echo "<img src='../images/hab3.png' width=100px height=100px>"
    }*/

    switch ($habitacion)
    {
        case "30":
            echo "<img src='../images/hab0.png' width=100px height=100px>";
            break;

        case "50":
            echo "<img src='../images/hab1.png' width=100px height=100px>";
            break;

        case "80":
                echo "<img src='../images/hab2.png' width=100px height=100px>";
                break;
                
        case "100":
                    echo "<img src='../images/hab3.png' width=100px height=100px>";
                    break;
        }

}
?>

</body>
</html>