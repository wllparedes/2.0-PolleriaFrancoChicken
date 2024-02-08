/** @format */

import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';
import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarModal } from '../../../../assets/js/global/limpiarModal.js';

// ? seleccionamos la tabla
let tableUsers = $('#table-users');
export let contenedor_mensaje = document.getElementById('contenedor__mensaje');
export let validadorFormulario;

// ? cuando se de click dentro de table-users en algun elemento de clase .edit

tableUsers.on('click', '.edit', (e) => {
	let target = verifyTarget(e);
	let id = target.getAttribute('data-id');

	$.ajax({
		url: '../models/getUser.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {
			// Aquí cargas los datos del cliente en los campos del formulario en el modal
			let datos = response;
			let usuario = datos['user'];
			let cargos = datos['charge'];

			$('#name').val(usuario.names);
			$('#surnames').val(usuario.surnames);
			$('#phone').val(usuario.phone);
			$('#dni').val(usuario.dni);
			$('#userName').val(usuario.user_name);
			$('#email').val(usuario.email);
			$('#password').val(usuario.password);

			// * seleccionar elemento padre para agregar el select
			const parentElement = document.getElementById('parent-charges');

			//  * removemos el html dentro de padre
			parentElement.innerHTML = '';

			// * creamos el elemento select
			const element = document.createElement('div');

			element.setAttribute('id', 'select-charges');
			element.setAttribute('class', 'form-control charges');

			parentElement.appendChild(element);

			VirtualSelect.init({
				ele: element,
				options: cargos,
				required: true,
				placeholder: 'Seleccione un cargo',
				selectedValue: usuario.id_charge,
				search: true,
				noSearchResultsText: 'No se encontraron cargos',
				searchPlaceholderText: 'Buscar cargo',
			});

			if ($('#parent-state').length) {
				const parentStateElement = document.getElementById('parent-state');

				parentStateElement.innerHTML = '';

				const element2 = document.createElement('div');

				element2.setAttribute('id', 'select-state');
				element2.setAttribute('class', 'form-control state');

				parentStateElement.appendChild(element2);

				VirtualSelect.init({
					ele: element2,
					required: true,
					placeholder: 'Seleccione un estado',
					options: [
						{ label: 'Activo', value: '1' },
						{ label: 'Inactivo', value: '0' },
					],
					selectedValue: usuario.state,
				});
			}

			// * inicializar el validador del los inputs del form

			const inputs = document.querySelectorAll('#editUser .input-form');
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
		complete: function () {
			document.querySelector('.update').setAttribute('data-id', id);
			limpiarModal('#editUser', contenedor_mensaje);
		},
	});
});
