<?php 

    require '../includes/funciones.php';
    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    // echo "<pre>";
    //     var_dump($_POST);
    // echo "</pre>";

    // Importar la conexión
    require '../includes/config/database.php';
    $db = conectarBD();
    // Escribir el Query
    $query = "SELECT * FROM propiedades";
    // // Consultar la BD
    $resultado1 = mysqli_query($db, $query);


    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    // Eliminar propiedad
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            // Elimina el archivo 
            $query =  "SELECT imagen FROM propiedades WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../imagenes' .$propiedad['imagen']);
            // exit;

            // Elimina la propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('location: http://localhost/bienesraices/admin/index.php?resultado=3');
            }
        }
    }

    // Incluye un template 


    incluirTemplate('header');

    // var_dump($resultado)
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1> 
    <?php if($resultado === "1"): ?>
        <p class="alerta exito">Anuncio Creado correctamente </p>
    <?php endif; ?>
    <?php if($resultado === "2"): ?>
        <p class="alerta exito">Anuncio Actualizado correctamente </p>
    <?php endif; ?>
    <?php if($resultado === "3"): ?>
        <p class="alerta exito">Anuncio Eliminado correctamente </p>
    <?php endif; ?>
    
    <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
</main>

<table class="propiedades">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody> <!-- Mostrar los resultados  -->
        <?php while( $propiedad = mysqli_fetch_assoc($resultado1) ): ?>
        <tr>
            <td> <?php echo $propiedad['id']; ?> </td>
            <td> <?php echo $propiedad['titulo']; ?> </td>
            <td> <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen_tabla"> </td>
            <td> $<?php echo $propiedad['precio']; ?></td>
            <td>
                <form method="POST" class="w-100">
                    <input type="hidden" name="id" value=" <?php echo $propiedad['id']; ?> ">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>
                <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                    Actualizar
                </a>
            </td>
            <?php endwhile; ?>
        </tr>
    </tbody>
</table>

<?php
// cerrar la conexión
    incluirTemplate('footer');
?>
