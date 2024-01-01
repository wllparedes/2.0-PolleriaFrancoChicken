/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';


let tableSuppliers = $('#table-suppliers');

export const dataTable = tableSuppliers.DataTable({
	ajax: {
		url: '../models/listSuppliers.php',
		method: 'GET',
		dataType: 'JSON',
		dataSrc: '',
	},
	columns: [
		{ data: 'id_supplier' },
		{ data: 'razon_social' },
		{ data: 'direccion' },
		{ data: 'ruc' },
		{ data: 'phone' },
		{ data: 'email' },
		{
			render: function (data, type, row) {
				return `<div class="btn-group btn-group-sm">
					<button class="edit btn btn-sm btn-warning" data-id="${row.id_supplier}" data-bs-toggle="modal" data-bs-target="#editSupplier">
						<i class="fas fa-pen"></i>
					</button> 
					&nbsp;
					<button class="delete btn btn-sm btn-danger" data-id="${row.id_supplier}"> 
						<i class="fas fa-trash"></i>
					</button>
				</div>`;
			}
		},
	],
	responsive: true,
	autoWidth: false,
	processing: true,
	language: language,
});

