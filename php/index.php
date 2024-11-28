<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navegador PHP</title>
</head>
<body>
<?php
$archivos = array_diff(scandir('.'), ['.', '..']);
echo "<ul>";
foreach ($archivos as $archivo) {
	echo "<li><a href=\"$archivo\"
target=\"_blank\">$archivo</a></li>";
}
echo "</ul>";

 ?>
</body>
</html>