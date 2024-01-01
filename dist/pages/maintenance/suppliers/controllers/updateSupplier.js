/** @format */

import { dataTable } from './listSuppliers.js';
import { error, si_actualizado } from '../../../../assets/js/pages/modules-sweetalert.js';
import { validadorFormulario, contenedor_mensaje } from './getSupplier.js';


$(document).ready(() => {

	$('#editSupplier').on('click', '.update', function (e) {

		e.preventDefault();

		let target = e.target;
		let id = target.getAttribute('data-id');

		if (validadorFormulario.estadoFormulario() == true) {
			const newData = {
				id: id,
				razon_social: $('#razon_social').val(),
				direccion: $('#direccion').val(),
				ruc: $('#ruc').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
			};
			$.ajax({
				url: '../models/updateSupplier.php',
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
					$('#editSupplier').modal('toggle');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
