<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Triángulo de Asteriscos</title>
</head>
<body>
    <form method="post">
        <label for="numero">Introduce un número:</label>
        <input type="number" id="numero" name="numero" required>
        <input type="submit" value="Generar Triángulo">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = intval($_POST["numero"]);
        
        echo "<pre>";
        for ($i = 1; $i <= $numero; $i++) {
            for ($j = 0; $j < $i; $j++) {
                echo "*";
            }
            echo "\n";
        }
        echo "</pre>";
    }
    ?>
</body>
</html>
