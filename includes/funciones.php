<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones.php');

function incluirTemplate($nombre, $inicio = true) {
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    } 
    return false;
}

