<?php
    // Importar la conexión
    require 'includes/config/database.php';
    $db = conectarBD();

    // Crear un email y password
    $email = 'correo@correo.com';
    $password = '123456';

    // Por si quiero un password hasheado
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    var_dump($passwordHash);

    // Query para crear el usuario
    $query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}'); ";

    echo $query;

    exit;

    // Agregarlo a la base de datos
    mysqli_query($db, $query);
