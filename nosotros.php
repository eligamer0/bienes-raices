<?php 
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido_nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
                </picture>
            </div>

            <div class="texto_nosotros">
                <blockquote class="años">
                    25 Años de experiencia
                </blockquote>

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
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="inoco__nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Inoco seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, aut mollitia explicabo
                    quam eum ipsam sint expedita soluta rerum repellendus magnam nulla debitis necessitatibus similique
                    animi architecto voluptatum. Eum, ad.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Inoco precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, aut mollitia explicabo
                    quam eum ipsam sint expedita soluta rerum repellendus magnam nulla debitis necessitatibus similique
                    animi architecto voluptatum. Eum, ad.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Inoco tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, aut mollitia explicabo
                    quam eum ipsam sint expedita soluta rerum repellendus magnam nulla debitis necessitatibus similique
                    animi architecto voluptatum. Eum, ad.
                </p>
            </div>
        </div>
    </>

<?php
    incluirTemplate('footer');
?>