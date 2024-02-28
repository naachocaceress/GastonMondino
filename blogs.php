<!DOCTYPE html>
<html lang="en">

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
    $conexion = new mysqli('localhost', 'nacho', '1234', 'u607022590_GastonPageBase');

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
            // Obtener el contenido completo dentro del bucle
            $contenidoCompleto = htmlspecialchars($fila['contenido']);

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

    $conexion->close();
    ?>

    <main class="container">

        <?php if (!empty($entradas[0])) : ?>

            <div class="col-md-4 d-sm-none" data-aos=""> <br>
                <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;">
                    <div class="ratio ratio-16x9">
                        <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c">
                            <img src="<?php echo htmlspecialchars($entradas[0]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                        </a>
                    </div>
                    <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">
                            <?php echo htmlspecialchars($entradas[0]['etiqueta']); ?>
                        </strong>
                        <h3 class="tituloH mb-0">
                            <?php echo htmlspecialchars($entradas[0]['titulo']); ?>
                        </h3>
                        <div class="mb-1 text-body-secondary">
                            <?php echo date("d-m-Y", strtotime($entradas[0]['fecha'])); ?>
                        </div>
                        <p class="textoP mb-auto">

                            <?php echo html_entity_decode($entradas[0]['contenido']); ?>


                        </p>
                        <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[0]['id']); ?>" class="linkAPagina">Continuar Leyendo</a>
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
                    <p class="lead my-3">

                        <?php echo html_entity_decode($entradas[0]['contenido']); ?>...

                    </p>
                    <p class="lead mb-0 linkAPaginaBlog">
                        <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[0]['id']); ?>" class="linkAPaginaBlog fw-bold">Continuar Leyendo</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg>
                    </p>
                </div>
            </div>

        <?php endif; ?>


        <div class="row mb-2">

            <?php if (!empty($entradas[1])) : ?>

                <div class="col-md-4 d-sm-none" data-aos="fade-right"> <br>
                    <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;">
                        <div class="ratio ratio-16x9">
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[1]['id']); ?>">
                                <img src="<?php echo htmlspecialchars($entradas[1]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                            </a>
                        </div>
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">
                                <?php echo htmlspecialchars($entradas[1]['etiqueta']); ?>
                            </strong>
                            <h3 class="tituloH mb-0">
                                <?php echo htmlspecialchars($entradas[1]['titulo']); ?>
                            </h3>
                            <div class="mb-1 text-body-secondary">
                                <?php echo date("d-m-Y", strtotime($entradas[1]['fecha'])); ?>
                            </div>
                            <p class="textoP mb-auto">
                                <?php echo html_entity_decode($entradas[1]['contenido']); ?>...
                            </p>
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[1]['id']); ?>" class="linkAPagina">Continuar Leyendo</a>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($entradas[1])) : ?>

                <div class="col-md-6 d-none d-sm-block" data-aos="fade-right"> <br>
                    <div class="tarjetaBlog row g-0 border rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="background-color: white;">
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">
                                <?php echo htmlspecialchars($entradas[1]['etiqueta']); ?>
                            </strong>
                            <h3 class="tituloH mb-0">
                                <?php echo htmlspecialchars($entradas[1]['titulo']); ?>
                            </h3>
                            <div class="mb-1 text-body-secondary">
                                <?php echo date("d-m-Y", strtotime($entradas[1]['fecha'])); ?>
                            </div>
                            <p class="textoP mb-auto">
                                <?php echo html_entity_decode($entradas[1]['contenido']); ?>...
                            </p>
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[1]['id']); ?>" class="linkAPagina">Continuar Leyendo</a>
                        </div>
                        <div class="tarjetaImagen col-auto d-none d-lg-block">
                            <img src="<?php echo htmlspecialchars($entradas[1]['imagen']); ?>" class="imagenImg" alt="Imagen principal">
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($entradas[2])) : ?>

                <div class="col-md-4 d-sm-none" data-aos="fade-right"> <br>
                    <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;">
                        <div class="ratio ratio-16x9">
                            <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c">
                                <img src="<?php echo htmlspecialchars($entradas[2]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                            </a>
                        </div>
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">
                                <?php echo htmlspecialchars($entradas[2]['etiqueta']); ?>
                            </strong>
                            <h3 class="tituloH mb-0">
                                <?php echo htmlspecialchars($entradas[2]['titulo']); ?>
                            </h3>
                            <div class="mb-1 text-body-secondary">
                                <?php echo date("d-m-Y", strtotime($entradas[2]['fecha'])); ?>
                            </div>
                            <p class="textoP mb-auto">
                                <?php echo html_entity_decode($entradas[2]['contenido']); ?>...
                            </p>
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[2]['id']); ?>" class="linkAPagina">Continuar Leyendo</a>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($entradas[2])) : ?>

                <div class="col-md-6 d-none d-sm-block" data-aos="fade-left"> <br>
                    <div class="tarjetaBlog row g-0 border rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="background-color: white;">
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">
                                <?php echo htmlspecialchars($entradas[2]['etiqueta']); ?>
                            </strong>
                            <h3 class="tituloH mb-0">
                                <?php echo htmlspecialchars($entradas[2]['titulo']); ?>
                            </h3>
                            <div class="mb-1 text-body-secondary">
                                <?php echo date("d-m-Y", strtotime($entradas[2]['fecha'])); ?>
                            </div>
                            <p class="textoP mb-auto">
                                <?php echo html_entity_decode($entradas[2]['contenido']); ?>...
                            </p>
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[2]['id']); ?>" class="linkAPagina">Continuar Leyendo</a>
                        </div>
                        <div class="tarjetaImagen col-auto d-none d-lg-block">
                            <img src="<?php echo htmlspecialchars($entradas[2]['imagen']); ?>" class="imagenImg" alt="Imagen principal">
                        </div>
                    </div>
                </div>

            <?php endif; ?>


        </div>

        <br>

        <div class="row mb-2">

            <div class="col-md-8">
                <h3 class="mb-4 border-bottom">Últimas entradas</h3>

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">Sostener el hábito, hasta que el hábito te sostenga a
                        vos</h2>
                    <p class="blog-post-meta">Diciembre 8, 2023</p>

                    <div class="cuerpoBlog">
                        <p>¿Por qué el hábito es algo crucial es nuestra vida, en nuestro dia a dia?</p>
                        <p>En nuestra evolución nos ha permitido, entre otras cosas, adaptarnos al entorno, transmitir
                            acervos de generación a generación, generar comunidad, enfrentar y disminuir algo que hoy
                            nos sucede mucho, el miedo a la incertidumbre.</p>
                        <p>Sin dudas, somos animales de hábitos y costumbres, algunas potenciadoras y otras que limitan
                            nuestro potencial o aquello que queremos lograr.</p>
                        <p>Trabajar sobre los hábitos, es trabajar la identidad de quienes estamos siendo en el aquí
                            ahora, que resultados estamos obteniendo, y quienes necesitamos ser en adelante para lograr
                            eso diferente que visualizamos a futuro.</p>
                        <p>Contame ¿Son consciente de tus hábitos potenciadores y de aquellos que no lo son tanto?</p>
                    </div>

                    <div class="d-flex p-2" style="justify-content: flex-end;">
                        <a href="#" class="linkAPagina">Continuar Leyendo</a>
                    </div>
                </article>

                <hr>

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">Lo que te rodea define tu identidad</h2>
                    <p class="blog-post-meta">Diciembre 2, 2023</p>

                    <div class="cuerpoBlog">
                        <p>¿Cuánto de tu entorno hay en tu identidad? ¿Cuanto tuyo hay en tu entorno?</p>
                        <p>Mirar nuestra identidad sin mirar nuestro entorno es perderse de una gran posibilidad de
                            registro de porque hacemos lo que hacemos, decimos lo que decimos y sentimos lo que
                            sentimos.</p>
                        <p>No es determinante pero si condicionante y eso nos da la posibilidad de poder cambiar lo que
                            haya que cambiar, adaptarnos y construirnos en las relaciones desde la coherencia entre
                            nuestro pensar, sentir y hacer.</p>
                        <p>Sin dudas, nuestro autoestima, nuestra autopercepción no solo nos pertenece a nosotros sino
                            que deberemos mirarla desde un prisma relacional, cultural, social y experiencial porque
                            somos con otros, siempre.</p>
                    </div>

                    <div class="d-flex p-2" style="justify-content: flex-end;">
                        <a href="#" class="linkAPagina">Continuar Leyendo</a>
                    </div>
                </article>

                <hr>

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">¿Cuánto presente hay en tu escucha?</h2>
                    <p class="blog-post-meta">Noviembre 3, 2023</p>

                    <div class="cuerpoBlog">
                        <p>Es muy común hoy en día estar atravesado por múltiples distracciones, infinidad de obstáculos
                            e innumerables inconvenientes que nos permitan entregarnos de lleno a la conversación con
                            alguien</p>
                        <p>Para que la comunicación sea realmente efectiva no solo debemos hablar sino que antes que
                            nada debemos aprender a escuchar</p>
                        <p>Sin dudas, el contexto es clave y escucharse es uno de los grandes desafíos que tenemos hoy
                            en día para poder crecer en la relación con los demás</p>
                        <p>¿Qué opinas? Te leo</p>
                    </div>

                    <div class="d-flex p-2" style="justify-content: flex-end;">
                        <a href="#" class="linkAPagina">Continuar Leyendo</a>
                    </div>
                </article>

                <hr>

                <nav class="blog-pagination text-center" aria-label="Pagination">
                    <a href="#" class="ov-btn-grow-ellipse">Ver más</a>
                </nav>

            </div>

            <div class="col-md-4 d-none d-md-block ultiVideos">

                <h3 class="border-bottom">Últimos videos</h3>

                <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;" data-aos="fade-left">
                    <div class="ratio ratio-16x9">
                        <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c"><img src="/img/miniaturaYoutube.jpg" class="rounded-4"></a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Comunicación cortita y al pie</h5>
                        <p class="card-text">A la hora de comunicar tu mensaje, tu marca o algo...</p>
                        <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c" class="card-text linkAPagina">Ver
                            video</a>
                    </div>
                </div>

                <br>

                <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;" data-aos="fade-left">
                    <div class="ratio ratio-16x9">
                        <a href="https://www.youtube.com/watch?v=TOtl9kiILAo"><img src="/img/miniaturaYoutube2.jpg" class="rounded-4"></a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">¿Practicamos? Vamos juntos</h5>
                        <p class="card-text">Se que hablar de comunicación hoy en dia es todo un desafío...</p>
                        <a href="https://www.youtube.com/watch?v=TOtl9kiILAo" class="card-text linkAPagina">Ver
                            video</a>
                    </div>
                </div>

                <br>

                <h3 class="border-bottom">Últimos podcasts</h3>

                <div class="mx-auto" data-aos="fade-left">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/2PTFl7XnmPk4Z39GML3SoF?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>

                <br>

                <div class="mx-auto" data-aos="fade-left">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/26DtyuPXXkK6MBlT0zGpD2?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>

                <br>

                <div class="mx-auto" data-aos="fade-left">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/3jq7Eby5dErEBsHvN0gcPb?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
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