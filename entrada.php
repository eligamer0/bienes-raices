<?php 
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido_centrado">
        <h1>Guía para decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la Propiedad">
        </picture>
        
        <p class="informacion_meta">Escrito el: <span>21/06/2024</span> por: <samp>Admin</samp> </p>
        
        <div class="resumen_propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam dolor praesentium consectetur 
                perspiciatis saepe cum pariatur quisquam ut rem? Nostrum optio perspiciatis tempora amet unde illum expedita ex, in odit.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui similique, 
                asperiores consequatur impedit totam quisquam iure, omnis consectetur 
                provident velit optio voluptates aut repudiandae dolorum nisi nostrum debitis vero perferendis.
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas culpa, 
                voluptatibus delectus placeat explicabo dolor quasi voluptatem sed provident 
                aut pariatur in ex aperiam earum voluptates tempora est suscipit voluptate!</p>

                <p>provident velit optio voluptates aut repudiandae dolorum nisi nostrum debitis vero perferendis.
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas culpa, 
                voluptatibus delectus placeat explicabo dolor quasi voluptatem sed provident 
                aut pariatur in ex aperiam earum voluptates tempora est suscipit voluptate!</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>