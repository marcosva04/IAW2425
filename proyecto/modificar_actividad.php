<?php
session_start();

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $departamento = mysqli_real_escape_string($conn, $_POST['departamento']);
    $profesor_responsable = mysqli_real_escape_string($conn, $_POST['profesor_responsable']);
    $trimestre = mysqli_real_escape_string($conn, $_POST['trimestre']);
    $fecha_inicio = mysqli_real_escape_string($conn, $_POST['fecha_inicio']);
    $hora_inicio = mysqli_real_escape_string($conn, $_POST['hora_inicio']);
    $fecha_fin = mysqli_real_escape_string($conn, $_POST['fecha_fin']);
    $hora_fin = mysqli_real_escape_string($conn, $_POST['hora_fin']);
    $organizador = mysqli_real_escape_string($conn, $_POST['organizador']);
    $acompañantes = mysqli_real_escape_string($conn, $_POST['acompañantes']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $coste = mysqli_real_escape_string($conn, $_POST['coste']);
    $total_alumnos = mysqli_real_escape_string($conn, $_POST['total_alumnos']);
    $objetivo = mysqli_real_escape_string($conn, $_POST['objetivo']);

    $query = "UPDATE actividades SET titulo='$titulo', tipo='$tipo', departamento='$departamento', profesor_responsable='$profesor_responsable', trimestre='$trimestre', fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio', fecha_fin='$fecha_fin', hora_fin='$hora_fin', organizador='$organizador', acompañantes='$acompañantes', ubicacion='$ubicacion', coste='$coste', total_alumnos='$total_alumnos', objetivo='$objetivo' WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: main.php");
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM actividades WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Actividad</title>
</head>
<body>
    <h1>Modificar Actividad</h1>
    <a href="main.php">Volver al main</a>
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