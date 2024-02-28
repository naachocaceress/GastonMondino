<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastón Mondino - Crear</title>
    <link rel="icon" type="image/png" href="img/perfil2.png">

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/blogRedaccion.css" />
    <link rel="stylesheet" href="css/estilos.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./tinymce/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(function() {
            $("header").load("header.html");
        });
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>

<body>

    <header></header>

    <?php
    // Variables para almacenar los datos de la entrada
    $titulo = "";
    $imagen = "";
    $contenido = "";

    // Verificar si hay un ID en la URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Conectar a la base de datos

        // Comprobar si el ID existe
        $sql = "SELECT * FROM entradas_blog WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Obtener los datos de la entrada
            $entrada = $resultado->fetch_assoc();
            // Obtener los datos específicos de la entrada
            $titulo = htmlspecialchars($entrada['titulo']);
            $etiqueta = htmlspecialchars($entrada['etiqueta']);
            $imagenBlob = $entrada['imagen']; // Guarda el BLOB en una variable separada

            // Convertir el BLOB en una URL utilizando base64
            $imagen = 'data:image/jpeg;base64,' . base64_encode($imagenBlob);
            $contenido = htmlspecialchars($entrada['contenido']);
        }
    }
    ?>

    <form id="formulario" class="formulario" enctype="multipart/form-data">

        <br>
        <h1 class="text-center border-bottom">Editar blog</h1>

        <input type="hidden" id="entrada_id" value="<?php echo $id; ?>">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="titulo">• Título:</label>
                                <input type="text" class="form-control" id="titulo" placeholder="Ingrese el título" value="<?php echo $titulo; ?>">
                            </div> <br>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="etiqueta">• Etiqueta:</label>
                                <select class="form-select" id="etiqueta" aria-label="Default select example">
                                    <option value="Blog" <?php if ($etiqueta == "Blog") echo " selected"; ?>>Blog</option>
                                    <option value="Video" <?php if ($etiqueta == "Video") echo " selected"; ?>>Video</option>
                                </select>
                            </div>


                        </div>

                    </div>


                    <div class="form-group">
                        <label for="imagen">• Imagen principal:</label><br>
                        <input type="file" class="form-control-file" id="imagen" onchange="mostrarImagenPreview()">
                    </div><br>
                </div>
                <div class="col-md-4 contImg">
                    <div id="imagen-preview">
                        <?php if (!empty($imagen)) { ?>
                            <img src="<?php echo $imagen; ?>" class="imgP" alt="Imagen principal">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <textarea id="editor"><?php echo $contenido; ?></textarea>

        <div class="d-flex justify-content-center">
            <button type="button" class="custom-btn" onclick="editarContenido()">Guardar</button>
        </div>
    </form>

    <script src="js/blogRedaccion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>