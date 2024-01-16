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
				title: 'REPORTE DE PROVEEDORES',
				filename: 'excel_proveedores',
				exportOptions: {
					//columns: ':visible'
					columns: [0,1,2,3,4,5]
				},
				excelStyles:{
					template: "green_medium"
				}
			},
			{
			//BOTON PDF
                extend: 'pdfHtml5',
                text: "<i class='fa fa-file-pdf'></i> PDF",
                className: 'btn-danger',
                title: 'REPORTE DE PROVEEDORES',
                filename: 'pdf_proveedores',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                },
                customize: function(doc) {
                    doc.content[1].table.widths = ['10%', '20%', '20%', '15%', '15%', '20%']; // Ajusta el ancho de las columnas
                    doc.styles.tableHeader.fillColor = '#3f8880'; // Cambia el color del encabezado de la tabla
                }
            }
				]
			},
});

