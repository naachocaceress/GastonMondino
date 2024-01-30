<?php

$dbname = "u607022590_GastonPageBase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Consultar los blogs desde la base de datos
$sql = "SELECT id, titulo, contenido, fecha_publicacion FROM entradas_blog ORDER BY fecha_publicacion DESC";
$result = $conn->query($sql);

// Verificar si hay errores en la consulta
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

// Mostrar los blogs
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["titulo"] . "</h2>";
        echo "<p>" . $row["fecha_publicacion"] . "</p>";
        echo $row["contenido"];
        echo "<hr>";
    }
} else {
    echo "No hay blogs disponibles.";
}

// Cerrar la conexión
$conn->close();
?>

