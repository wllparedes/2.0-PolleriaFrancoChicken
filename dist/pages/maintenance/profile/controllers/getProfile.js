/** @format */

import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';
import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';

// ? seleccionamos la tabla
export let contenedor_mensaje = document.getElementById('contenedor__mensaje');
export let validadorFormulario;

// ? cuando se de click dentro de table-users en algun elemento de clase .edit

	$.ajax({
		url: '../models/getProfile.php',
		type: 'GET',
		dataType: `JSON`,
		success: function (response) {
			// Aquí cargas los datos del cliente en los campos del formulario en el modal
			let profile = response;

			$('#name').val(profile.names);
			$('#surnames').val(profile.surnames);
			$('#phone').val(profile.phone);
			$('#dni').val(profile.dni);
			$('#userName').val(profile.user_name);
			$('#email').val(profile.email);
			$('#password').val(profile.password);
            $('#id_charge').val(profile.charge_user);

			const inputs = document.querySelectorAll('#formulario .input-form');
			validadorFormulario = new ValidarFormulario();

			validadorFormulario.validarFormulario(inputs, {
				name: expresiones.name,
				surnames: expresiones.surnames,
				phone: expresiones.phone,
				dni: expresiones.dni,
				userName: expresiones.userName,
				email: expresiones.email,
				password: expresiones.password,
			});


		},
	});

