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

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>

<body>

    <svg style="display: none;">
        <symbol id="icono-editar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
            </svg>
        </symbol>
        <symbol id="icono-eliminar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
            </svg>
        </symbol>
        <symbol id="icono-confirmar">
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-check-circle-fill text-success mx-auto " viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
        </symbol>
        <symbol id="icono-ver">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
            </svg>
        </symbol>
    </svg>

    <header></header>

    <form id="formulario" class="formulario" enctype="multipart/form-data">
        <br>
        <h1 class="text-center border-bottom">Todos los blogs</h1>

        <div class="container mt-5 table-responsive">

            <table class="table" id="tblBlog">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Imagen</th>
                        <th>Fecha</th>
                        <th>Etiqueta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Conexión a la base de datos


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
                            echo "<td>" . $row["etiqueta"] . "</td>";
                            echo "<td class='fixed-column'>";
                            echo "<div class='btn-group'>";
                            echo "<a href='https://gastonmondino.com/blog.php?id=" . $row['id'] . "' class='btn btn-outline-success'><svg width='16' height='16'><use href='#icono-ver' /></svg></a>";
                            echo "<a href='editar.php?id=" . $row['id'] . "' class='btn btn-outline-primary'><svg width='16' height='16'><use href='#icono-editar' /></svg></a>";
                            echo "<button class='btn btn-outline-danger eliminar' data-id='" . $row['id'] . "'><svg width='16' height='16'><use href='#icono-eliminar' /></svg></button>";
                            echo "</div>";
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

    <script>
        //DATATABLES

        $(document).ready(function() {
            inicializarTabla('#tblBlog');
        });

        function inicializarTabla(tablaId) {
            var table = $(tablaId).DataTable({
                "order": [
                    [0, "desc"]
                ],
                "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, 'Todos']
                ],
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                    "infoFiltered": "(filtrado de _MAX_ entradas en total)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        }
    </script>

    <script src="js/blogRedaccion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>