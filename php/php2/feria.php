<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$fecha = date_create('2025-05-06');
$fechahoy =  date('Y-m-d');

$resta = strtotime($fechahoy)-strtotime($fecha);
$dias = $resta / (24*3600);
echo "Quedan para la feria ".$dias . " días";
?> 
</body>
</html>