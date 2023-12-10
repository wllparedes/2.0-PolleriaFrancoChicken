/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';
import { no_registrado, si_registrado } from '../../../../assets/js/pages/modules-sweetalert.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';


$(document).ready(() => {

	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario .input-form');


	let validadorFormulario = new ValidarFormulario();

	validadorFormulario.validarFormulario(inputs, {
		nameCategory: expresiones.nameCategory,
		description: expresiones.description,
	});


	$('#formulario').submit(function (e) {
		e.preventDefault();

		if (validadorFormulario.estadoFormulario() === true) {

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
                    
					si_registrado();
					limpiarFormularioYRedirigirA(contenedor_mensaje, 'listCategories');
                }
			});
		} else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
