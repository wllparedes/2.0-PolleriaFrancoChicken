/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/loadSuppliers.php',
		type: 'GET',
		dataType: 'JSON',
		success: function (response) {
			let suppliers = response;

			VirtualSelect.init({
				ele: '#select-suppliers',
				options: suppliers,
				// multiple: true,
				search: true,
				required: true,
				searchPlaceholderText: 'Buscar...',
				noSearchResultsText: 'No se encontraron resultados',
				noOptionsText: 'No hay proveedores para mostrar',
				allOptionsSelectedText: 'Todo seleccionado',
				optionsSelectedText: 'Opciones seleccionadas',
				placeholder: `Seleccionar proveedor`,
			});
		},
	});
});
