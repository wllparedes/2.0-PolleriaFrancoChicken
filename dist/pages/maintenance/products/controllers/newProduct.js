/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';
import {
	si_registrado,
	no_registrado,
	sizeError,
	error,
} from '../../../../assets/js/pages/modules-sweetalert.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';

$(document).ready(() => {
	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario .input-form');

	let validadorFormulario = new ValidarFormulario();

	validadorFormulario.validarFormulario(inputs, {
		name: expresiones.name,
		price: expresiones.price,
	});

	$('#formulario').submit(function (e) {
		e.preventDefault();

		let select_categoria = $('#category');

		if (validadorFormulario.estadoFormulario() && select_categoria.val()) {

			let postData = {
				name: $('#name').val(),
				price: $('#price').val(),
				id_category: select_categoria.val(),
			};

			$.ajax({
				url: '../models/newProduct.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {

					if (!response.status) {
						error('producto');
						return;
					}

					si_registrado();
					limpiarFormularioYRedirigirA(
						contenedor_mensaje,
						'listProducts'
					);
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
