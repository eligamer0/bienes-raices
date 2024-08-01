<?php

require 'app.php';

function incluirTemplate($nombre, $inicio = true) {
    include TEMPLATES_URL . "/${nombre}.php";
}
?>
