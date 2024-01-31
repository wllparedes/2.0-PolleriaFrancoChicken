/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';

let tableRequirements = $('#table-requirements');
export const dataTable = tableRequirements.DataTable({
	ajax: {
		url: '../models/listRequirements.php',
		method: 'GET',
		dataType: 'JSON',
		dataSrc: '',
	},
	columns: [
		{ data: 'id_requirement' },
		{ data: 'name_user' },
		{ data: 'day' },
		{ data: 'hour' },
		{ data: 'description' },
		{ data: 'subtotal' },
		{ data: 'state' },
		{
			render: function (data, type, row) {
				return `<div class="btn-group btn-group-sm">
					<button class="view btn btn-sm btn-info" data-id="${row.id_requirement}" data-bs-toggle="modal" data-bs-target="#viewRequirements">
						<i class="fas fa-eye"></i>
					</button>
					&nbsp;
					<button class="pdf btn btn-sm btn-warning" data-id="${row.id_requirement}"> 
						<i class="fas fa-file-pdf"></i>
					</button>
					&nbsp;
					<button class="delete btn btn-sm btn-danger" data-id="${row.id_requirement}"> 
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

// inicializar el datatable de productos
export let tableProducts = $('#table-product').DataTable({
	responsive: true,
	autoWidth: false,
	processing: true,
	language: language,
	pageLength: 100,
	searching: false,
	lengthChange: false,
	paging: false,
	info: false,
});

tableRequirements.on('click', '.pdf', function () {

    let requirementId = $(this).data('id');
    let newPageUrl = '../../../../../dist/assets/fpdf/pdfRequirement.php?id=' + requirementId;
	window.open(newPageUrl, '_blank');
	
});