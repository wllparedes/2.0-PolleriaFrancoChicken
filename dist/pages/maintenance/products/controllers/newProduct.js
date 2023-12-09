/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {
	validarCampo,
	campos,
} from '../../../../assets/js/global/validarCampos.js';

$(document).ready(() => {
	//  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario input');
	// Start Validación del formulario

	const validarFormulario = (e) => {
		switch (e.target.name) {
			case 'name':
				validarCampo(expresiones.producto, 'name', e.target);
				break;
			case 'price':
				validarCampo(expresiones.precio, 'price', e.target);
				break;
		}
	};

	inputs.forEach((input) => {
		input.addEventListener('keyup', validarFormulario);
		input.addEventListener('blur', validarFormulario);
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

		if (
			campos.name &&
			campos.price &&
			select_categoria.val() && imageFile
		) {
			// Ajax

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
					redireccionar('listProducts');
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
