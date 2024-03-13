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

    <?php
    // Variables para almacenar los datos de la entrada
    $id = "";
    $titulo = "";
    $etiqueta = "";
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

        // Obtener la entrada actual
        if ($resultado->num_rows > 0) {
            // Obtener los datos de la entrada
            $entrada = $resultado->fetch_assoc();
            // Obtener los datos específicos de la entrada
            $id = htmlspecialchars($entrada['id']);
            $titulo = htmlspecialchars($entrada['titulo']);
            $etiqueta = htmlspecialchars($entrada['etiqueta']);
            $fecha = htmlspecialchars($entrada['fecha_publicacion']);
            $imagenBlob = $entrada['imagen']; // Guarda el BLOB en una variable separada
            // Convertir el BLOB en una URL utilizando base64
            $imagen = 'data:image/jpeg;base64,' . base64_encode($imagenBlob);
            $contenido = htmlspecialchars($entrada['contenido']);
        }

        // Obtener la fecha de publicación de la entrada actual
$fecha_publicacion_actual = $fecha;

// Consultar si la entrada actual es la más reciente
$sql_ultima_entrada = "SELECT MAX(fecha_publicacion) AS max_fecha FROM entradas_blog";
$resultado_ultima_entrada = $conexion->query($sql_ultima_entrada);
$ultima_entrada = $resultado_ultima_entrada->fetch_assoc();
$fecha_ultima_entrada = $ultima_entrada['max_fecha'];

