/** @format */

import { dataTable } from './listUsers.js';
import { error, si_actualizado } from '../../../../assets/js/pages/modules-sweetalert.js';
import { validadorFormulario, contenedor_mensaje } from './getUser.js';

$(document).ready(function () {

	$('#editUser').on('click', '.update', function (e) {
		e.preventDefault();

		let target = e.target;
		let id = target.getAttribute('data-id');
		let select_cargo = $('#select-charges');

		if (validadorFormulario.estadoFormulario() == true && select_cargo.val()) {
			const newData = {
				id: id,
				name: $('#name').val(),
				surnames: $('#surnames').val(),
				phone: $('#phone').val(),
				dni: $('#dni').val(),
				userName: $('#userName').val(),
				email: $('#email').val(),
				password: $('#password').val(),
				id_charge: select_cargo.val(),
			};

			$.ajax({
				url: '../models/updateUser.php',
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
					$('#editUser').modal('toggle');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
