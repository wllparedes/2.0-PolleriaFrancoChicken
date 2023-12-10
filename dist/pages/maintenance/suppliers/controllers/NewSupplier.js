/** @format */

// ? MANTENIMIENTO DE CLIENTES
import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {
	validarCampo,
	campos,
} from '../../../../assets/js/global/validarCampos.js';

$(document).ready(() => {
	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario input');

	const validarFormulario = (e) => {
		switch (e.target.name) {
			case 'razon_social':
				validarCampo(
					expresiones.razon_social,
					'razon_social',
					e.target
				);
				break;
			case 'direccion':
				validarCampo(expresiones.direccion, 'direccion', e.target);
				break;
			case 'ruc':
				validarCampo(expresiones.ruc, 'ruc', e.target);
				break;
			case 'phone':
				validarCampo(expresiones.phone, 'phone', e.target);
				break;
			case 'email':
				validarCampo(expresiones.email, 'email', e.target);
				break;
		}
	};

	inputs.forEach((input) => {
		input.addEventListener('keyup', validarFormulario);
		input.addEventListener('blur', validarFormulario);
	});

	$('#formulario').submit(function (e) {
		e.preventDefault();

		if (
			campos.razon_social &&
			campos.direccion &&
			campos.ruc &&
			campos.phone &&
			campos.email
		) {
			// Ajax
			const postData = {
				razon_social: $('#razon_social').val(),
				direccion: $('#direccion').val(),
				ruc: $('#ruc').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
			};
			console.log(postData)

			$.ajax({
				url: '../models/newSupplier.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {
					console.log(response)

					if (!response.status) {
						no_registrado('proveedor');
						return;
					}
					document
						.querySelectorAll('#formulario input')
						.forEach((i) => {
							i.classList.remove('is-valid', 'is-invalid');
						});
					si_registrado();
					$('#formulario').trigger('reset');
					contenedor_mensaje.classList.remove(
						'contenedor__mensaje-activo'
					);
					contenedor_mensaje.classList.add('contenedor__mensaje');
					redireccionar('listSuppliers');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
