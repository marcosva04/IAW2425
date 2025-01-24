<?php
session_start();
include 'auth.php';
include 'db.php';
redirigirSiNoAutenticado();

if (!isset($_GET['id'])) {
    header('Location: actividades.php');
    exit();
}

$id = $_GET['id'];

try {
    // Verificar si la actividad existe
    $stmt = $conn->prepare("SELECT id FROM actividades WHERE id = ?");
    $stmt->execute([$id]);
    $actividad = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$actividad) {
        die("La actividad no existe.");
    }

    // Eliminar la actividad
    $stmt = $conn->prepare("DELETE FROM actividades WHERE id = ?");
    $stmt->execute([$id]);

    // Redirigir a la página de actividades después de eliminar
    header('Location: actividades.php');
    exit();
} catch (PDOException $e) {
    die("Error al eliminar la actividad: " . $e->getMessage());
}
?>