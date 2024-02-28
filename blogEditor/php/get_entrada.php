<?php
// Conexión a la base de datos
<<<<<<< HEAD
$servername = "localhost";
$username = "nacho";
$password = "1234";
$dbname = "u607022590_GastonPageBase";
=======

>>>>>>> 75946bdf34c6cc4a7c633628c546ed8214b2fef0

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtén el id de la entrada del parámetro GET
$id = $_GET['id'];

// Ejecutar la consulta SQL
$sql = "SELECT * FROM entradas_blog WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Devuelve los datos de la entrada en formato JSON
    echo json_encode($result->fetch_assoc());
} else {
    echo "No se encontró la entrada.";
}

// Cerrar la conexión
$conn->close();
?>