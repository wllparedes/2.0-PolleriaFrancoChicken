/** @format */

import { si_actualizado, error } from '../../../../assets/js/pages/modules-sweetalert.js';
import { dataTable } from './listProducts.js';
import { validadorFormulario, contenedor_mensaje } from './getProduct.js';

$(document).ready(() => {
	$('#editProduct').on('click', '.update', (e) => {
		e.preventDefault();
		let target = e.target;
		let id = target.getAttribute('data-id');

		let select_categoria = $('#select-category');

		if (validadorFormulario.estadoFormulario() && select_categoria.val()) {
			const newData = {
				id: id,
				name: $('#name').val(),
				price: $('#price').val(),
				id_category: select_categoria.val(),
			};

			$.ajax({
				url: '../models/updateProduct.php',
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
					$('#editProduct').modal('toggle');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
