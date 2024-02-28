<?php
// Conexión a la base de datos


$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener el ID de la entrada
$id = $_POST['id'];

// Preparar y ejecutar la consulta SQL
$sql = "DELETE FROM entradas_blog WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo 1; // Entrada eliminada exitosamente
} else {
    echo 0; // Error al eliminar la entrada
}

// Cerrar la conexión
$conn->close();
?>
