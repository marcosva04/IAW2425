<?php

$text = file_get_contents("tiempo.html");

$resultado = (explode("<td>", $text));

print_r($resultado);

?>