<?php

$servername = "localhost";
$username = "nacho";
$password = "1234";
$dbname = "u607022590_GastonPageBase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$imagen = $_FILES['imagen'];
$contenido = $_POST['contenido'];
$fecha_actual = date("Y-m-d H:i:s"); // Obtener la fecha y hora actuales en el formato MySQL

$imagenData = addslashes(file_get_contents($imagen['tmp_name']));

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO entradas_blog (titulo, contenido, imagen, fecha_publicacion) VALUES ('$titulo', '$contenido', '$imagenData', '$fecha_actual')";
if ($conn->query($sql) === TRUE) {
    echo "Entrada guardada exitosamente";
} else {
    echo "Error al guardar la entrada: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
