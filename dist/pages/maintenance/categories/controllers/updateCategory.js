/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { validarCampo, campos } from '../../../../assets/js/global/validarCampos.js';
import { si_actualizado, error } from '../../../../assets/js/pages/modules-sweetalert.js';
import { dataTable } from './listCategories.js';

$(document).ready(function () {
	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#editCategory input');

	document.querySelector('.close-modal').addEventListener('click', () => {
		// * limpiar el mensaje de incorrecto
		contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
		contenedor_mensaje.classList.add('contenedor__mensaje');

		// * limpiar el color verde o rojo de los imputs
		document.querySelectorAll('#editCategory input').forEach((i) => {
			i.classList.remove('is-valid', 'is-invalid');
		});
	});

	const validarFormulario = (e) => {
		switch (e.target.name) {
			case 'nameCategory':
				validarCampo(
					expresiones.nameCategory,
					'nameCategory',
					e.target
				);
				break;
			case 'description':
				validarCampo(expresiones.description, 'description', e.target);
				break;
		}
	};

	inputs.forEach((input) => {
		input.addEventListener('keyup', validarFormulario);
		input.addEventListener('blur', validarFormulario);
	});

	$('#editCategory').on('click', '.update', function (e) {
		e.preventDefault();
		let target = e.target;
		let id = target.getAttribute('data-id');

		if (campos.nameCategory && campos.description) {
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
					document
						.querySelectorAll('#editCategory input')
						.forEach((i) => {
							i.classList.remove('is-valid', 'is-invalid');
						});
					$('#editCategory').modal('toggle');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
