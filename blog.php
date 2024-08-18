<?php 
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido_centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada_blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img lang="lazy" src="build/img/blog1.jpg" alt="texto entrada Blog">
                </picture>
            </div>

            <div class="texto_entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>21/06/2024</span> por: <samp>Admin</samp> </p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales 
                        y ahorrando dinero 
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada_blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img lang="lazy" src="build/img/blog2.jpg" alt="texto entrada Blog">
                </picture>
            </div>

            <div class="texto_entrada">
                <a href="entrada.html">
                    <h4>Guía para decoración de tu hogar</h4>
                    <p>Escrito el: <span>21/06/2024</span> por: <samp>Admin</samp> </p>

                    <p>Maximixa el espacio en tu hogar con esta guia, aprende a combinar muebles 
                        y colores para darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada_blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img lang="lazy" src="build/img/blog3.jpg" alt="texto entrada Blog">
                </picture>
            </div>

            <div class="texto_entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>21/06/2024</span> por: <samp>Admin</samp> </p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales 
                        y ahorrando dinero 
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada_blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img lang="lazy" src="build/img/blog4.jpg" alt="texto entrada Blog">
                </picture>
            </div>

            <div class="texto_entrada">
                <a href="entrada.html">
                    <h4>Guía para decoración de tu hogar</h4>
                    <p>Escrito el: <span>21/06/2024</span> por: <samp>Admin</samp> </p>

                    <p>Maximixa el espacio en tu hogar con esta guia, aprende a combinar muebles 
                        y colores para darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>
    </main>

<?php
    incluirTemplate('footer');
?>