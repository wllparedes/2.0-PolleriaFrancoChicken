/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';
let tableUsers = document.querySelector('#table-users');

let dataTable = new DataTable(tableUsers, {
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
				'<button class="btn btn-sm btn-warning"><i class="bi bi-pen-fill"></i></button> &nbsp; <button class= "btn btn-sm btn-danger"><i class="bi bi-trash"></i></ > ',
		},
	],
	language: language,
});

