<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastón Mondino - Tu Coach</title>
    <link rel="icon" type="image/png" href="/img/perfil2.png">

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/index.css" />
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

<body>

    <header></header>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/message/32ES7KUOOJEDE1?autoload=1&app_absent=0" class="float" target="_blank" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="¿Necesitas ayuda?">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- PHP -->

    <?php

    if ($conexion->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit;
    }

    // Consulta SQL para obtener las últimas 2 entradas con la etiqueta "blog"
    $sql_blog = "SELECT * FROM entradas_blog WHERE etiqueta = 'blog' ORDER BY fecha_publicacion DESC LIMIT 2";
    $resultado_blog = $conexion->query($sql_blog);

    // Verificar si se encontraron resultados
    if ($resultado_blog->num_rows > 0) {
        $entradas_blog = []; // Inicializar el array de entradas de blog
        // Recorrer cada fila de resultados y guardar en el array de entradas de blog
        while ($fila_blog = $resultado_blog->fetch_assoc()) {
            // Obtener el contenido completo dentro del bucle
            $contenidoCompleto = htmlspecialchars($fila_blog['contenido']);

            // Dividir el contenido en palabras
            $palabras = explode(" ", $contenidoCompleto);

            // Tomar las primeras 10 palabras
            $contenido = implode(" ", array_slice($palabras, 0, 25));

            $entrada_blog = [
                'id' => $fila_blog['id'],
                'titulo' => htmlspecialchars($fila_blog['titulo']),
                'etiqueta' => htmlspecialchars($fila_blog['etiqueta']),
                'fecha' => htmlspecialchars($fila_blog['fecha_publicacion']),
                'imagen' => 'data:image/jpeg;base64,' . base64_encode($fila_blog['imagen']), // Convertir imagen a base64
                'contenido' => $contenido // Aquí usamos $contenido en lugar de $contenidoCompleto
            ];
            $entradas_blog[] = $entrada_blog;
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



    <!-- Inicio -->
    <div class="my-custom-class d-flex mt-n5 justify-content-center align-items-center">
        <div class="row w-100 text-center" style="padding-left: 30px; padding-right: 30px;">

            <div class="col-md-6 p-2" data-aos="zoom-in">
                <div class="inicio">
                    <div style="white-space: nowrap;">
                        <h4 class="display-6">Comunicá</h4>
                        <h4 class="display-6" style="font-weight: bold;">Desde vos con tu voz</h4>
                        <h1 class="display-1" style="font-family: 'Lilita One'; margin: 0; padding: 0; font-weight: bold;                         ">
                            Y MARCÁ LA <br>DIFERENCIA </h1>
                    </div>

                    <hr>

                    <p class="lead" style="color: black;">Aprendé habilidades, técnicas,
                        tips, herramientas y mucho contenido de valor para impactar positivamente en
                        <strong>tu vida personal y laboral.</strong>
                    </p>

                    <br>

                    <h4><strong class="coete" style="padding: 10px; white-space: nowrap;">🚀 ¡Te acompaño a lograrlo!
                            🚀</strong></h4>
                    <a href="https://api.whatsapp.com/message/32ES7KUOOJEDE1?autoload=1&app_absent=0" class="ov-btn-grow-ellipse">¡Hablemos!</a>

                </div>
            </div>

            <div class="col-md-6 p-2" data-aos="zoom-in">
                <div class="inicio">
                    <img src="../img/perfil2.png" class="img-fluid imgInicio" alt="Bootstrap Themes">
                </div>
            </div>

            <div class="containerArrow">
                <div class="chevron"></div>
                <div class="chevron"></div>
                <div class="chevron"></div>
            </div>

        </div>

    </div>

    <div class="b-example-divider"></div>

    <!-- Mas sobre mi -->
    <div class="px-4 pt-5 my-5 text-center" id="porqueami">
        <h1 class="display-4 fw-bold text-body-emphasis">Sobre mi</h1>
        <div class="col-lg-6 mx-auto"> <br>

            <div class="row">
                <div class="col-md-6">
                    <div class="position-relative p-3 text-center text-muted bg-body border border-dashed rounded-5" data-aos="fade-right">
                        <p class="col-lg-6 mx-auto mb-4">
                        <p class="lead">Tengo más de 14 años de experiencia en el amplio mundo de la comunicación.
                        </p>
                        </p>
                    </div> <br> <br>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5" data-aos="fade-right">
                        <a href="/acercademi.html" class="ov-btn-grow-ellipse verde">Conoceme más</a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="position-relative p-3 text-center text-muted bg-body border border-dashed rounded-5">
                        <p class="col-lg-6 mx-auto mb-4">
                        <p class="lead mb-4">Me formo y me capacito constantemente para brindar el mejor servicio de
                            acompañamiento individual y grupal atendiendo a las exigencias que los desafíos del
                            mundo de hoy requieren.</p>
                        </p>
                    </div> <br>
                </div>
            </div>

            <div class="position-relative p-3 text-center text-muted bg-body border border-dashed rounded-5" data-aos="fade-left">
                <p class="col-lg-6 mx-auto mb-4">
                <p class="lead mb-4">Trabajo con un equipo de profesionales y colaboradores expertos en la
                    comunicación, la oratoria y liderazgo en organizaciones que potencian los procesos de
                    entrenamiento y las cualidades de individuales personalizadas de cada persona.</p>
                </p>
            </div> <br>

        </div>
    </div>

    <div class="b-example-divider"></div>

    <!-- Servicios -->
    <div class="container px-4 py-5" id="custom-cards-servicios">
        <h2 class="pb-2 border-bottom" style="background-color: white;">Servicios</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4 text-center">

            <div class="col flip-card">
                <div class="card text-bg-dark flip-card-inner">
                    <img src="/img/LOCUCION.jpg" class="card-img" alt="..." style="border-radius: 10px;">
                    <div class="card-img-overlay">
                        <h5 class="card-title card-front">LOCUCIÓN</h5>
                        <div class="click-indicator">
                            <img src="/img/iconos/hand-pointer-solid.svg" style="width: 25px">
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3>LOCUCIÓN</h3>
                        <p> - CONDUCCIÓN Y ANIMACIÓN DE EVENTOS <br>
                            - LOCUCIÓN COMERCIAL <br>
                            - VOZ EN OFF / VOICE OVER / AUDIOLIBROS
                        </p>
                        <div class="link">
                            <a href="#" class="linkAPagina">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col flip-card">
                <div class="card text-bg-dark flip-card-inner">
                    <img src="/img/ORATORIA.jpg" class="card-img" alt="..." style="border-radius: 10px;">
                    <div class="card-img-overlay">
                        <h5 class="card-title card-front">ORATORIA Y COMUNICACIÓN PROFESIONAL</h5>
                        <div class="click-indicator">
                            <img src="/img/iconos/hand-pointer-solid.svg" style="width: 25px">
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3>ORATORIA Y COMUNICACIÓN PROFESIONAL</h3>
                        <p> - ENTRENAMIENTO INDIVIDUAL PERSONALIZADO (PRESENCIAL/VIRTUAL) <br>
                            - ENTRENAMIENTOS GRUPALES (PRESENCIALES/VIRTUALES)
                        </p>
                        <div class="link">
                            <a href="#" class="linkAPagina">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col flip-card">
                <div class="card text-bg-dark flip-card-inner">
                    <img src="/img/COACHING ORGANIZACIONAL.jpeg" class="card-img" alt="..." style="border-radius: 10px;">
                    <div class="card-img-overlay">
                        <h5 class="card-title card-front">COACHING</h5>
                        <div class="click-indicator">
                            <img src="/img/iconos/hand-pointer-solid.svg" style="width: 25px">
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3>COACHING</h3>
                        <p> - CONVERSACIONES INDIVIDUALES DE COACHING ONTOLÓGICO <br>
                            - COACHING EJECUTIVO / ORGANIZACIONAL
                        </p>
                        <div class="link">
                            <a href="#" class="linkAPagina">Ver más</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="b-example-divider"></div>

    <!-- Testimonios -->
    <div class="container px-4 py-5" id="custom-cards-testimonios">
        <h2 class="pb-2 border-bottom" style="background-color: white;">Testimonios</h2> <br>

        <div class="wrapper">

            <i id="left" class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                    <path d="M10 12.796V3.204L4.519 8zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z" />
                </svg></i>

            <ul class="carousel">

                <li class="card">
                    <div class="img"><img src="/img/ALICIA.png" alt="img" draggable="false"></div>
                    <h2>Alicia</h2>
                    <span></span> <br>
                    <p class="text-center">"Quiero agradecerte la conversación de coaching que tuvimos. Me sentí
                        escuchada y acompañada. Tus preguntas me ayudaron a reflexionar, y a tener mayor claridad sobre
                        los objetivos que quiero lograr."</p>
                </li>

                <li class="card">
                    <div class="img"><img src="/img/SOFIA.png" alt="img" draggable="false"></div>
                    <h2>Sofia</h2>
                    <span></span> <br>
                    <p class="text-center">"En coaching se trabajan temas puntuales y Gastón me acompañó a través de
                        preguntas para buscarles una posible solución. En mi experiencia personal me ayudó a superar mis
                        miedos, por eso lo recomiendo mucho. Seguro vas aprender a escuchar, analizar y reflexionar
                        sobre vos y los demás"</p>
                </li>

                <li class="card">
                    <div class="img"><img src="/img/ANALIA.png" alt="img" draggable="false"></div>
                    <h2>Analia</h2>
                    <span></span> <br>
                    <p class="text-center">"Gaston sos un genio, con mucho respeto y profesionalidad me acompañaste a
                        mejorar mi capacidad de comunicar, hacer mi primer vídeo y perder miedos.. gracias gracias
                        gracias"</p>
                </li>

                <li class="card">
                    <div class="img"><img src="/img/PAMELA.jpeg" alt="img" draggable="false"></div>
                    <h2>Pamela</h2>
                    <span></span> <br>
                    <p class="text-center">"Te quería agradecer porque me sentí muy cómoda en cada conversación, sentí
                        mucha confianza en expresarme. Gracias por la escucha y también por ayudarme a hacerme preguntas
                        y movimientos para generar los cambios que requiero.
                        Siempre recomiendo que otra persona tenga la posibilidad de tener una sesión con vos!
                        "</p>
                </li>

                <li class="card">
                    <div class="img"><img src="/img/NESTOR.jpeg" alt="img" draggable="false"></div>
                    <h2>Nestor</h2>
                    <span></span> <br>
                    <p class="text-center">"Gracias Gastón, muchísimas gracias por el servicio de tu locución y
                        conducción. La verdad que impecable, la fiesta no hubiera sido la misma sin vos."</p>
                </li>

            </ul>

            <i id="right" class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                    <path d="M6 12.796V3.204L11.481 8zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                </svg></i>

        </div>

    </div>

    <div class="b-example-divider"></div>

    <!-- Marcas que confian -->
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Marcas que confian</h2> <br>

        <div class="scroller" data-direction="right" data-speed="slow">
            <div class="scroller__inner">
                <img src="img/logos/ANDREA GIGENA ENVIAR.png" />
                <img src="img/logos/d_g.png" />
                <img src="img/logos/descarga.png" />
                <img src="img/logos/g2-logo-blanco.png" />
                <img src="img/logos/Huggies-logo.png" />
                <img src="img/logos/Logo (1).png" />
                <img src="img/logos/Logo MARIA MARIA.png" />
                <img src="img/logos/LOGO Quality 90.5 Negro (1).png" />
                <img src="img/logos/LOGO VIDON fondo transparente.png" />
                <img src="img/logos/Logo zoom 2048.png" />
                <img src="img/logos/logo.png" />
                <img src="img/logos/logo-fcq-portada-4.png" />
                <img src="img/logos/MG NEGATIVO NEGRO.png" />
                <img src="img/logos/kimberly.png" />
                <img src="img/logos/ryserrunners.png" />

            </div>
        </div>

    </div>

    <div class="b-example-divider"></div>

    <!-- Blogs -->
    <br><br>
    <div class="container py-3" id="blogs">

        <div class="row">
            <div class="d-flex justify-content-between border-bottom">
                <h2 style="background-color: white;">Blogs</h2>
            </div>

            <?php if (!empty($entradas_blog[0])) : ?>

                <div class="col-md-6" data-aos="fade-right"> <br>
                    <div class="tarjetaBlog cardSombra row g-0 border rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="background-color: white;">
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <strong class="text-success-emphasis">
                                        <?php echo htmlspecialchars($entradas_blog[0]['etiqueta']); ?>
                                    </strong>
                                </div>
                                <div class="col-9 derechaA">
                                    <span class="text-success-emphasis">
                                        <?php echo date("d-m-Y", strtotime($entradas_blog[0]['fecha'])); ?>
                                    </span>
                                </div>
                            </div>

                            <h2 class="tituloH">
                                <?php echo htmlspecialchars($entradas_blog[0]['titulo']); ?>
                            </h2>

                            <div class="quieto">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_blog[0]['id']); ?>" class="linkAPagina">Leer más</a>
                            </div>
                        </div>

                        <div class="tarjetaImagen col-auto d-none d-lg-block">
                            <img src="<?php echo htmlspecialchars($entradas_blog[0]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($entradas_blog[1])) : ?>

                <div class="col-md-6" data-aos="fade-left"> <br>
                    <div class="tarjetaBlog cardSombra row g-0 border rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="background-color: white;">
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <strong class="text-success-emphasis">
                                        <?php echo htmlspecialchars($entradas_blog[1]['etiqueta']); ?>
                                    </strong>
                                </div>
                                <div class="col-9 derechaA">
                                    <span class="text-success-emphasis">
                                        <?php echo date("d-m-Y", strtotime($entradas_blog[1]['fecha'])); ?>
                                    </span>
                                </div>
                            </div>

                            <h2 class="tituloH">
                                <?php echo htmlspecialchars($entradas_blog[1]['titulo']); ?>
                            </h2>

                            <div class="quieto">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_blog[1]['id']); ?>" class="linkAPagina">Leer más</a>
                            </div>
                        </div>
                        <div class="tarjetaImagen col-auto d-none d-lg-block">
                            <img src="<?php echo htmlspecialchars($entradas_blog[1]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                        </div>
                    </div>
                </div>

            <?php endif; ?>


            <div class="d-flex">
                <a href="/blogs.php" class="ms-auto linkAPagina" style="background-color: white;">Ver más blogs</a>
            </div>


        </div>

        <div class="row">
            <div class="d-flex justify-content-between border-bottom">
                <h2 style="background-color: white;">Videos</h2>
            </div>

            <?php if (!empty($entradas_video[0])) : ?>

                <div class="col-md-4" data-aos="fade-right"> <br>

                    <div class="card mx-auto rounded-4 cardSombra tarjetaVideo" style="max-width: 24rem;">
                        <div class="ratio ratio-16x9">
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[0]['id']); ?>">
                                <img src="<?php echo htmlspecialchars($entradas_video[0]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                            </a>
                        </div>
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">

                            <h3 class="tituloH mb-0 text-center">
                                <?php echo htmlspecialchars($entradas_video[0]['titulo']); ?>
                            </h3>

                            <div class="quieto text-center">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[0]['id']); ?>" class=" card-text linkAPagina">Ver video</a>
                            </div>
                        </div>
                    </div>

                </div>

            <?php endif; ?>

            <?php if (!empty($entradas_video[1])) : ?>

                <div class="col-md-4" data-aos="fade-right"> <br>
                    <div class="card mx-auto rounded-4 cardSombra tarjetaVideo" style="max-width: 24rem;">
                        <div class="ratio ratio-16x9">
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[1]['id']); ?>">
                                <img src="<?php echo htmlspecialchars($entradas_video[1]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                            </a>
                        </div>
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">

                            <h3 class="tituloH mb-0 text-center">
                                <?php echo htmlspecialchars($entradas_video[1]['titulo']); ?>
                            </h3>

                            <div class="quieto text-center">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[1]['id']); ?>" class=" card-text linkAPagina">Ver video</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>


            <?php if (!empty($entradas_video[2])) : ?>

                <div class="col-md-4" data-aos="fade-right"> <br>
                    <div class="card mx-auto rounded-4 cardSombra tarjetaVideo" style="max-width: 24rem;">
                        <div class="ratio ratio-16x9">
                            <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[2]['id']); ?>">
                                <img src="<?php echo htmlspecialchars($entradas_video[2]['imagen']); ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                            </a>
                        </div>
                        <div class="tarjetaTexto col p-4 d-flex flex-column position-static">

                            <h3 class="tituloH mb-0 text-center">
                                <?php echo htmlspecialchars($entradas_video[2]['titulo']); ?>
                            </h3>

                            <div class="quieto text-center">
                                <a href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas_video[2]['id']); ?>" class=" card-text linkAPagina">Ver video</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="d-flex" style="padding-top: 20px;">
                <a href="https://gastonmondino.com/blogs.php" class="ms-auto linkAPagina" style="background-color: white;">Ver más videos</a>
            </div>
        </div>

        <div class="row" style="padding-top: 40px; padding-bottom: 30px;">
            <div class="d-flex justify-content-between border-bottom">
                <h2 style="background-color: white;">Podcasts</h2>
            </div>

            <div class="col-md-6 p-3" data-aos="fade-right">
                <iframe class="cardSombra" cstyle="border-radius:12px" src="https://open.spotify.com/embed/episode/2PTFl7XnmPk4Z39GML3SoF?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                <div class="d-flex">
                    <a href="https://open.spotify.com/show/2u0pdbHZpnaM1MqMt7R6Hd" class="ms-auto linkAPagina" style="background-color: white;">Más episodios</a>
                </div>
            </div>

            <div class="col-md-6 p-3" data-aos="fade-left">
                <iframe class="cardSombra" style="border-radius:12px" src="https://open.spotify.com/embed/episode/26DtyuPXXkK6MBlT0zGpD2?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>

                <div class="d-flex">
                    <a href="https://open.spotify.com/show/2u0pdbHZpnaM1MqMt7R6Hd" class="ms-auto linkAPagina" style="background-color: white;">Más episodios</a>
                </div>
            </div>

        </div>

    </div>

    <div class="b-example-divider"></div>

    <footer></footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>

</body>

</html>