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

const formulario = document.getElementById('formulario');
formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const contenido = tinymce.activeEditor.getContent();
	console.log(contenido);
});
