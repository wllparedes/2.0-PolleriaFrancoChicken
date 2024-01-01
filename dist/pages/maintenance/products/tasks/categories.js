/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/categories.php',
		type: 'GET',
		dataType: 'JSON',
		success: function (response) {
			const element = document.getElementById('category');

			VirtualSelect.init({
				ele: element,
				options: response,

				search: true,
				noSearchResultsText: 'No se encontraron categorias',
				searchPlaceholderText: 'Buscar categoria',

				required: true,
				placeholder: 'Seleccione una categoria',
				noOptionsText: 'No hay categorias registradas',
			});
		},
	});
});
