/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';

let tableProducts = $('#table-products');

export const dataTable = tableProducts.DataTable({
	ajax: {
		url: '../models/listProducts.php',
		method: 'GET',
		dataType: 'JSON',
		dataSrc: '',
	},
	columns: [
		{ data: 'id_product' },
		{ data: 'name' },
		{ data: 'price' },
		{ data: 'category' },
		{
			render(data, type, row) {
				return `<div class="btn-group btn-group-sm">
					<button class="edit btn btn-sm btn-warning" data-id="${row.id_product}" data-bs-toggle="modal" data-bs-target="#editProduct">
						<i class="fas fa-pen"></i>
					</button> 
					&nbsp;
					<button class="delete btn btn-sm btn-danger" data-id="${row.id_product}"> 
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
