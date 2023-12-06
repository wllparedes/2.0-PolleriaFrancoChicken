/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';

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
            defaultContent:
            '<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editSupplier"><i class="bi bi-pen-fill"></i></button> &nbsp;<button class="btn btn-sm btn-danger eliminar"> <i class="bi bi-trash"></i> </button>',
        },
    ],
    responsive: true,
	autoWidth: false,
	processing: true,
    language: language,
});
let editCategoryModal = new bootstrap.Modal(document.getElementById('editSupplier'));

editCategoryModal._element.addEventListener('show.bs.modal', function (event) {
    
	let button = event.relatedTarget;

    let row = button.closest('tr');
    
	let id = dataTable.cell(row, 0).data();
	

	$.ajax({
		url: '../models/getSupplier.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {
			
			// Aquí cargas los datos del cliente en los campos del formulario en el modal
			let proveedor = response;;

			//console.log(response)
			
			//const cargos = usuario['cargo'];
			//const datos = usuario['usuario'][0];

			$('#id_supplier').val(proveedor.id);
			$('#razon_social').val(proveedor.company_name);
			$('#direccion').val(proveedor.address);
            $('#ruc').val(proveedor.ruc);
            $('#phone').val(proveedor.phone);
            $('#email').val(proveedor.email);
		}
	});

});
    