/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';
import { no_registrado, si_registrado} from '../../../../assets/js/pages/modules-sweetalert.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';


$(document).ready(() => {

	let contenedor_mensaje = document.getElementById('contenedor__mensaje');
	const inputs = document.querySelectorAll('#formulario .input-form');

	let validadorFormulario = new ValidarFormulario();

	validadorFormulario.validarFormulario(inputs, {
		razon_social: expresiones.razon_social,
		direccion: expresiones.direccion,
		ruc: expresiones.ruc,
		phone: expresiones.phone,
		email: expresiones.email
	});


	$('#formulario').submit(function (e) {
		e.preventDefault();

		if (validadorFormulario.estadoFormulario() === true) {
			const postData = {
				razon_social: $('#razon_social').val(),
				direccion: $('#direccion').val(),
				ruc: $('#ruc').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
			};

			$.ajax({
				url: '../models/newSupplier.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {

					if (!response.status) {
						no_registrado('proveedor');
						return;
					}

					si_registrado();
					limpiarFormularioYRedirigirA(contenedor_mensaje, 'listSuppliers');
				
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
