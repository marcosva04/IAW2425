<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navegador PHP</title>
</head>
<body>
<?php
    $a=array("red","green","blue","yellow","brown");
    $random_keys=array_rand($a,3);
    echo $a[$random_keys[0]]."<br>";
    echo $a[$random_keys[1]]."<br>";
    echo $a[$random_keys[2]];
?>
</body>
</html>