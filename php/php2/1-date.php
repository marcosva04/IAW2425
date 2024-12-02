<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fecha y hora</title>
</head>
<body>
    <?php
    $dia = date("d");
    $mes = date("F");
    $anyo = date("Y");
    $hora = date("H");
    $minutos = date("i");

    echo "Hoy es " . $dia . " de " . $mes . " de " . $anyo . "<br>";
    echo "Son las " . $hora . ":" . $minutos;

?>
</body>
</html>