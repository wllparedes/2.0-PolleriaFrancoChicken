/** @format */

import { campos } from '../../../../assets/js/global/validarCampos.js';
import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';

// ? seleccionamos la tabla
let tableUsers = $('#table-users');

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
			let usuario = datos['user'][0];
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

			Object.keys(campos).forEach((campo) => {
				campos[campo] = true;
			});
		},
		complete: function () {
			document.querySelector('.update').setAttribute('data-id', id);
			contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
			contenedor_mensaje.classList.add('contenedor__mensaje');
		},
	});
});