if ($fecha_publicacion_actual == $fecha_ultima_entrada) {
    // La entrada actual es la más reciente, obtener la tercera entrada más reciente
    $sql_tercera_entrada = "SELECT * FROM entradas_blog ORDER BY fecha_publicacion DESC LIMIT 2,1";
    $resultado_tercera_entrada = $conexion->query($sql_tercera_entrada);

    if ($resultado_tercera_entrada->num_rows > 0) {
        // Obtener los datos de la tercera entrada más reciente
        $tercera_entrada = $resultado_tercera_entrada->fetch_assoc();
        // Obtener los datos específicos de la tercera entrada
        $id_adicional = htmlspecialchars($tercera_entrada['id']);
        $titulo_adicional = htmlspecialchars($tercera_entrada['titulo']);
        $etiqueta_adicional = htmlspecialchars($tercera_entrada['etiqueta']);
        $fecha_adicional = htmlspecialchars($tercera_entrada['fecha_publicacion']);

        $imagenBlob2 = $tercera_entrada['imagen']; // Guarda el BLOB en una variable separada
        // Convertir el BLOB en una URL utilizando base64
        $imagen_adicional = 'data:image/jpeg;base64,' . base64_encode($imagenBlob2);
    } else {
        // No hay entradas disponibles
        // Asignar valores predeterminados o manejar el caso según sea necesario
    }
} else {
    // Obtener una entrada adicional más reciente
    $sql_entrada_adicional = "SELECT * FROM entradas_blog WHERE id != ? ORDER BY fecha_publicacion DESC LIMIT 1";
    $stmt_entrada_adicional = $conexion->prepare($sql_entrada_adicional);
    $stmt_entrada_adicional->bind_param('i', $id);
    $stmt_entrada_adicional->execute();
    $resultado_entrada_adicional = $stmt_entrada_adicional->get_result();

    if ($resultado_entrada_adicional->num_rows > 0) {
        // Obtener los datos de la entrada adicional
        $entrada_adicional = $resultado_entrada_adicional->fetch_assoc();
        // Obtener los datos específicos de la entrada adicional
        $id_adicional = htmlspecialchars($entrada_adicional['id']);
        $titulo_adicional = htmlspecialchars($entrada_adicional['titulo']);
        $etiqueta_adicional = htmlspecialchars($entrada_adicional['etiqueta']);
        $fecha_adicional = htmlspecialchars($entrada_adicional['fecha_publicacion']);

        $imagenBlob2 = $entrada_adicional['imagen']; // Guarda el BLOB en una variable separada
        // Convertir el BLOB en una URL utilizando base64
        $imagen_adicional = 'data:image/jpeg;base64,' . base64_encode($imagenBlob2);
    } else {
        // No hay entradas adicionales más recientes
        // Asignar valores predeterminados o manejar el caso según sea necesario
    }
}


        // Obtener la fecha de publicación de la entrada actual
        $fecha_publicacion_actual = $fecha;

        // Consultar la entrada adicional anterior
        $sql_entrada_adicional_anterior = "SELECT * FROM entradas_blog WHERE fecha_publicacion < ? AND id != ? ORDER BY fecha_publicacion DESC LIMIT 1";
        $stmt_entrada_adicional_anterior = $conexion->prepare($sql_entrada_adicional_anterior);
        $stmt_entrada_adicional_anterior->bind_param('si', $fecha_publicacion_actual, $id);
        $stmt_entrada_adicional_anterior->execute();
        $resultado_entrada_adicional_anterior = $stmt_entrada_adicional_anterior->get_result();

        if ($resultado_entrada_adicional_anterior->num_rows > 0) {
            // Obtener los datos de la entrada adicional anterior
            $entrada_adicional_anterior = $resultado_entrada_adicional_anterior->fetch_assoc();
            // Obtener los datos específicos de la entrada adicional anterior
            $id_adicional2 = htmlspecialchars($entrada_adicional_anterior['id']);
            $titulo_adicional2 = htmlspecialchars($entrada_adicional_anterior['titulo']);
            $etiqueta_adicional2 = htmlspecialchars($entrada_adicional_anterior['etiqueta']);
            $fecha_adicional2 = htmlspecialchars($entrada_adicional_anterior['fecha_publicacion']);

            $imagenBlob2 = $entrada_adicional_anterior['imagen']; // Guarda el BLOB en una variable separada
            // Convertir el BLOB en una URL utilizando base64
            $imagen_adicional2 = 'data:image/jpeg;base64,' . base64_encode($imagenBlob2);
        } else {
            // Si no hay entrada adicional anterior, obtener la siguiente entrada
            $sql_entrada_adicional_siguiente = "SELECT * FROM entradas_blog WHERE fecha_publicacion > ? AND id != ? ORDER BY fecha_publicacion ASC LIMIT 1";
            $stmt_entrada_adicional_siguiente = $conexion->prepare($sql_entrada_adicional_siguiente);
            $stmt_entrada_adicional_siguiente->bind_param('si', $fecha_publicacion_actual, $id);
            $stmt_entrada_adicional_siguiente->execute();
            $resultado_entrada_adicional_siguiente = $stmt_entrada_adicional_siguiente->get_result();

            if ($resultado_entrada_adicional_siguiente->num_rows > 0) {
                // Obtener los datos de la entrada adicional siguiente
                $entrada_adicional_siguiente = $resultado_entrada_adicional_siguiente->fetch_assoc();
                // Obtener los datos específicos de la entrada adicional siguiente
                $id_adicional2 = htmlspecialchars($entrada_adicional_siguiente['id']);
                $titulo_adicional2 = htmlspecialchars($entrada_adicional_siguiente['titulo']);
                $etiqueta_adicional2 = htmlspecialchars($entrada_adicional_siguiente['etiqueta']);
                $fecha_adicional2 = htmlspecialchars($entrada_adicional_siguiente['fecha_publicacion']);

                $imagenBlob2 = $entrada_adicional_siguiente['imagen']; // Guarda el BLOB en una variable separada
                // Convertir el BLOB en una URL utilizando base64
                $imagen_adicional2 = 'data:image/jpeg;base64,' . base64_encode($imagenBlob2);
            } else {
                // Si no hay entrada adicional siguiente, asignar valores predeterminados o manejar el caso según sea necesario
                $id_adicional2 = "";
                $titulo_adicional2 = "";
                $etiqueta_adicional2 = "";
                $fecha_adicional2 = "";
                $imagen_adicional2 = "";
            }
        }
    }
    ?>

    <div class="container contenidoTotal">
        <br><br><br>

        <div class="text-center contPrincipal">

            <h1 class="tituloPrincipal"><?php echo $titulo; ?></h1>

            <p class="horarioPrincipal">por <a class="linkAInsta" href="https://www.instagram.com/gaston_tucoach/">Gastón Mondino</a> - <span class="horayfecha"><?php echo date("d-m-Y", strtotime($fecha)); ?></span></p>


            <?php if (!empty($imagen)) { ?>
                <img src="<?php echo $imagen; ?>" class="imagenPrincipal" alt="Imagen principal">
            <?php } ?>
        </div>

        <br><br>

        <div class="row">

            <div class="col-md-8 cuerpoBlog">

                <?php echo html_entity_decode($contenido); ?>
                <br>

            </div>

            <div class="col-md-4 otrosBlog sticky-top">

                <div class="row">

                    <h3 class="mb-4 border-bottom">Otras publicaciones</h3>

                    <div class="col-md-12 " data-aos="fade-right">
                        <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;">
                            <div class="ratio ratio-16x9">
                                <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c">
                                    <?php if (!empty($imagen_adicional)) { ?>
                                        <img src="<?php echo $imagen_adicional; ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                                    <?php } ?>

                                </a>
                            </div>
                            <div class="tarjetaTexto col p-4 d-flex flex-column position-static">

                                <div class="row mb-2">
                                    <div class="col-4">
                                        <strong class="text-success-emphasis">
                                            <?php echo $etiqueta_adicional; ?>
                                        </strong>
                                    </div>
                                    <div class="col-8 derechaA">
                                        <span class="text-success-emphasis">
                                            <?php echo date("d-m-Y", strtotime($fecha_adicional)); ?>
                                        </span>
                                    </div>
                                </div>

                                <h3 class="tituloH mb-0"><?php echo $titulo_adicional; ?></h3>


                                <a href="https://gastonmondino.com/blog.php?id=<?php echo $id_adicional; ?>" class="linkAPagina">Leer más</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" data-aos="fade-right"> <br>
                        <div class="card mx-auto rounded-4 cardSombra" style="max-width: 24rem;">
                            <div class="ratio ratio-16x9">
                                <a href="https://www.youtube.com/watch?v=PwCg2CPKQ2c">
                                    <?php if (!empty($imagen_adicional)) { ?>
                                        <img src="<?php echo $imagen_adicional2; ?>" class="rounded-4 imagenImg" alt="Imagen principal">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="tarjetaTexto col p-4 d-flex flex-column position-static">

                                <div class="row mb-2">
                                    <div class="col-4">
                                        <strong class="text-success-emphasis">
                                            <?php echo $etiqueta_adicional2; ?>
                                        </strong>
                                    </div>
                                    <div class="col-8 derechaA">
                                        <span class="text-success-emphasis">
                                            <?php echo date("d-m-Y", strtotime($fecha_adicional2)); ?>
                                        </span>
                                    </div>
                                </div>

                                <h3 class="tituloH mb-0"><?php echo $titulo_adicional2; ?>
                                </h3>


                                <a href="https://gastonmondino.com/blog.php?id=<?php echo $id_adicional2; ?>" class="linkAPagina">Leer más</a>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>


</body>

</html>