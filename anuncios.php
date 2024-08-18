<?php 
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h2>Casas y Departamentos en Ventas</h2>

        <?php
        // Limite de las propiedades
        $limite = 10;

        //incluyendo anuncios
        include 'includes/templates/anuncios.php';
        ?>
    </main>

<?php
    incluirTemplate('footer');
?>