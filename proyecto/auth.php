<?php
session_start();

$usuarios = [
    'joseluisnunez' => 'joseluisnunez',
    'vicedirector' => 'vicedirector',
    'extraescolares' => 'extraescolares'
];

function autenticar($usuario, $password) {
    global $usuarios;
    return isset($usuarios[$usuario]) && $usuarios[$usuario] === $password;
}

function estaAutenticado() {
    return isset($_SESSION['usuario']);
}

function redirigirSiNoAutenticado() {
    if (!estaAutenticado()) {
        header('Location: login.php');
        exit();
    }
}
?>