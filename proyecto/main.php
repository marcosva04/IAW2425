<?php
session_start();
// if (!isset($_SESSION['user_id'])) {
   // header("Location: /proyecto/login.php");
    //exit();
//}
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Actividades</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Cerrar Sesión</a>
    <h2>Opciones</h2>
    <ul>
        <li><a href="consultar_actividades.php">Consultar Actividades</a></li>
        <li><a href="añadir_actividad.php">Añadir Actividad</a></li>
        <li><a href="modificar_actividad.php">Modificar Actividad</a></li>
        <li><a href="eliminar_actividad.php">Eliminar Actividad</a></li>
    </ul>
</body>
</html>
