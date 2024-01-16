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

	dom:'<"row"B<"col-md-6 p-3"l><"col-md-6 w-1 p-3"f>>rtip',
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
				title: 'REPORTE DE PRODUCTOS',
				filename: 'excel_productos',
				exportOptions: {
					//columns: ':visible'
					columns: [0,1,2,3]
				},
				excelStyles:{
					template: "blue_medium"
				}
			},
			{
			//BOTON PDF
                extend: 'pdfHtml5',
                text: "<i class='fa fa-file-pdf'></i> PDF",
                className: 'btn-danger',
                title: 'REPORTE DE PRODUCTOS',
                filename: 'pdf_productos',
                exportOptions: {
                    columns: [0,1,2,3]
                },
                customize: function(doc) {
                    doc.content[1].table.widths = ['25%', '25%', '25%', '25%']; // Ajusta el ancho de las columnas
                    doc.styles.tableHeader.fillColor = '#6aa3b4'; // Cambia el color del encabezado de la tabla
                }
            }
				]
			},
});
