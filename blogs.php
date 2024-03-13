<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastón Mondino - Blogs</title>
    <link rel="icon" type="image/png" href="/img/perfil2.png">

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/blog.css" />
    <link rel="stylesheet" href="/css/estilos.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function() {
            $("header").load("header.html");
            $("footer").load("footer.html");
        });
    </script>

    <link rel="stylesheet" href="../css/wapp.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>

<body class="blogsImportantes">

    <header></header>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/message/32ES7KUOOJEDE1?autoload=1&app_absent=0" class="float" target="_blank" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="¿Necesitas ayuda?">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <br><br><br><br>

    <?php

if ($conexion->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit;
}

$sql = "SELECT * FROM entradas_blog ORDER BY fecha_publicacion DESC LIMIT 3";

$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    $entradas = []; // Inicializar el array de entradas
    // Recorrer cada fila de resultados y guardar en el array de entradas
    while ($fila = $resultado->fetch_assoc()) {
        // Obtener el contenido completo dentro del bucle y limpiar las etiquetas HTML
        $contenidoCompleto = strip_tags($fila['contenido']);

        // Dividir el contenido en palabras
        $palabras = explode(" ", $contenidoCompleto);

        // Tomar las primeras 10 palabras
        $contenido = implode(" ", array_slice($palabras, 0, 18));

        $entrada = [
            'id' => $fila['id'],
            'titulo' => htmlspecialchars($fila['titulo']),
            'etiqueta' => htmlspecialchars($fila['etiqueta']),
            'fecha' => htmlspecialchars($fila['fecha_publicacion']),
            'imagen' => 'data:image/jpeg;base64,' . base64_encode($fila['imagen']), // Convertir imagen a base64
            'contenido' => $contenido // Aquí usamos $contenido en lugar de $contenidoCompleto
        ];
        $entradas[] = $entrada;
    }
}

    // Consulta SQL para obtener las últimas 3 entradas con la etiqueta "video"
    $sql_video = "SELECT * FROM entradas_blog WHERE etiqueta = 'video' ORDER BY fecha_publicacion DESC LIMIT 3";
    $resultado_video = $conexion->query($sql_video);

    // Verificar si se encontraron resultados
    if ($resultado_video->num_rows > 0) {
        $entradas_video = []; // Inicializar el array de entradas de video
        // Recorrer cada fila de resultados y guardar en el array de entradas de video
        while ($fila_video = $resultado_video->fetch_assoc()) {
            // Obtener el contenido completo dentro del bucle
            $contenidoCompleto = htmlspecialchars($fila_video['contenido']);

            // Dividir el contenido en palabras
            $palabras = explode(" ", $contenidoCompleto);

            // Tomar las primeras 10 palabras
            $contenido = implode(" ", array_slice($palabras, 0, 15));

            $entrada_video = [
                'id' => $fila_video['id'],
                'titulo' => htmlspecialchars($fila_video['titulo']),
                'etiqueta' => htmlspecialchars($fila_video['etiqueta']),
                'fecha' => htmlspecialchars($fila_video['fecha_publicacion']),
                'imagen' => 'data:image/jpeg;base64,' . base64_encode($fila_video['imagen']), // Convertir imagen a base64
                'contenido' => $contenido // Aquí usamos $contenido en lugar de $contenidoCompleto
            ];
            $entradas_video[] = $entrada_video;
        }
    }

    $conexion->close();
    ?>

    <main class="container">

        <?php if (!empty($entradas[0])) : ?>

            <div class="col-md-4 d-sm-none" data-aos=""> <br>
                <div class="card mx-auto rounded-4 cardSombra " style="max-width: 24rem;">
                    <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[0]['id']); ?>" class="fotoVideo"><img src="<?php echo htmlspecialchars($entradas[0]['imagen']); ?>" class="rounded-4 imgVideo"></a>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3">
                                <strong class="text-success-emphasis">
                                    <?php echo htmlspecialchars($entradas[0]['etiqueta']); ?>
                                </strong>
                            </div>
                            <div class="col-9 derechaA">
                                <span class="text-success-emphasis">
                                    <?php echo date("d-m-Y", strtotime($entradas[0]['fecha'])); ?>
                                </span>
                            </div>
                        </div>
                        <h3 class="card-title text">
                            <?php echo htmlspecialchars($entradas[0]['titulo']); ?>
                        </h3>

                        <div class="text">
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[0]['id']); ?>" class=" card-text linkAPagina">Leer más</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php if (!empty($entradas[0])) : ?>

            <div class="p-4 p-md-5 mb-4 rounded-4 text-body-emphasis d-none d-sm-block principal" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php echo htmlspecialchars($entradas[0]['imagen']); ?>);" data-aos="fade" data-aos-duration="1500">
                <div class="col-lg-9 px-0" style="color: white;">
                    <h1 class="display-4">
                        <?php echo htmlspecialchars($entradas[0]['titulo']); ?>
                    </h1>
                    
                    <div class="text">
