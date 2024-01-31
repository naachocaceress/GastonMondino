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



