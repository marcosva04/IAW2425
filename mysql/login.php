<?php
$servername = "sql107.thsite.top";
$username = "thsi_38097542";
$password = "";
$bd = "thsi_38097542_markos";
$enlace = mysqli_connect($servername,$username,$password,$bd);

if (!$enlace){
    die("Ocurrió un problema :" . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Verificar si los campos están vacíos
    if (empty($username) || empty($password)) {
        header("Location: index.php?error=Todos los campos son obligatorios.");
        exit();
    }
    
    // Saneamiento de entradas
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    
    // Verificar si el usuario existe y obtener hash de contraseña
    $stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        
        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            echo "Inicio de sesión exitoso. ¡Bienvenido, $username!";
        } else {
            header("Location: index.php?error=Nombre de usuario o contraseña incorrectos.");
            exit();
        }
    } else {
        header("Location: index.php?error=Nombre de usuario o contraseña incorrectos.");
        exit();
    }
    
    $stmt->close();
}

$conn->close();
?>
