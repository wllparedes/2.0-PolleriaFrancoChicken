/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/charges.php',
		type: 'GET',
		success: function (response) {
			let data = JSON.parse(response);
			const element = document.querySelector('.charges');
			const choices = new Choices(element, {
				searchEnabled: true,
				searchChoices: true,
				placeholder: true,
				placeholderValue: 'Seleccionar cargo',
				noResultsText: 'No hay resultados',
				itemSelectText: 'Click para seleccionar',
				choices: data, 
			});
		},
	});
});
