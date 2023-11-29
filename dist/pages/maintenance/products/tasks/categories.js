/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/categories.php',
		type: 'GET',
		success: function (response) {
			let data = JSON.parse(response);
			const element = document.querySelector('.categories');
			const choices = new Choices(element, {
				searchEnabled: true,
				searchChoices: true,
				placeholder: true,
				placeholderValue: 'Seleccionar categoria',
				noResultsText: 'No hay resultados',
				itemSelectText: 'Click para seleccionar',
				choices: data, 
			});
		},
	});
});
