/** @format */

import { dataTable } from './listCategories.js';
import { error, si_actualizado } from '../../../../assets/js/pages/modules-sweetalert.js';
import { validadorFormulario, contenedor_mensaje } from './getCategory.js';

$(document).ready(() => {

	$('#editCategory').on('click', '.update', function (e) {

		e.preventDefault();
		
		let target = e.target;
		let id = target.getAttribute('data-id');

		if (validadorFormulario.estadoFormulario() == true) {
			const newData = {
				id: id,
				nameCategory: $('#nameCategory').val(),
				description: $('#description').val(),
			};
			$.ajax({
				url: '../models/updateCategory.php',
				type: 'POST',
				data: newData,
				dataType: 'JSON',
				success: function (response) {
					if (!response.status) {
						error();
						return;
					}
					si_actualizado();
					dataTable.ajax.reload();
				},
				complete: function () {
					$('#editCategory').modal('toggle');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});

});
