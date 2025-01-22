<?php
// Conexión a la base de datos
$servername = "sql107.thsite.top"; // Nombre del servidor
$username = "thsi_38097542"; // Nombre de usuario
$password = "0!JSTh7?"; // Contrasena
$database = "thsi_38097542_markos";
$enlace = mysqli_connect($servername, $username, $password, $database);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Procesar formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que los campos no estén vacíos
    if (empty($_POST['username']) || empty($_POST['password'])) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Saneamiento de las entradas
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Consultar el usuario por username
    $query = "SELECT * FROM login WHERE username='$username'";
    $resultado = mysqli_query($enlace, $query);

    if (mysqli_num_rows($resultado) === 1) {
        // Recuperar los datos del usuario
        $usuario = mysqli_fetch_assoc($resultado);

        // Usar el hash almacenado como el salt para cifrar la contraseña ingresada
        $password_hashed = crypt($password, $usuario['password']);

        // Verificar la contraseña (comparación estricta)
        if ($usuario['password'] === $password){ // CASO 1 (GRAN ERROR)
        //if (hash_equals($usuario['password'], $password_hashed)) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "Error: Contraseña incorrecta." . $password_hashed . " es diferente de " . $usuario['password'];
        }
    } else {
        echo "Error: Usuario no encontrado.";
    }
}

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <form method="POST" action="/proyecto/login.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>