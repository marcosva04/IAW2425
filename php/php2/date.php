<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dia = date("d");
    $mes = date("F");
    $anyo = date("Y");

    echo "Hoy es " . $dia . " de " . $mes . " de " . $anyo;

?>
</body>
</html>