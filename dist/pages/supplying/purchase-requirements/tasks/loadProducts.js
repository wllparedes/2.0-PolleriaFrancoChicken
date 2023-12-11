/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/loadProducts.php',
        type: 'GET',
        dataType: 'JSON',
        success: function (response) {

            let products = response;

            VirtualSelect.init({
				ele: '#select-products',
				options: products,
				multiple: true,
				search: true,
				required: true,
				searchPlaceholderText: 'Buscar...',
				noSearchResultsText: 'No se encontraron resultados',
				noOptionsText: 'No hay productos para mostrar',
				allOptionsSelectedText: 'Todo seleccionado',
				optionsSelectedText: 'Opciones seleccionadas',
				placeholder: `Seleccionar Productos`,
			});

		},
	});
});
