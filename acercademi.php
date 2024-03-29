<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastón Mondino - Acerca de mi</title>
    <link rel="icon" type="image/png" href="/img/perfil2.png">

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/acercademi.css" />
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

<body class="image-fondo">

    <header></header>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/message/32ES7KUOOJEDE1?autoload=1&app_absent=0" class="float" target="_blank" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="¿Necesitas ayuda?">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <?php
    setlocale(LC_TIME, 'es_ES.UTF-8'); // Establecer el idioma en español


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

    <br><br><br><br>

    <div class="container mt-5 textfinal" data-aos="fade" data-aos-duration="1500">

        <div class="row p-2">
            <div class="col-md-7">

                <h1 class="display-5" style="color: #20a49c; font-family: 'Lilita One';"><strong>¡HOLA!</strong></h1>
                <hr style="color: #20a49c;">
                <p class="texto">
                    &nbsp;Llegaste hasta acá y eso para mi es un montón. <br> &nbsp;Tu tiempo es el mejor regalo para mi
                    y es por eso que quiero contarte quién soy, que hago y que me apasiona <br><br>
                </p>

                <h3 class="subtitulo">Quién soy</h3>
                <hr>
                <p class="texto">
                    &nbsp;Me llamo Gastón Mondino y mi segundo nombre es Miguel como mi viejo. De pequeño, algunas
                    personas me decian miguelito y yo feliz.
                    Soy de Córdoba Capital (Argentina), tengo 33 años y una hija de 6 años que se llama Delfina.
                    <br><br>
                    &nbsp;Desde muy chico sentí atracción por la comunicación y supe que era lo mío. <br>
                    &nbsp;Jugaba a ser locutor, a tener mi programa de radio y a grabar mi voz sobre los casettes en
                    viejos grabadores, a imaginarme frente a mucha gente contando historias y que esa gente se inspirara
                    en las palabras que yo expresaba. <br><br>

                    &nbsp;El tiempo me fue llevando por diferentes caminos y ya de grande lo que era un anhelo se
                    transformó en un objetivo y en una vocación que se volvió profesión. <br><br>

                </p> <br>

            </div>

            <div class="col-md-5">
                <div class="text-center">
                    <div class="card-rounded" style=" position: relative; display: inline-block; width: 75%;">

                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-interval="500">
                            <div class="carousel-inner carruselImg">
                                <div class="carousel-item active">
                                    <img src="/img/about/IMG-20231206-WA0043.jpg" class="d-block carruselImg" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/about/IMG-20231206-WA0042.jpg" class="d-block carruselImg" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/about/IMG-20231206-WA0044.jpg" class="d-block carruselImg" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/about/IMG-20231206-WA0040.jpg" class="d-block carruselImg" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/about/IMG-20231206-WA0050.jpg" class="d-block carruselImg" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/about/IMG-20231206-WA0046.jpg" class="d-block carruselImg" alt="...">
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-md-block" style="position: absolute; right: -40px; top: 15%; transform: translateY(-50%);">
                            <p>
                                <a href="https://www.linkedin.com/in/gastontucoach/"><img src="/img/iconos/linkedin.svg" class="iconRedes"></a>
                            </p>
                            <p>
                                <a href="https://www.instagram.com/gaston_tucoach/"><img src="/img/iconos/instagram.svg" class="iconRedes"></a>
                            </p>
                            <p>
                                <a href="https://open.spotify.com/show/2u0pdbHZpnaM1MqMt7R6Hd?si=39b28ffd73b64d14&nd=1"><img src="/img/iconos/spotify.svg" class="iconRedes"></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br>

        <div class="row p-2">
            <div class="col-md-7">

                <h3 class="subtitulo">Profesión</h3>
                <hr>
                <div>
                    <img class="imagenProfe" src="/img/about/IMG-20231206-WA0041.jpg" alt="Profesion">
                    <p class="texto">

                        &nbsp;Hoy soy Lic. en Comunicación Social, Locutor Nacional (MN 11.883) y Coach Ontológico
                        Profesional certificado internacionalmente por la ICF (International Coaching Federation).
                        <br><br>

                        &nbsp;Creo firmemente en la capacitación y formación continua que permita habitar el aprendizaje
                        desde la apertura, desde la posibilidad y sobre todo desde la alegria. <br>
                        &nbsp;Es imposible construir sin alegria y es una de las banderas que llevo en todo aquello que
                        emprendo. <br><br>

                        &nbsp;En mi búsqueda costante por asumir desafíos y lograr objetivos, desde hace un tiempo estoy
                        abocado a trabajar desde mi formación como comunicador, coach y locutor en una mirada integral
                        de la
                        comunicación para descubrir el potencial que cada uno tiene en este apasionante y desafiante
                        mundo.
                        <br><br>

                        &nbsp;Es por esto, que trabajo y acompaño, mediante programas de entrenamiento, a profesionales,
                        estudiantes, políticos, empresas y organizaciones para aplicar no solo herramientas y técnicas,
                        sino
                        también el desarrollo de habilidades o como me gusta llamarlas "power skills" que enriquezcan su
                        identidad personal, profesional y laboral. <br>
                    </p>

                    <div class="cita">
                        <span>
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
                                </svg>
                                Comunicá desde vos con tu voz
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
                                </svg>
                            </h4>
                        </span>
                    </div>

                    <p class="texto">&nbsp; Es mi lema, porque no hay nada más potente, más genuino, más
                        auténtico, más inspirador que aquella persona u organización que comunica, trabaja y cuenta
                        historias desde su propio ser, desde su propia coherencia emocional, corporal y linguistica.
                    </p>
                </div>

            </div>

            <div class="col-md-5 d-none d-md-block" data-aos="fade-left" style="padding-left: 70px;"><br><br>
                <div class="p-4 mb-3 bg-body-tertiary rounded-4" style="width: 80%;">
                    <h5>. Actividades que más amo</h5>
                    <p class="texto">
                    <table>
                        <tr>
                            <td style="padding: 10px;">📖 Leer </td>
                            <td style="padding: 10px;">✍️ Escribir </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">🏃 Running </td>
                            <td style="padding: 10px;">🎤 Coaching</td>
                        </tr>
                    </table>
                </div>

                <br>

                <div class="position-sticky" style="top: 2rem;">

                    <div>
                        <h4 class="fst-italic" data-aos="fade-left">Blogs recientes</h4>
                        <ul class="list-unstyled">

                            <?php if (!empty($entradas[0])) : ?>

                                <li data-aos="fade-left">
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[0]['id']); ?>">
                                        <img class="rounded-3 imgBlog" src="<?php echo htmlspecialchars($entradas[0]['imagen']); ?>">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">
                                                <?php echo htmlspecialchars($entradas[0]['titulo']); ?>

                                            </h6>
                                            <small class="text-body-secondary">
                                                <?php echo strftime("%e de %B de %Y", strtotime($entradas[0]['fecha'])); ?>
                                            </small>
                                        </div>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if (!empty($entradas[1])) : ?>


                                <li data-aos="fade-left">
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[1]['id']); ?>">
                                        <img class="rounded-3 imgBlog" src="<?php echo htmlspecialchars($entradas[1]['imagen']); ?>">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">
                                                <?php echo htmlspecialchars($entradas[1]['titulo']); ?>

                                            </h6>
                                            <small class="text-body-secondary">
                                                <?php echo strftime("%e de %B de %Y", strtotime($entradas[1]['fecha'])); ?>
                                            </small>
                                        </div>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if (!empty($entradas[2])) : ?>


                                <li data-aos="fade-left">
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://gastonmondino.com/blog.php?id=<?php echo htmlspecialchars($entradas[2]['id']); ?>">
                                        <img class="rounded-3 imgBlog" src="<?php echo htmlspecialchars($entradas[2]['imagen']); ?>">

                                        <div class="col-lg-8">
                                            <h6 class="mb-0">
                                                <?php echo htmlspecialchars($entradas[2]['titulo']); ?>

                                            </h6>
                                            <small class="text-body-secondary">
                                                <?php echo strftime("%e de %B de %Y", strtotime($entradas[2]['fecha'])); ?>
                                            </small>
                                        </div>
                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>

                </div>

            </div>

        </div>

        <img class="d-block d-sm-none imgCierre" src="/img/about/IMG-20231206-WA0047.jpg">

        <br><br>
        <hr>

        <div class="row">
            <div class="text-center d-flex justify-content-center align-items-center">
                <p class="textCierre">
                    &nbsp;Desde ahí te invito a co-crear tu mejor versión con tips, técnicas, aprendizajes, reflexiones,
                    herramientas y mucho contenido de valor que he aprendido y que aún sigo aprendiendo. <br><br>

                    &nbsp;Que no solo me sirvió y me sirve para el ámbito profesional y laboral, sino para la vida
                    misma. <br><br>

                    &nbsp;La comunicación debe y tiene que estar al servicio de la sociedad, al servicio tuyo y desde
                    ahí quiero compartirlo con vos. <br><br>
                </p>
            </div>
            <h5 class="text-center"><strong>¡Vamos juntos! </strong></h5>

        </div>

        <br><br><br>
    </div>


    <div class="b-example-divider"></div>

    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>

</body>

</html>