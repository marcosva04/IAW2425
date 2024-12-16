<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Include/define</title>
</head>
<body>
    <?php
        include "config.php";
        echo "Batalla: " . constant("batalla") . "<br>";
        echo "Año: " . constant("año") . "<br>";
        echo "Fallecidos: " . constant("muertos");
    ?>
</body>
</html>