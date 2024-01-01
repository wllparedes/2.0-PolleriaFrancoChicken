/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';

let tableCategories = $('#table-categories');

export const dataTable = tableCategories.DataTable({
	ajax: {
		url: '../models/listCategories.php',
		method: 'GET',
		dataType: 'JSON',
		dataSrc: '',
	},
	columns: [
		{ data: 'id_category' },
		{ data: 'nameCategory' },
		{ data: 'description' },
		{
			render: function (data, type, row) {
				return `<div class="btn-group btn-group-sm">
					<button class="edit btn btn-sm btn-warning" data-id="${row.id_category}" data-bs-toggle="modal" data-bs-target="#editCategory">
						<i class="fas fa-pen"></i>
					</button> 
					&nbsp;
					<button class="delete btn btn-sm btn-danger" data-id="${row.id_category}"> 
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
