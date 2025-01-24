<?php
session_start();
include 'auth.php';
include 'db.php';
redirigirSiNoAutenticado();

// Obtener todas las actividades
try {
    $stmt = $conn->query("SELECT * FROM actividades");
    $actividades = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener las actividades: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Actividades</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="crear_actividad.php" class="btn btn-success">Crear Nueva Actividad</a>
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Departamento</th>
                        <th>Profesor Responsable</th>
                        <th>Trimestre</th>
                        <th>Fecha Inicio</th>
                        <th>Hora Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Hora Fin</th>
                        <th>Organizador</th>
                        <th>Ubicación</th>
                        <th>Coste</th>
                        <th>Total Alumnos</th>
                        <th>Objetivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($actividades as $actividad): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($actividad['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['tipo']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['departamento']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['profesor_responsable']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['trimestre']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['fecha_inicio']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['hora_inicio']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['fecha_fin']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['hora_fin']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['organizador']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['ubicacion']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['coste']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['total_alumnos']); ?></td>
                        <td><?php echo htmlspecialchars($actividad['objetivo']); ?></td>
                        <td class="text-nowrap">
                            <a href="editar_actividad.php?id=<?php echo $actividad['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_actividad.php?id=<?php echo $actividad['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>