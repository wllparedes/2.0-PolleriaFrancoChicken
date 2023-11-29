/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';

let tableUsers = document.querySelector('#table-users');

export const dataTable = new DataTable(tableUsers, {
	ajax: {
		url: '../models/listUsers.php',
		method: 'GET',
		dataType: 'JSON',
		dataSrc: '',
	},
	columns: [
		{ data: 'id_user' },
		{ data: 'names' },
		{ data: 'surnames' },
		{ data: 'phone' },
		{ data: 'dni' },
		{ data: 'user_name' },
		{ data: 'email' },
		{ data: 'charge' },
		{
			defaultContent:
			'<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUser"><i class="bi bi-pen-fill"></i></button> &nbsp;<button class="eliminar btn btn-sm btn-danger "> <i class="bi bi-trash"></i> </button>',
		},
	],
	language: language,
});


let editCategoryModal = new bootstrap.Modal(document.getElementById('editUser'));

editCategoryModal._element.addEventListener('show.bs.modal', function (event) {

	let button = event.relatedTarget;

	let row = button.closest('tr');

	let id = dataTable.cell(row, 0).data();


	$.ajax({
		url: '../models/getUser.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {
			
			
			// Aquí cargas los datos del cliente en los campos del formulario en el modal
			let datos = response ;
			let usuario = datos["user"][0];
			let cargos = datos["charge"];

			//console.log(response)
			
			//const cargos = usuario['cargo'];
			//const datos = usuario['usuario'][0];

			$('#id_usuario').val(usuario.id);
			$('#name').val(usuario.names);
			$('#surnames').val(usuario.surnames);
			$('#phone').val(usuario.phone);
			$('#dni').val(usuario.dni);
			$('#userName').val(usuario.user_name);
			$('#email').val(usuario.email);
			$('#password').val(usuario.password);

			const chargeSelect = new Choices('#charges', {
				choices: cargos
				
			  });
			chargeSelect.setChoiceByValue(usuario.id_charge);
			Object.keys(campos).forEach(campo => { campos[campo] = true; });

		}
	});

});



