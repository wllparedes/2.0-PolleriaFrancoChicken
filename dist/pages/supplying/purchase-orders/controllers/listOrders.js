/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';

let tableOrders = $('#table-orders');

export const dataTable = tableOrders.DataTable({
	ajax: {
		url: '../models/listOrders.php',
		method: 'GET',
		dataType: 'JSON',
		dataSrc: '',
	},
	columns: [
		{ data: 'id' },
		{ data: 'company_name' },
		{ data: 'observation' },
		{ data: 'date' },
		{ data: 'hour' },
		{ data: 'subtotal' },
		{ data: 'total' },
		{ data: 'state' },
		{
			render: function (data, type, row) {
				return `<div class="btn-group btn-group-sm">
					<button class="view btn btn-sm btn-info" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#viewOrder">
						<i class="fas fa-eye"></i>
					</button>
					&nbsp;
					<button class="delete btn btn-sm btn-danger" data-id="${row.id}"> 
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
