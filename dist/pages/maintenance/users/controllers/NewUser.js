/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';
import {
	si_registrado,
	no_registrado,
} from '../../../../assets/js/pages/modules-sweetalert.js';

$(document).ready(() => {
	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario .input-form');

	let validadorFormulario = new ValidarFormulario();

	validadorFormulario.validarFormulario(inputs, {
		name: expresiones.name,
		surnames: expresiones.surnames,
		phone: expresiones.phone,
		dni: expresiones.dni,
		userName: expresiones.userName,
		email: expresiones.email,
		password: expresiones.password,
	});

	$('#formulario').submit(function (e) {
		e.preventDefault();
		let select_cargo = $('#select-charges');
		let select_state = $('#select-state');

		if (
			validadorFormulario.estadoFormulario() === true &&
			select_cargo.val() &&
			select_state.val()
		) {
			let postData = {
				name: $('#name').val(),
				surnames: $('#surnames').val(),
				phone: $('#phone').val(),
				dni: $('#dni').val(),
				userName: $('#userName').val(),
				email: $('#email').val(),
				password: $('#password').val(),
				state: select_state.val(),
				id_charge: select_cargo.val(),
			};

			$.ajax({
				url: '../models/newUser.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {
					if (!response.status) {
						no_registrado('usuario');
						return;
					}

					si_registrado();
					limpiarFormularioYRedirigirA(
						contenedor_mensaje,
						'listUsers'
					);
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
