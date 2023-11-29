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

	// End

	// Cuando se de Submit en el Btn Registrar

	$('#formulario').submit(function (p) {
		p.preventDefault();

		let select_categoria = $('#category');

		if (
			campos.name &&
			campos.price &&
			select_categoria.val()
		) {
			// Ajax
			const postData = {
				name: $('#name').val(),
				price: $('#price').val(),
				id_category: select_categoria.val(),
			};

			$.ajax({
				url: '../models/newProduct.php',
				type: 'POST',
				data: postData,
                success: function (response) {
                    let respuesta = response.trim();
                    console.log(respuesta)
					if (respuesta === 'error') {
						no_registrado('producto');
					} else {
						//
						document
							.querySelectorAll('#formulario input')
							.forEach((i) => {
								i.classList.remove('is-valid', 'is-invalid');
							});
						si_registrado();
						$('#formulario').trigger('reset');
						// redireccionar('lista-usuarios');
					}
				},
			});
		} else {
			// contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
