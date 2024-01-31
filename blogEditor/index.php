<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastón Mondino - Inicio</title>
    <link rel="icon" type="image/png" href="img/perfil2.png">

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/blogIndex.css" />
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

    <form id="formulario" class="formulario" enctype="multipart/form-data">
        <br>
        <h1 class="text-center border-bottom">Todos los blogs</h1>

        <div class="container  mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Imagen</th>
                        <th>Fecha</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Conexión a la base de datos
                    $servername = "localhost";
                    $username = "nacho";
                    $password = "1234";
                    $dbname = "u607022590_GastonPageBase";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("La conexión a la base de datos falló: " . $conn->connect_error);
                    }

                    // Ejecutar la consulta SQL
                    $sql = "SELECT * FROM entradas_blog order by id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Iterar sobre los resultados y generar las filas de la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["titulo"] . "</td>";
                            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['imagen']) . "' /></td>";
                            echo "<td>" . $row["fecha_publicacion"] . "</td>";
                            $palabras = explode(" ", $row["contenido"]); // Divide el contenido en palabras
                            $primerasCinco = array_slice($palabras, 0, 6); // Obtiene las primeras 5 palabras
                            $contenidoCorto = implode(" ", $primerasCinco); // Une las palabras en una cadena
                            echo "<td>" . $contenidoCorto . "...</td>";
                            echo "<td>";
                            echo "<a href='crear.html?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a>";
                            echo "<button class='btn btn-danger eliminar' data-id='" . $row['id'] . "'>Eliminar</button>";
                            echo "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "No se encontraron entradas.";
                    }

                    // Cerrar la conexión
                    $conn->close();
                    ?>


                </tbody>
            </table>
        </div>

    </form>

    <script src="js/blogRedaccion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>