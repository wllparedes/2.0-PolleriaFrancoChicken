/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';

let tableProducts = document.querySelector('#table-products');

let dataTable = new DataTable(tableProducts, {
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
			defaultContent:
				'<button class="btn btn-sm btn-warning"><i class="bi bi-pen-fill"></i></button> &nbsp; <button class= "btn btn-sm btn-danger"><i class="bi bi-trash"></i></ > ',
		},
	],
	language: language,
});
