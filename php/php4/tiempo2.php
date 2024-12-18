<?php

$text = file_get_contents("https://www.eltiempo.es/sevilla.html");

$resultado = (explode('<span class="text-roboto-condensed">', $text));

print_r($resultado[5]);

?>