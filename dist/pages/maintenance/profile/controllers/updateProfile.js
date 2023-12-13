/** @format */

import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';
import { limpiarProfile } from '../../../../assets/js/global/limpiarPerfil.js';
import  { si_actualizado, error }  from '../../../../assets/js/pages/modules-sweetalert.js';
import { validadorFormulario, contenedor_mensaje } from './getProfile.js';

$(document).ready(() => {

	$('#formulario').submit(function (e) {
		e.preventDefault();

		if ( validadorFormulario.estadoFormulario() ) {
			const postData = {
				name: $('#name').val(),
				surnames: $('#surnames').val(),
				phone: $('#phone').val(),
				dni: $('#dni').val(),
				userName: $('#userName').val(),
				email: $('#email').val(),
				password: $('#password').val(),
			};

			$.ajax({
				url: '../models/updateProfile.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {
					if (!response.status) {
						error();
						return;
					}

					si_actualizado();
					limpiarProfile(contenedor_mensaje);
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
