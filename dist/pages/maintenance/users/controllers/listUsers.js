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
		{ data: 'state' },
		{
			render: function (data, type, row) {
				return `<div class="btn-group btn-group-sm">
					<button class="edit btn btn-sm btn-warning" data-id="${row.id_user}" data-bs-toggle="modal" data-bs-target="#editUser">
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

	dom: '<"row"B<"col-md-6 p-3"l><"col-md-6 p-3"f>>rtip',
	buttons: {
		dom: {
			button: {
				className: 'btn',
			},
		},
		buttons: [
			//BOTON EXCEL
			{
				extend: 'excelHtml5',
				text: "<i class='fa fa-file-excel'></i> Excel",
				className: 'btn-success',
				title: 'REPORTE DE USUARIOS',
				filename: 'excel_usuarios',
				exportOptions: {
					//columns: ':visible'
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
				},
				excelStyles: {
					template: 'orange_medium',
				},
			},
			{
				//BOTON PDF
				extend: 'pdfHtml5',
				text: "<i class='fa fa-file-pdf'></i> PDF",
				className: 'btn-danger',
				title: 'REPORTE DE USUARIOS',
				filename: 'pdf_usuarios',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
				},
				customize: function (doc) {
					doc.content[1].table.widths = [
						'5%',
						'10%',
						'10%',
						'10%',
						'10%',
						'15%',
						'15%',
						'15%',
						'10%',
					];
					doc.styles.tableHeader.fillColor = '#C497E7';
				},
			},
		],
	},
});
