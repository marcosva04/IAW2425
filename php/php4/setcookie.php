<?php

setcookie("nombre", "Pepito Conejo");

if (isset($_COOKIE["datos"]["nombre"]) && isset($_COOKIE["datos"]["apellidos"])) {
    print "<p>Su nombre es " . $_COOKIE["datos"]["nombre"] . " " . $_COOKIE["datos"]["apellidos"] . "</p>\n";
} else {
    print "<p>No sé su nombre.</p>\n";
}
?>