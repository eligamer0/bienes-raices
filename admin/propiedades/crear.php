<?php
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    // Base de Datos 
    require '../../includes/config/database.php';
    $db = conectarBD();

    // Consulta para obtener a los vendedores 
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedor_id = '';

    // Ejecutar el código después de enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
        if (!$imagen['name']) {
            $errores[] = "La Foto es Obligatoria";
        }

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
            // ** SUBIDA DE ARCHIVOS ** //
            
            // Crear carpeta 
            $carpetaImagenes = '../../imagenes/';

            // echo "<pre>";
            // var_dump($errores);
            // echo "</pre>";

            // echo $query;

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Generando un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            // Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedor_id) 
                      VALUES ('$titulo', '$precio' , '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedor_id')";
    
            $resultado = mysqli_query($db, $query);
    
            if ($resultado) {
                // Redireccionar al usuario
                header('Location: http://localhost/bienesraices/admin/index.php?resultado=1');
            }
        }
    }


    incluirTemplate('header');
?>
<!-- <body class="fondo_contacto"> -->
    <main class="contenedor seccion " >

        <h1>Crear</h1>  
        <!-- <section class="destacada3">
        </section> -->
        
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
    
        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <p><?php echo $error; ?></p>
        </div>
        <?php endforeach; ?>
    
        <form class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>
    
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">
    
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">
    
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
    
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
    
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
    
<!-- </body> -->

<?php
    incluirTemplate('footer');
?>
