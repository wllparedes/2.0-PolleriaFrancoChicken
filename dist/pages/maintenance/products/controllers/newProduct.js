/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';
import { si_registrado, no_registrado, sizeError } from '../../../../assets/js/pages/modules-sweetalert.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';

$(document).ready(() => {

	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario .input-form');

	let validadorFormulario = new ValidarFormulario();

	validadorFormulario.validarFormulario(inputs, {
		name: expresiones.name,
		price: expresiones.price,
	});

	let imageFile;
	$('input[type=file]').on('change', function () {
		let imagenProduct = $(this)[0];
		let file = imagenProduct.files[0];
		imageFile = file;
	});

	$('#formulario').submit(function (e) {
		e.preventDefault();

		let select_categoria = $('#category');

		if (validadorFormulario.estadoFormulario() && imageFile && select_categoria.val()) {

			let postData = new FormData();
			postData.append('name', $('#name').val());
			postData.append('price', $('#price').val());
			postData.append('id_category', select_categoria.val());
			postData.append('image', imageFile);

			$.ajax({
				url: '../models/newProduct.php',
				type: 'POST',
				data: postData,
				contentType: false,
				processData: false,
				dataType: 'JSON',
				success: function (response) {
					if (response.status === 'sizeError') {
						sizeError('producto');
						return;
					}
					if (!response.status) {
						no_registrado('producto');
						return;
					}

					si_registrado();
					limpiarFormularioYRedirigirA(contenedor_mensaje, 'listProducts');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
