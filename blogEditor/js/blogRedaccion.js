function mostrarImagenPreview() {
    var input = document.getElementById('imagen');
    var preview = document.getElementById('imagen-preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.innerHTML = '<img class="imgP" src="' + e.target.result + '" alt="Vista previa de la imagen">';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Define la función para procesar imágenes y iframes
function processImagesAndIframes() {
    // Obtén el contenido del editor
    const content = tinymce.activeEditor.getContent();

    // Crear un elemento div temporal para contener el contenido y poder buscar los elementos dentro
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = content;

    // Obtener todas las imágenes y iframes dentro del contenido
    const images = tempDiv.querySelectorAll('img');
    const iframes = tempDiv.querySelectorAll('iframe');

    // Agregar clases a las imágenes y iframes
    images.forEach(function(image) {
        image.classList.add('img-responsive');
    });

    iframes.forEach(function(iframe) {
        iframe.classList.add('video-responsive');
    });

    // Actualizar el contenido del editor con las clases aplicadas
    tinymce.activeEditor.setContent(tempDiv.innerHTML);
}

// Inicialización de TinyMCE
tinymce.init({
    selector: '#editor',
    toolbar_mode: 'sliding',
    language: 'es_MX',
    branding: false,
    menubar: false,
    toolbar: 'undo redo fullscreen preview | styles | image media autolink link | styleselect  | bullist numlist | outdent indent | forecolor backcolor | emoticons hr blockquote | table tabledelete insertdatetime | copy cut selectall | subscript superscript | removeformat',
    statusbar: true,
    plugins: 'image lists advlist fullscreen emoticons insertdatetime media table wordcount autolink link preview',
    setup: function (editor) {
        // Llama a la función para procesar imágenes y iframes cada vez que el contenido cambia
        editor.on('change', function() {
            processImagesAndIframes();
        });
    }
});



//CREAR

function guardarContenido() {
    const titulo = document.getElementById('titulo').value;
    const etiqueta = document.getElementById('etiqueta').value;
    const imagen = document.getElementById('imagen').files[0];
    const contenido = tinymce.activeEditor.getContent();

    // Verificar que el título y la imagen no estén vacíos
    if (!titulo.trim()) {
        alert('Falta seleccionar un título.');
        return;
    }
    if (!imagen) {
        alert('Falta seleccionar una imagen.');
        return;
    }

    // Crear un objeto FormData y agregar el título, contenido e imagen
    const formData = new FormData();
    formData.append('titulo', titulo);
    formData.append('etiqueta', etiqueta);
    formData.append('contenido', contenido);
    formData.append('imagen', imagen);

    // Enviar el contenido, título e imagen al servidor usando AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/guardar_contenido.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // La solicitud fue exitosa
                console.log(xhr.responseText);
                alert('Contenido guardado correctamente.');
                window.location.href = 'crear.html';
            } else {
                // La solicitud no fue exitosa
                console.error('Error al guardar el contenido:', xhr.status);
                alert('Hubo un error al guardar el contenido. Por favor, inténtalo de nuevo.');
            }
        }
    };
    xhr.send(formData);
}


//ELIMINAR

$(".eliminar").click(function () {
    // Obtener el ID de la entrada
    var id = $(this).data("id");

    // Preguntar al usuario si está seguro de eliminar la entrada
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar esta entrada?");

    // Si el usuario confirma la eliminación
    if (confirmacion) {
        // Enviar la solicitud AJAX para eliminar la entrada
        $.ajax({
            url: 'php/eliminar_contenido.php', // La URL del script PHP que eliminará la entrada
            type: 'POST',
            data: { id: id }, // Enviar el ID de la entrada al servidor
            success: function (response) {
                // Manejar la respuesta del servidor
                if (response == 1) {
                    alert("Entrada eliminada exitosamente");
                } else {
                    alert("Error al eliminar la entrada");
                }
            }
        });
    }
});


//EDITAR

// Obtén el id de la entrada del parámetro GET
var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get('id');

// Haz una solicitud AJAX al script PHP
var xhr = new XMLHttpRequest();
xhr.open('GET', 'php/get_entrada.php?id=' + id, true);
xhr.onload = function () {
    if (this.status == 200) {
        // Parsea la respuesta
        var entrada = JSON.parse(this.responseText);

        // Rellena el formulario con los datos de la entrada
        document.getElementById('titulo').value = entrada.titulo;
        document.getElementById('etiqueta').value = entrada.etiqueta;
        document.getElementById('imagen-preview').style.backgroundImage = 'url(data:image/jpeg;base64,' + entrada.imagen + ')';
        document.getElementById('editor').value = entrada.contenido;
    }
}
xhr.send();

//ACTUALIZAR

function editarContenido() {
    const id = document.getElementById('entrada_id').value;
    const titulo = document.getElementById('titulo').value;
    const etiqueta = document.getElementById('etiqueta').value;
    const imagen = document.getElementById('imagen').files[0];
    const contenido = tinymce.activeEditor.getContent();

    // Verificar que el título y la imagen no estén vacíos
    if (!titulo.trim()) {
        alert('Falta seleccionar un titulo.');
        return;
    }

    // Crear un objeto FormData y agregar el título, contenido e imagen
    const formData = new FormData();
    formData.append('id', id);
    formData.append('titulo', titulo);
    formData.append('etiqueta', etiqueta);
    formData.append('contenido', contenido);
    formData.append('imagen', imagen);

    // Enviar el contenido, título e imagen al servidor usando AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/actualizar_contenido.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                console.log(xhr.responseText);
                // Si la respuesta es exitosa, mostrar un alert
                alert("La entrada se editó exitosamente.");
            } else {
                // Si hay un error en la solicitud, mostrar un alert con el mensaje de error
                alert("Error al editar la entrada: " + xhr.responseText);
            }
        }
    };
    xhr.send(formData);
}