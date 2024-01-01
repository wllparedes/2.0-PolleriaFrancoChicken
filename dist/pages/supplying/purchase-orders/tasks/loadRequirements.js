/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/loadRequirements.php',
		type: 'GET',
		dataType: 'JSON',
        success: function (response) {
            
			let requirements = response;

			VirtualSelect.init({
				ele: '#select-requirements',
				options: requirements,
				search: true,
				required: true,
				searchPlaceholderText: 'Buscar...',
				noSearchResultsText: 'No se encontraron resultados',
				noOptionsText: 'No hay requerimientos  para mostrar',
				allOptionsSelectedText: 'Todo seleccionado',
				optionsSelectedText: 'Opciones seleccionadas',
				placeholder: `Seleccionar un requerimiento`,
			});
		},
	});
});
