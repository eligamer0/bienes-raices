<?php 
    // Importar la conexión 
    require 'includes/config/database.php';
    $db = conectarBD();

    // Consurtar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    // Obtener resultado
    $resultado = mysqli_query($db, $query);
?>
<div class="contenedor__anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio"> 
        <picture>
            <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
        </picture>

        <div class="contenido__anuncio"> <!-- 3 -->
            <h3><?php echo $propiedad['titulo']; ?></h3> 
            <p><?php echo $propiedad['descripcion']; ?></p>
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

            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div> <!-- .contenido__anuncio -->
    </div> <!-- .anuncio -->
    <?php endwhile; ?>
</div> <!-- .contenedor__anuncio -->

<?php 
// Cerrar conexión
mysqli_close($db);
?>