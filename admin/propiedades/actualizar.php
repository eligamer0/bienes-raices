<?php
    // id valido 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); 

    if(!$id) {
        header('Location: /admin');
    }

    // Base de Datos 
    require '../../includes/config/database.php';
    $db = conectarBD();

    // Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    // echo "<pre>";
    //     var_dump($resultado);
    // echo "</pre>";

    // Consulta para obtener a los vendedores 
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedor_id = $propiedad['vendedor_id'];
    $imagenPropiedad = $propiedad['imagen'];

    // Ejecutar el código después de enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo "<pre>";
        //     var_dump($_POST);
        // echo "</pre>";

        // exit;

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedor_id = $_POST['vendedor'];
        $creado = date('Y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        // Validaciones de los campos del formulario
        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores[] = "El precio es Obligatorio";
        }
        if (strlen($descripcion) <= 50) {
            $errores[] = "La Descripción es Obligatoria y debe tener al menos 50 caracteres"; 
        }
        if (!$habitaciones) {
            $errores[] = "El Número de habitaciones es Obligatorio";
        }
        if (!$wc) {
            $errores[] = "El Número de Baños es Obligatorio";
        }
        if (!$estacionamiento) {
            $errores[] = "El Número de lugares de Estacionamiento es Obligatorio";
        }
        if (!$vendedor_id) {
            $errores[] = "Elige un vendedor";
        }
        // if (!$imagen['name']) {
        //     $errores[] = "La Foto es Obligatoria";
        // }

        // Validar por tamaño (4 MB máximo)
        $medida = 1000 * 4000;

        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        // Revisar que el arreglo de errores esté vacío
        if (empty($errores)) {

             // Crear carpeta 
             $carpetaImagenes = '../../imagenes/';

             // // echo "<pre>";
             // // var_dump($errores);
             // // echo "</pre>";
 
             // // echo $query;
 
             if (!is_dir($carpetaImagenes)) {
                 mkdir($carpetaImagenes);  // Crear carpeta con permisos adecuados
             }

             $nombreImagen = '';

            // ** SUBIDA DE ARCHIVOS ** //
            
            if($imagen['name']) {
                // Eliminar imagen
                unlink($carpetaImagenes . $propiedad['imagen']);


                // Generando un nombre único
                $nombreImagen = md5(uniqid(rand(), true) ) . ".jpg";
    
                // Subir imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                $nombreImagen = $propiedad('imagen');
            }
           


            // Insertar en la base de datos
            $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = 
            ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedor_id = ${vendedor_id} WHERE id = ${id}";

            // echo $query;

            // exit;
            
            $resultado = mysqli_query($db, $query);
            
            if ($resultado) {
                // Redireccionar al usuario
                header('Location: http://localhost/bienesraices/admin/index.php?resultado=2');
            }
        }
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
<!-- <body class="fondo_contacto"> -->
    <main class="contenedor seccion " >

        <h1>Actualizar Propiedad</h1>  
        <!-- <section class="destacada3">
        </section> -->
        
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
    
        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <p><?php echo $error; ?></p>
        </div>
        <?php endforeach; ?>
    
        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>
    
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">
    
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">
    
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/bienesraices/imagenes/<?php echo $imagenPropiedad ?>" alt="">
    
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
    
            </fieldset>
    
            <fieldset>
                <legend>Información Propiedad</legend>
    
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej:3" min="1" max="9" value="<?php echo $habitaciones ?>">
    
                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej:3" min="1" max="9" value="<?php echo $wc ?>">
    
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej:3" min="1" max="9" value="<?php echo $estacionamiento ?>">
            </fieldset>
    
            <fieldset>
                <legend>Vendedor</legend>
    
                <select name="vendedor" >
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedor_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> 
                            <?php echo $vendedor['nombre']. " " . $vendedor['apellido']; ?> 
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>
    
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>
    
<!-- </body> -->

<?php
    incluirTemplate('footer');
?>
