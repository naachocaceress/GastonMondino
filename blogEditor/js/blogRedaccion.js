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

tinymce.init({
	selector: '#editor',
	toolbar_mode: 'sliding',
	language: 'es_MX',
	branding: false,
	menubar: false,
	toolbar:
		'undo redo fullscreen preview | styles | image media autolink link | styleselect  | bullist numlist | outdent indent | forecolor backcolor | emoticons hr blockquote | table tabledelete insertdatetime | copy cut selectall | subscript superscript | removeformat ',
	statusbar: true,
	plugins: 'image lists advlist fullscreen emoticons insertdatetime media table wordcount autolink link preview',
});

//CREAR

function guardarContenido() {
    const titulo = document.getElementById('titulo').value;
    const imagen = document.getElementById('imagen').files[0];
    const contenido = tinymce.activeEditor.getContent();

    // Verificar que el título y la imagen no estén vacíos
    if (!titulo.trim()) {
        alert('Falta seleccionar un titulo.');
        return;
    }
    if (!imagen) {
        alert('Falta seleccionar una imagen.');
        return;
    }

    // Crear un objeto FormData y agregar el título, contenido e imagen
    const formData = new FormData();
    formData.append('titulo', titulo);
    formData.append('contenido', contenido);
    formData.append('imagen', imagen);

    // Enviar el contenido, título e imagen al servidor usando AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/GastonPage/blogEditor/php/guardar_contenido.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send(formData);
}

//BORRAR

$(".eliminar").click(function() {

    var id = $(this).data("id"); // Obtiene el ID de la entrada

    $.ajax({
        url: 'php/eliminar_contenido.php', // La URL del script PHP que eliminará la entrada
        type: 'POST',
        data: { id: id }, // Envia el ID de la entrada al servidor
        success: function(response) {
            // Aquí puedes manejar la respuesta del servidor
            if(response == 1) {
                alert("Entrada eliminada exitosamente");
            } else {
                alert("Error al eliminar la entrada");
            }
        }
    });
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
        document.getElementById('imagen-preview').style.backgroundImage = 'url(data:image/jpeg;base64,' + entrada.imagen + ')';
        document.getElementById('editor').value = entrada.contenido;
    }
}
xhr.send();


