<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach2</title>
</head>
<body>
    <?php

    $diccionario = array("hola" => "hello", "adios" => "bye",
    "mesa" => "table", "ordenador" => "computer", "bicicleta" => "bike");
    echo "<h1> Diccionario español - inglés </h1>";
    echo "<ul>";
    foreach ($diccionario as $palabraEspanol => $palabraIngles){
        echo "<li>$palabraEspanol se traduce como $palabraIngles</li>";
    };
    echo "</ul>";
?>
</body>
</html>