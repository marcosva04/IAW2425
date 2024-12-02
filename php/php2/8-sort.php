<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach</title>
</head>
<body>
    <?php

    $nombres = ["Iván", "David", "Dani", "Alberto"];

    sort($nombres);
    $totalNombres = count($nombres);
    for ($i=0; $i<=$totalNombres-1; $i++){
        echo "$nombres[$i] <br>";
    }
?>
</body>
</html>