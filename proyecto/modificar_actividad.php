<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $tipo = $_POST['tipo'];
    $departamento = $_POST['departamento'];
    $profesor_responsable = $_POST['profesor_responsable'];
    $trimestre = $_POST['trimestre'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $hora_inicio = $_POST['hora_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $hora_fin = $_POST['hora_fin'];
    $organizador = $_POST['organizador'];
    $acompañantes = $_POST['acompañantes'];
    $ubicacion = $_POST['ubicacion'];
    $coste = $_POST['coste'];
    $total_alumnos = $_POST['total_alumnos'];
    $objetivo = $_POST['objetivo'];

    $stmt = $conn->prepare("UPDATE actividades SET titulo=?, tipo=?, departamento=?, profesor_responsable=?, trimestre=?, fecha_inicio=?, hora_inicio=?, fecha_fin=?, hora_fin=?, organizador=?, acompañantes=?, ubicacion=?, coste=?, total_alumnos=?, objetivo=? WHERE id=?");
    $stmt->bind_param("sssssssssssssdi", $titulo, $tipo, $departamento, $profesor_responsable, $trimestre, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin, $organizador, $acompañantes, $ubicacion, $coste, $total_alumnos, $objetivo, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: dashboard.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM actividades WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Actividad</title>
</head>
<body>
    <h1>Modificar Actividad</h1>
    <a href="dashboard.php">Volver al Dashboard</a>
    <form method="POST" action="modificar_actividad.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>" required><br>
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="extraescolares" <?php if ($row['tipo'] == 'extraescolares') echo 'selected'; ?>>Extraescolares</option>
            <option value="complementarias" <?php if ($row['tipo'] == 'complementarias') echo 'selected'; ?>>Complementarias</option>
        </select><br>
        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento" value="<?php echo $row['departamento']; ?>" required><br>
        <label for="profesor_responsable">Profesor Responsable:</label>
        <input type="text" id="profesor_responsable" name="profesor_responsable" value="<?php echo $row['profesor_responsable']; ?>" required><br>
        <label for="trimestre">Trimestre:</label>
        <select id="trimestre" name="trimestre" required>
            <option value="1" <?php if ($row['trimestre'] == '1') echo 'selected'; ?>>1</option>
            <option value="2" <?php if ($row['trimestre'] == '2') echo 'selected'; ?>>2</option>
            <option value="3" <?php if ($row['trimestre'] == '3') echo 'selected'; ?>>3</option>
        </select><br>
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" required><br>
        <label for="hora_inicio">Hora Inicio:</label>
        <input type="time" id="hora_inicio" name="hora_inicio" value="<?php echo $row['hora_inicio']; ?>" required><br>
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $row['fecha_fin']; ?>" required><br>
        <label for="hora_fin">Hora Fin:</label>
        <input type="time" id="hora_fin" name="hora_fin" value="<?php echo $row['hora_fin']; ?>" required><br>
        <label for="organizador">Organizador:</label>
        <input type="text" id="organizador" name="organizador" value="<?php echo $row['organizador']; ?>" required><br>
        <label for="acompañantes">Acompañantes:</label>
        <textarea id="acompañantes" name="acompañantes"><?php echo $row['acompañantes']; ?></textarea><br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" required><br>
        <label for="coste">Coste:</label>
        <input type="number" step="0.01" id="coste" name="coste" value="<?php echo $row['coste']; ?>" required><br>
        <label for="total_alumnos">Total Alumnos:</label>
        <input type="number" id="total_alumnos" name="total_alumnos" value="<?php echo $row['total_alumnos']; ?>" required><br>
        <label for="objetivo">Objetivo:</label>
        <textarea id="objetivo" name="objetivo" required><?php echo $row['objetivo']; ?></textarea><br>
        <input type="submit" value="Modificar Actividad">
    </form>
</body>
</html>
