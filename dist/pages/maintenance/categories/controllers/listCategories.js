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

	dom:'<"row"B<"col-md-6 p-3"l><"col-md-6 p-3"f>>rtip',
	buttons:{
		dom:{
			button:{
				className: 'btn'
			}
		},
		buttons:[
			//BOTON EXCEL
			{
				extend: 'excelHtml5',
				text:"<i class='fa fa-file-excel'></i> Excel",
				className: 'btn-success',
				title: 'REPORTE DE CATEGORIAS',
				filename: 'excel_categorias',
				exportOptions: {
					//columns: ':visible'
					columns: [0,1,2]
				},
				excelStyles:{
					template: "cyan_medium"
				}
			},
			{
			//BOTON PDF
                extend: 'pdfHtml5',
                text: "<i class='fa fa-file-pdf'></i> PDF",
                className: 'btn-danger',
                title: 'REPORTE DE CATEGORIAS',
                filename: 'pdf_categorias',
                exportOptions: {
                    columns: [0,1,2]
                },
                customize: function(doc) {
                    doc.content[1].table.widths = ['25%', '25%', '50%']; // Ajusta el ancho de las columnas
                    doc.styles.tableHeader.fillColor = '#3498db'; // Cambia el color del encabezado de la tabla
                }
            }
				]
			},
});
