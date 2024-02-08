/** @format */

import { dataTable } from './listUsers.js';
import {
	error,
	si_actualizado,
} from '../../../../assets/js/pages/modules-sweetalert.js';
import { validadorFormulario, contenedor_mensaje } from './getUser.js';

$(document).ready(function () {
	$('#editUser').on('click', '.update', function (e) {
		e.preventDefault();

		let target = e.target;
		let id = target.getAttribute('data-id');
		let select_cargo = $('#select-charges');
		let select_state = $('#select-state');

		let ifExistsSelectState = select_state.length > 0 ? true : false;

		if (
			validadorFormulario.estadoFormulario() == true &&
			select_cargo.val() &&
			(ifExistsSelectState ? select_state.val() : true)
		) {
			const newData = {
				id: id,
				name: $('#name').val(),
				surnames: $('#surnames').val(),
				phone: $('#phone').val(),
				dni: $('#dni').val(),
				userName: $('#userName').val(),
				email: $('#email').val(),
				password: $('#password').val(),
				state: select_state.val() ?? 'notExist',
				id_charge: select_cargo.val(),
			};

			console.log(newData);

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
