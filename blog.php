<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastón Mondino - Blog</title>
    <link rel="icon" type="image/png" href="/img/perfil2.png">

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/blogUnitarios.css" />
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function () {
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
    <a href="https://api.whatsapp.com/message/32ES7KUOOJEDE1?autoload=1&app_absent=0" class="float" target="_blank"
        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip"
        data-bs-title="¿Necesitas ayuda?">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <?php
    // Variables para almacenar los datos de la entrada
    $titulo = "";
    $fecha = "";
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
            $fecha = htmlspecialchars($entrada['fecha_publicacion']);
            $imagenBlob = $entrada['imagen']; // Guarda el BLOB en una variable separada

            // Convertir el BLOB en una URL utilizando base64
            $imagen = 'data:image/jpeg;base64,' . base64_encode($imagenBlob);
            $contenido = htmlspecialchars($entrada['contenido']);
        }
    }
    ?>

    <div class="container contenidoTotal">
        <br><br><br>

        <div class="text-center contPrincipal">

            <h1 class="tituloPrincipal"><?php echo $titulo; ?></h1>

            <p class="horarioPrincipal">por <a class="linkAInsta"
        href="https://www.instagram.com/gaston_tucoach/">Gastón Mondino</a> - <span
        class="horayfecha"><?php echo date("d-m-Y", strtotime($fecha)); ?></span></p>


                    <?php if (!empty($imagen)) { ?>
                        <img src="<?php echo $imagen; ?>" class="imagenPrincipal" alt="Imagen principal">
                    <?php } ?>
        </div>

        <br><br>

        <div class="row">

            <div class="col-md-8 cuerpoBlog">
                
                <?php echo html_entity_decode($contenido); ?>

            </div>

            <div class="col-md-4 otrosBlog sticky-top">

                <div class="row">

                    <h3 class="mb-4 border-bottom">Otras publicaciones</h3>

                    <div class="col-md-12 " data-aos="fade-right">
                        <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;">
                            <div class="ratio ratio-16x9">
                                <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c"><img
                                        src="/img/imgSinCopy/blog2.jpg" class="rounded-4 imagenImg"></a>
                            </div>
                            <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success-emphasis">Interes</strong>
                                <h3 class="tituloH mb-0">Comunicacion efectiva</h3>
                                <div class="mb-1 text-body-secondary">Ene 3</div>
                                <p class="textoP mb-auto">
                                    &nbsp; Es muy común hoy en día estar atravesado por múltiples distracciones,
                                    infinidad de
                                    obstáculos e innumerables inconvenientes que nos permitan entregarnos de lleno a la
                                    conversación con alguien
                                </p>
                                <a href="#" class="linkAPagina">Continuar Leyendo</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" data-aos="fade-right"> <br>
                        <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;">
                            <div class="ratio ratio-16x9">
                                <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c"><img src="/img/imgSinCopy/blog1.jpg"
                                        class="rounded-4 imagenImg"></a>
                            </div>
                            <div class="tarjetaTexto col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success-emphasis">Coaching</strong>
                                <h3 class="tituloH mb-0">Un pacto
                                </h3>
                                <div class="mb-1 text-body-secondary">Ene 5</div>
                                <p class="textoP mb-auto">
                                    &nbsp; Mirar nuestra identidad sin mirar nuestro entorno es perderse de una gran posibilidad
                                    de registro de porque hacemos lo que hacemos, decimos lo que decimos y sentimos lo que
                                    sentimos.
                                </p>
                                <a href="#" class="linkAPagina">Continuar Leyendo</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>

    </div>

    <div class="b-example-divider"></div>


    <footer></footer>

    <script src="../js/blogUnitarios.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>


</body>

</html>