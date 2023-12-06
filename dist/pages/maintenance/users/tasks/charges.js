/** @format */

$(document).ready(() => {
	$.ajax({
		url: '../tasks/charges.php',
		type: 'GET',
		success: function (response) {
			let data = JSON.parse(response);
			const element = document.getElementById('select-charges');

			VirtualSelect.init({
				ele: element,
				options: data,
				required: true,
				placeholder: 'Seleccione un cargo',
			});
		},
	});
});
