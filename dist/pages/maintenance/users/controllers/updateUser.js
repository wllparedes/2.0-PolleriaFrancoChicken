/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {
	validarCampo,
	campos,
} from '../../../../assets/js/global/validarCampos.js';
import { dataTable } from './listUsers.js';

$(document).ready(function () {
	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#editUser input');

	document.querySelector('.close-modal').addEventListener('click', () => {
		// * limpiar el mensaje de incorrecto
		contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
		contenedor_mensaje.classList.add('contenedor__mensaje');

		// * limpiar el color verde o rojo de los imputs
		document.querySelectorAll('#editUser input').forEach((i) => {
			i.classList.remove('is-valid', 'is-invalid');
		});
	});

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

	$('#editUser').on('click', '.update', function (e) {
		e.preventDefault();

		let target = e.target;
		let id = target.getAttribute('data-id');

		// Almacena los elementos seleccionados una vez
		let select_cargo = $('#select-charges');

		if (
			campos.name &&
			campos.surnames &&
			campos.phone &&
			campos.dni &&
			campos.userName &&
			campos.email &&
			campos.password &&
			select_cargo.val()
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
					contenedor_mensaje.classList.add('contenedor__mensaje');
					contenedor_mensaje.classList.remove(
						'contenedor__mensaje-activo'
					);
				},
				complete: function () {
					document
						.querySelectorAll('#editUser input')
						.forEach((i) => {
							i.classList.remove('is-valid', 'is-invalid');
						});
					$('#editUser').modal('toggle');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
