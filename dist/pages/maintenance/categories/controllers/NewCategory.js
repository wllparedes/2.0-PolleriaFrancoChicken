/** @format */

// ? MANTENIMIENTO DE CLIENTES
import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { validarCampo, campos } from '../../../../assets/js/global/validarCampos.js';
import { no_registrado, si_registrado } from '../../../../assets/js/pages/modules-sweetalert.js';


$(document).ready(() => {

	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario input');

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



	$('#formulario').submit(function (e) {
		e.preventDefault();

		if (campos.nameCategory && campos.description) {
			// Ajax
			const postData = {
				nameCategory: $('#nameCategory').val(),
				description: $('#description').val(),
			};

			$.ajax({
				url: '../models/newCategory.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
                success: function (response) {
					if (!response.status) {
                        no_registrado('categoria');
						return;
					}
                    
					document
                    .querySelectorAll('#formulario input')
                    .forEach((i) => {
                        i.classList.remove('is-valid', 'is-invalid');
                    });
					si_registrado();
					$('#formulario').trigger('reset');
					redireccionar('listCategories');
                },
                complete: function () {
                    contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                    contenedor_mensaje.classList.add('contenedor__mensaje');
                }
			});
		} else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