<?php echo strip_tags($entradas[0]['contenido'], '<p>'); ?>[...]

</div>

                    <p class="lead mb-0 linkAPaginaBlog">
                        <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[0]['id']); ?>" class="linkAPaginaBlog fw-bold">Leer más</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg>
                    </p>
                </div>
            </div>

        <?php endif; ?>


        <div class="row mb-2">

            <?php if (!empty($entradas[1])) : ?>

                <div class="col-md-4 d-sm-none" data-aos=""> <br>
                    <div class="card mx-auto rounded-4 cardSombra " style="max-width: 24rem;">
                        <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[1]['id']); ?>" class="fotoVideo"><img src="<?php echo htmlspecialchars($entradas[1]['imagen']); ?>" class="rounded-4 imgVideo"></a>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <strong class="text-success-emphasis">
                                        <?php echo htmlspecialchars($entradas[1]['etiqueta']); ?>
                                    </strong>
                                </div>
                                <div class="col-9 derechaA">
                                    <span class="text-success-emphasis">
                                        <?php echo date("d-m-Y", strtotime($entradas[1]['fecha'])); ?>
                                    </span>
                                </div>
                            </div>
                            <h3 class="card-title text">
                                <?php echo htmlspecialchars($entradas[1]['titulo']); ?>
                            </h3>

                            <div class="text">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[1]['id']); ?>" class=" card-text linkAPagina">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($entradas[1])) : ?>

                <div class="col-md-6 d-none d-sm-block" data-aos="fade-right"> <br>
                    <div class="tarjetaBlog cardSombra row g-0 border rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="background-color: white;">
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <strong class="text-success-emphasis">
                                        <?php echo htmlspecialchars($entradas[1]['etiqueta']); ?>
                                    </strong>
                                </div>
                                <div class="col-9 derechaA">
                                    <span class="text-success-emphasis">
                                        <?php echo date("d-m-Y", strtotime($entradas[1]['fecha'])); ?>
                                    </span>
                                </div>
                            </div>

                            <h2 class="tituloH">
                                <?php echo htmlspecialchars($entradas[1]['titulo']); ?>
                            </h2>

                            <div class="quieto">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[1]['id']); ?>" class="linkAPagina">Leer más</a>
                            </div>
                        </div>

                        <div class="tarjetaImagen col-auto d-none d-lg-block">
                            <img src="<?php echo htmlspecialchars($entradas[1]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($entradas[2])) : ?>

                <div class="col-md-4 d-sm-none" data-aos=""> <br>
                    <div class="card mx-auto rounded-4 cardSombra " style="max-width: 24rem;">
                        <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[2]['id']); ?>" class="fotoVideo"><img src="<?php echo htmlspecialchars($entradas[2]['imagen']); ?>" class="rounded-4 imgVideo"></a>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <strong class="text-success-emphasis">
                                        <?php echo htmlspecialchars($entradas[2]['etiqueta']); ?>
                                    </strong>
                                </div>
                                <div class="col-9 derechaA">
                                    <span class="text-success-emphasis">
                                        <?php echo date("d-m-Y", strtotime($entradas[2]['fecha'])); ?>
                                    </span>
                                </div>
                            </div>
                            <h3 class="card-title text">
                                <?php echo htmlspecialchars($entradas[2]['titulo']); ?>
                            </h3>

                            <div class="text">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[2]['id']); ?>" class=" card-text linkAPagina">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($entradas[2])) : ?>

                <div class="col-md-6 d-none d-sm-block" data-aos="fade-left"> <br>
                    <div class="tarjetaBlog cardSombra row g-0 border rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="background-color: white;">
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <strong class="text-success-emphasis">
                                        <?php echo htmlspecialchars($entradas[2]['etiqueta']); ?>
                                    </strong>
                                </div>
                                <div class="col-9 derechaA">
                                    <span class="text-success-emphasis">
                                        <?php echo date("d-m-Y", strtotime($entradas[2]['fecha'])); ?>
                                    </span>
                                </div>
                            </div>

                            <h2 class="tituloH">
                                <?php echo htmlspecialchars($entradas[2]['titulo']); ?>
                            </h2>

                            <div class="quieto">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[2]['id']); ?>" class="linkAPagina">Leer más</a>
                            </div>
                        </div>

                        <div class="tarjetaImagen col-auto d-none d-lg-block">
                            <img src="<?php echo htmlspecialchars($entradas[2]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                        </div>
                    </div>
                </div>

            <?php endif; ?>


        </div>

        <br>

        <div class="row mb-2">

            <div class="col-md-8">
                <h3 class="mb-4 border-bottom">Otras entradas</h3>

                <div>
                    
                    <?php
                    setlocale(LC_TIME, 'es_ES.UTF-8'); // Establecer el idioma en español

                    // Realizar la conexión a la base de datos

                    // Verificar si la conexión fue exitosa
                    if ($conexion->connect_errno) {
                        echo "Falló la conexión a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
                        exit;
                    }

                    // Consulta SQL para obtener todas las entradas excepto las tres últimas
                    $sql_todas_entradas = "SELECT * FROM entradas_blog ORDER BY fecha_publicacion DESC LIMIT 3, 9999";
                    $resultado_todas_entradas = $conexion->query($sql_todas_entradas);

                    // Verificar si se encontraron resultados
                    if ($resultado_todas_entradas->num_rows > 0) {
                        // Inicializar el array de todas las entradas
                        $todas_entradas = [];
                        // Recorrer cada fila de resultados y guardar en el array de todas las entradas
                        while ($fila_entrada = $resultado_todas_entradas->fetch_assoc()) {
                            // Obtener el contenido completo dentro del bucle
                            $contenidoCompleto = $fila_entrada['contenido'];
                            // Dividir el contenido en palabras
                            $palabras = explode(" ", $contenidoCompleto);
                            // Tomar las primeras 10 palabras
                            $contenido = implode(" ", array_slice($palabras, 0, 40));

                            $entrada = [
                                'id' => $fila_entrada['id'],
                                'titulo' => htmlspecialchars($fila_entrada['titulo']),
                                'etiqueta' => htmlspecialchars($fila_entrada['etiqueta']),
                                'fecha' => htmlspecialchars($fila_entrada['fecha_publicacion']),
                                'contenido' => $contenido // Aquí usamos $contenido en lugar de $contenidoCompleto
                            ];
                            $todas_entradas[] = $entrada;
                        }
                    }

                    // Cerrar la conexión a la base de datos
                    $conexion->close();
                    ?>

                    <?php
                    foreach ($todas_entradas as $entrada) {
    // Eliminar etiquetas HTML del contenido
    $contenido_limpio = strip_tags($entrada['contenido']);

    // Truncar el contenido limpio a 40 palabras
    $palabras = explode(" ", $contenido_limpio);
    $contenido = implode(" ", array_slice($palabras, 0, 40));

    // Mostrar el contenido truncado
    ?>
    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"><?php echo $entrada['titulo']; ?></h2>
        <p class="blog-post-meta"><?php echo strftime("%e de %B de %Y", strtotime($entrada['fecha'])); ?></p>

        <p><?php echo $contenido; ?>[...]</p>

    </article>
    <div class="d-flex p-2" style="justify-content: flex-end;">
        <a href="https://gastonmondino.com/blog.php?id=<?php echo $entrada['id']; ?>" class="linkAPagina">Continuar Leyendo</a>
    </div>
    <hr>
    <?php
}

                    ?>

                </div>


                <nav class="blog-pagination text-center" aria-label="Pagination">
                    <!--<a href="#" class="ov-btn-grow-ellipse">Ver más</a>-->
                </nav>

            </div>

            <div class="col-md-4 d-none d-md-block ultiVideos">

                <h3 class="border-bottom">Últimos videos</h3>

                <?php if (!empty($entradas_video[0])) : ?>
                    <div data-aos="fade-left">

                        <div class="card mx-auto rounded-4 cardSombra">
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[0]['id']); ?>" class="fotoVideo"><img src="<?php echo htmlspecialchars($entradas_video[0]['imagen']); ?>" class="rounded-4 imgVideo"></a>
                            <div class="card-body">
                                <h3 class="card-title text-center">
                                    <?php echo htmlspecialchars($entradas_video[0]['titulo']); ?>
                                </h3>

                                <div class="text-center">
                                    <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[0]['id']); ?>" class=" card-text linkAPagina">Ver video</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <br>

                <?php if (!empty($entradas_video[1])) : ?>
                    <div data-aos="fade-left">
                        <div class="card mx-auto rounded-4 cardSombra">
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[0]['id']); ?>" class="fotoVideo"><img src="<?php echo htmlspecialchars($entradas_video[1]['imagen']); ?>" class="rounded-4 imgVideo"></a>
                            <div class="card-body">
                                <h3 class="card-title text-center">
                                    <?php echo htmlspecialchars($entradas_video[1]['titulo']); ?>
                                </h3>

                                <div class="text-center">
                                    <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[1]['id']); ?>" class=" card-text linkAPagina">Ver video</a>
                                </div>
                            </div>
                        </div>
                    </div <?php endif; ?> <br><br>

                    <h3 class="border-bottom">Últimos podcasts</h3>

                    <div class="mx-auto" data-aos="fade-left">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/2PTFl7XnmPk4Z39GML3SoF?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>

                    <br>

                    <div class="mx-auto" data-aos="fade-left">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/26DtyuPXXkK6MBlT0zGpD2?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>

            </div>

        </div>

    </main>

    <br><br>

    <div class="b-example-divider"></div>


    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>

</body>

</html>