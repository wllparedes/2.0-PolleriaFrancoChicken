/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {
	validarCampo,
	campos,
} from '../../../../assets/js/global/validarCampos.js';
import { dataTable } from './listSuppliers.js';
// ? ACTUALIZAR

$(document).ready(() => {
	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#editSupplier input');

	document.querySelector('.close-modal').addEventListener('click', () => {
		// * limpiar el mensaje de incorrecto
		contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
		contenedor_mensaje.classList.add('contenedor__mensaje');

		// * limpiar el color verde o rojo de los imputs
		document.querySelectorAll('#editSupplier input').forEach((i) => {
			i.classList.remove('is-valid', 'is-invalid');
		});
	});

	// Start ValidaciÃ³n del formulario

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

	// End

	//? Cuando se de click al boton actualizar

	$('#editSupplier').on('click', '.update', function (e) {
		e.preventDefault();

		let target = e.target;
		let id = target.getAttribute('data-id');

		if (
			campos.razon_social &&
			campos.direccion &&
			campos.ruc &&
			campos.phone &&
			campos.email
		) {
			// Ajax
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
					contenedor_mensaje.classList.add('contenedor__mensaje');
					contenedor_mensaje.classList.remove(
						'contenedor__mensaje-activo'
					);

				},
				complete: function () {
					document
						.querySelectorAll('#editSupplier input')
						.forEach((i) => {
							i.classList.remove('is-valid', 'is-invalid');
						});
					$('#editSupplier').modal('toggle');
					contenedor_mensaje.classList.add('contenedor__mensaje');
					contenedor_mensaje.classList.remove(
						'contenedor__mensaje-activo'
					);
					$('#editSupplier').modal('toggle');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
