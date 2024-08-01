<?php 

function conectarBD() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'eliezer', 'bienesraices_crud');

    if(!$db) {
        echo "Error, no se puedo conectar";
        exit;
    } 

    return $db;
}