/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/charges.php',
		type: 'GET',
		dataType: 'JSON',
		success: function (response) {
			const element = document.getElementById('select-charges');

			VirtualSelect.init({
				ele: element,
				options: response,
				required: true,
				placeholder: 'Seleccione un cargo',
				search: true,
				noSearchResultsText: 'No se encontraron cargos',
				searchPlaceholderText: 'Buscar cargo',
			});
		},
	});
});
