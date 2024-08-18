<?php 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); 

    if(!$id) {
        header ('Location: http://localhost/bienesraices/index.php');
    }

    // Importar la conexión 
    require 'includes/config/database.php';
    $db = conectarBD();

    // Consurtar
    $query = "SELECT * FROM propiedades WHERE id = ${id}";

    // Obtener resultado
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido_centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <picture>
            <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la Propiedad">
        </picture>

        <div class="resumen_propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>

            <ul class="iconos__caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php
    incluirTemplate('footer');

    // Cerrar conexión
    mysqli_close($db);
?>