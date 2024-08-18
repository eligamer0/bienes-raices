<?php 

if (!isset($_SESSION)) {
    session_start();
    
}

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="header inicio">
        <div class="contenedor contenido__header">
            <div class="barra">
                <a href="/bienesraices/index.php">
                    <img src="build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile_menu">
                    <img src="build/img/barras.svg" alt="inoco menu">
                </div>
                <div class="derecha">
                    <img class="dark_mode_boton" src="build/img/dark-mode.svg" alt="boton para el modo oscuro">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <a href="login.php">Iniciar Sesión</a>
                        <?php if($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
             </div> <!-- .barra -->
            <h1>Ventas de Casas y Departamentos Exclusivos de Lujo </h1>
        </div>
    </header>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Ventas</h2>

        <?php
        // Limite de las propiedades
        $limite = 3;

        //incluyendo anuncios
        include 'includes/templates/anuncios.php';
        ?>
        
        <div class="alinear__derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen_contacto">
        <h2> Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario y un asesor se pondrá en contacto contigo</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion_inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada_blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img lang="lazy" src="build/img/blog1.jpg" alt="texto entrada Blog">
                    </picture>
                </div>

                <div class="texto_entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion_meta">Escrito el: <span>21/06/2024</span> por: <samp>Admin</samp> </p>

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
                    <a href="entrada.php">
                        <h4>Guía para decoracion de tu hogar</h4>
                        <p class="informacion_meta">Escrito el: <span>21/06/2024</span> por: <samp>Admin</samp> </p>

                        <p>Maximixa el espacio en tu hogar con esta guia, aprende a combinar muebles 
                            y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales ">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y 
                    la casa que me ofrecieron cumple con todas mis expectativa 
                </blockquote>
                <p>~ Eliezer Rosario</p>
            </div>
        </section>
    </div>

    <footer class="footer seccion">
        <div class="contenedor contenido__footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos Reservados 2024 &copy;</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>