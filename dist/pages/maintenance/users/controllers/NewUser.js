/** @format */

// ? MANTENIMIENTO DE CLIENTES
import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { validarCampo, campos } from '../../../../assets/js/global/validarCampos.js';
import  {si_registrado, no_registrado}  from '../../../../assets/js/pages/modules-sweetalert.js';

$(document).ready(() => {
	//  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario input');
	// Start Validación del formulario

	const validarFormulario = (e) => {
		switch (e.target.name) {
			case 'name':
				validarCampo(expresiones.name, 'name', e.target);
				break;
			case 'surnames':
				validarCampo(expresiones.surnames, 'surnames', e.target);
				break;
			case 'phone':
				validarCampo(expresiones.phone, 'phone', e.target);
				break;
			case 'dni':
				validarCampo(expresiones.dni, 'dni', e.target);
				break;
			case 'userName':
				validarCampo(expresiones.userName, 'userName', e.target);
				break;
			case 'email':
				validarCampo(expresiones.email, 'email', e.target);
				break;
			case 'password':
				validarCampo(expresiones.password, 'password', e.target);
				break;
		}
	};

	inputs.forEach((input) => {
		input.addEventListener('keyup', validarFormulario);
		input.addEventListener('blur', validarFormulario);
	});

	// End

	// Cuando se de Submit en el Btn Registrar

	$('#formulario').submit(function (e) {
		e.preventDefault();
		let select_cargo = $('#select-charges');
		if (
			campos.name &&
			campos.surnames &&
			campos.phone &&
			campos.dni &&
			campos.userName &&
			campos.password &&
			campos.email &&
			select_cargo.val()
		) {
			// Ajax
			const postData = {
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
				url: '../models/newUser.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {

					if (!response.status) {
						no_registrado('usuario');
						return;
					}
					document
						.querySelectorAll('#formulario input')
						.forEach((i) => {
							i.classList.remove('is-valid', 'is-invalid');
						});
					si_registrado();
					$('#formulario').trigger('reset');
					
					contenedor_mensaje.classList.add('contenedor__mensaje');
					contenedor_mensaje.classList.remove(
						'contenedor__mensaje-activo'
					);
					redireccionar('listUsers');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
