<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobales</title>
</head>
<body>
    <?php
        $ip = $_SERVER['REMOTE_ADDR'];
        $navegador = $_SERVER['HTTP_USER_AGENT'];
        $pagina = $_SERVER['HTTP_REFERER'];

        echo "Direccion IP: " . $ip . "<br>";
        echo "Navegador: " . $navegador . "<br>";
        echo "Página de referencia: " . $pagina;
    ?>
</body>
</html>