<?php


// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$etiqueta = $_POST['etiqueta'];
$id = $_POST['id']; // Obtener el ID de la entrada

// Si se seleccionó una nueva imagen, procesarla
if (!empty($_FILES['imagen']['tmp_name'])) {
    // Obtener datos de la imagen
    $imagenData = file_get_contents($_FILES['imagen']['tmp_name']);

    // Actualizar entrada con imagen y etiqueta
    $sql = "UPDATE entradas_blog SET titulo=?, contenido=?, imagen=?, etiqueta=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $null = NULL; // Placeholder para el parámetro de imagen
    $stmt->bind_param("ssbsi", $titulo, $contenido, $null, $etiqueta, $id);
    $stmt->send_long_data(2, $imagenData);
} else {
    // Actualizar entrada sin imagen y con etiqueta
    $sql = "UPDATE entradas_blog SET titulo=?, contenido=?, etiqueta=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $titulo, $contenido, $etiqueta, $id);
}

// Ejecutar la consulta preparada
if ($stmt->execute()) {
    echo "Entrada actualizada exitosamente";
} else {
    echo "Error al actualizar la entrada: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
