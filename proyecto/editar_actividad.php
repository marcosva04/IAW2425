<?php
session_start();
include 'auth.php';
include 'db.php';
redirigirSiNoAutenticado();

// Verificar si se ha proporcionado un ID válido
if (!isset($_GET['id'])) {
    header('Location: actividades.php');
    exit();
}

$id = $_GET['id'];

// Obtener los datos de la actividad actual
try {
    $stmt = $conn->prepare("SELECT * FROM actividades WHERE id = ?");
    $stmt->execute([$id]);
    $actividad = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$actividad) {
        die("La actividad no existe.");
    }
} catch (PDOException $e) {
    die("Error al obtener la actividad: " . $e->getMessage());
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario
    $titulo = htmlspecialchars($_POST['titulo']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $departamento = htmlspecialchars($_POST['departamento_id']);
    $profesor_responsable = htmlspecialchars($_POST['profesor_responsable_id']);
    $trimestre = htmlspecialchars($_POST['trimestre']);
    $fecha_inicio = htmlspecialchars($_POST['fecha_inicio']);
    $hora_inicio = htmlspecialchars($_POST['hora_inicio']);
    $fecha_fin = htmlspecialchars($_POST['fecha_fin']);
    $hora_fin = htmlspecialchars($_POST['hora_fin']);
    $organizador = htmlspecialchars($_POST['organizador_id']);
    $ubicacion = htmlspecialchars($_POST['ubicacion_id']);
    $coste = floatval($_POST['coste']);
    $total_alumnos = intval($_POST['total_alumnos']);
    $objetivo = htmlspecialchars($_POST['objetivo']);


    // Actualizar la actividad en la base de datos
    try {
        $stmt = $conn->prepare("UPDATE actividades SET titulo = ?, tipo = ?, departamento_id = ?, profesor_responsable_id = ?, trimestre = ?, fecha_inicio = ?, hora_inicio = ?, fecha_fin = ?, hora_fin = ?, organizador_id = ?, ubicacion_id = ?, coste = ?, total_alumnos = ?, objetivo = ? WHERE id = ?");
        $stmt->execute([$titulo, $tipo, $departamento, $profesor_responsable, $trimestre, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin, $organizador, $ubicacion, $coste, $total_alumnos, $objetivo, $id]);

        // Redirigir a la página de actividades después de editar
        header('Location: actividades.php');
        exit();
    } catch (PDOException $e) {
        die("Error al actualizar la actividad: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Actividad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Actividad</h1>
        <div class="card shadow">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo htmlspecialchars($actividad['titulo']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <select id="tipo" name="tipo" class="form-select" required>
                            <option value="extraescolar" <?php echo $actividad['tipo'] === 'extraescolar' ? 'selected' : ''; ?>>Extraescolar</option>
                            <option value="complementaria" <?php echo $actividad['tipo'] === 'complementaria' ? 'selected' : ''; ?>>Complementaria</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento:</label>
                        <input type="text" id="departamento" name="departamento" class="form-control" value="<?php echo htmlspecialchars($actividad['departamento_id']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="profesor_responsable" class="form-label">Profesor Responsable:</label>
                        <input type="text" id="profesor_responsable" name="profesor_responsable" class="form-control" value="<?php echo htmlspecialchars($actividad['profesor_responsable_id']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="trimestre" class="form-label">Trimestre:</label>
                        <select id="trimestre" name="trimestre" class="form-select" required>
                            <option value="1" <?php echo $actividad['trimestre'] === '1' ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?php echo $actividad['trimestre'] === '2' ? 'selected' : ''; ?>>2</option>
                            <option value="3" <?php echo $actividad['trimestre'] === '3' ? 'selected' : ''; ?>>3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha Inicio:</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" value="<?php echo htmlspecialchars($actividad['fecha_inicio']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hora_inicio" class="form-label">Hora Inicio:</label>
                        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" value="<?php echo htmlspecialchars($actividad['hora_inicio']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha Fin:</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="<?php echo htmlspecialchars($actividad['fecha_fin']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hora_fin" class="form-label">Hora Fin:</label>
                        <input type="time" id="hora_fin" name="hora_fin" class="form-control" value="<?php echo htmlspecialchars($actividad['hora_fin']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="organizador" class="form-label">Organizador:</label>
                        <input type="text" id="organizador" name="organizador" class="form-control" value="<?php echo htmlspecialchars($actividad['organizador_id']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación:</label>
                        <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="<?php echo htmlspecialchars($actividad['ubicacion_id']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="coste" class="form-label">Coste:</label>
                        <input type="number" step="0.01" id="coste" name="coste" class="form-control" value="<?php echo htmlspecialchars($actividad['coste']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_alumnos" class="form-label">Total Alumnos:</label>
                        <input type="number" id="total_alumnos" name="total_alumnos" class="form-control" value="<?php echo htmlspecialchars($actividad['total_alumnos']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="objetivo" class="form-label">Objetivo:</label>
                        <textarea id="objetivo" name="objetivo" class="form-control" required><?php echo htmlspecialchars($actividad['objetivo']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                </form>
            </div>
        </div>
        <a href="actividades.php" class="btn btn-secondary mt-3">Volver a Actividades</a>
    </div>
</body>
</html>