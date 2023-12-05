/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';

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
			defaultContent:
			'<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editProduct"><i class="bi bi-pen-fill"></i></button> &nbsp;<button class="btn btn-sm btn-danger eliminar"> <i class="bi bi-trash"></i> </button>'
		},
	],
	responsive: true,
	autoWidth: false,
	processing: true,
	language: language,
});


let editCategoryModal = new bootstrap.Modal(document.getElementById('editProduct'));

editCategoryModal._element.addEventListener('show.bs.modal', function (event) {

	let button = event.relatedTarget;

	let row = button.closest('tr');

	let id = dataTable.cell(row, 0).data();
	

	$.ajax({
		url: '../models/getProduct.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {
		
			
			// Aquí cargas los datos del cliente en los campos del formulario en el modal
			let datos = response ;
			let producto = datos["product"][0];
			let category = datos["category"];

			//console.log(response)
			
			//const cargos = usuario['cargo'];
			//const datos = usuario['usuario'][0];

			$('#id_producto').val(producto.id);
			$('#name').val(producto.name);
			$('#price').val(producto.price);

			const categorySelect = new Choices('#category', {
				choices: category
				
			  });
			categorySelect.setChoiceByValue(producto.id_category);
			Object.keys(campos).forEach(campo => { campos[campo] = true; });

		}
	});

});