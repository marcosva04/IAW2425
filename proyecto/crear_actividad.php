<?php
session_start();
include 'auth.php';
include 'db.php';
redirigirSiNoAutenticado();

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

 
    // Validar que la fecha de inicio no sea posterior a la fecha de fin
    $fechaInicio = strtotime($fecha_inicio . ' ' . $hora_inicio);
    $fechaFin = strtotime($fecha_fin . ' ' . $hora_fin);

    if ($fechaInicio > $fechaFin) {
        die("La fecha de inicio no puede ser posterior a la fecha de fin.");
    }

    // Insertar la actividad en la base de datos
    try {
        $stmt = $conn->prepare("INSERT INTO actividades (titulo, tipo, departamento_id, profesor_responsable_id, trimestre, fecha_inicio, hora_inicio, fecha_fin, hora_fin, organizador_id, ubicacion_id, coste, total_alumnos, objetivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $tipo, $departamento, $profesor_responsable, $trimestre, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin, $organizador, $ubicacion, $coste, $total_alumnos, $objetivo]);

        // Redirigir a la página de actividades después de crear
        header('Location: actividades.php');
        exit();
    } catch (PDOException $e) {
        die("Error al crear la actividad: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Actividad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear Nueva Actividad</h1>
        <div class="card shadow">
            <div class="card-body">
                <form method="POST">
                    <!-- Campo: Título -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" required>
                    </div>

                    <!-- Campo: Tipo -->
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <select id="tipo" name="tipo" class="form-select" required>
                            <option value="extraescolar">Extraescolar</option>
                            <option value="complementaria">Complementaria</option>
                        </select>
                    </div>

                    <!-- Campo: Departamento -->
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento:</label>
                        <input type="text" id="departamento" name="departamento" class="form-control" required>
                    </div>

                    <!-- Campo: Profesor Responsable -->
                    <div class="mb-3">
                        <label for="profesor_responsable" class="form-label">Profesor Responsable:</label>
                        <input type="text" id="profesor_responsable" name="profesor_responsable" class="form-control" required>
                    </div>

                    <!-- Campo: Trimestre -->
                    <div class="mb-3">
                        <label for="trimestre" class="form-label">Trimestre:</label>
                        <select id="trimestre" name="trimestre" class="form-select" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <!-- Campo: Fecha Inicio -->
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha Inicio:</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                    </div>

                    <!-- Campo: Hora Inicio -->
                    <div class="mb-3">
                        <label for="hora_inicio" class="form-label">Hora Inicio:</label>
                        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" required>
                    </div>

                    <!-- Campo: Fecha Fin -->
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha Fin:</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
                    </div>

                    <!-- Campo: Hora Fin -->
                    <div class="mb-3">
                        <label for="hora_fin" class="form-label">Hora Fin:</label>
                        <input type="time" id="hora_fin" name="hora_fin" class="form-control" required>
                    </div>

                    <!-- Campo: Organizador -->
                    <div class="mb-3">
                        <label for="organizador" class="form-label">Organizador:</label>
                        <input type="text" id="organizador" name="organizador" class="form-control" required>
                    </div>

                    <!-- Campo: Ubicación -->
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación:</label>
                        <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
                    </div>

                    <!-- Campo: Coste -->
                    <div class="mb-3">
                        <label for="coste" class="form-label">Coste:</label>
                        <input type="number" step="0.01" id="coste" name="coste" class="form-control" required>
                    </div>

                    <!-- Campo: Total Alumnos -->
                    <div class="mb-3">
                        <label for="total_alumnos" class="form-label">Total Alumnos:</label>
                        <input type="number" id="total_alumnos" name="total_alumnos" class="form-control" required>
                    </div>

                    <!-- Campo: Objetivo -->
                    <div class="mb-3">
                        <label for="objetivo" class="form-label">Objetivo:</label>
                        <textarea id="objetivo" name="objetivo" class="form-control" required></textarea>
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-primary w-100">Crear Actividad</button>
                </form>
            </div>
        </div>
        <a href="actividades.php" class="btn btn-secondary mt-3">Volver a Actividades</a>
    </div>
</body>
</html>