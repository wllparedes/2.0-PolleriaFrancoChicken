/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';
let tableUsers = $('#table-users');

export const dataTable = tableUsers.DataTable({
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
			render: function (data, type, row) {
				return `<div class="btn-group btn-group-sm">
					<button class="edit btn btn-sm btn-warning" data-id="${row.id_user}" data-id="id_user" data-bs-toggle="modal" data-bs-target="#editUser">
						<i class="fas fa-pen"></i>
					</button> 
					&nbsp;
					<button class="delete btn btn-sm btn-danger" data-id="${row.id_user}"> 
						<i class="fas fa-trash"></i>
					</button>
				</div>`;
			},
		},
	],
	responsive: true,
	autoWidth: false,
	processing: true,
	language: language,
});

