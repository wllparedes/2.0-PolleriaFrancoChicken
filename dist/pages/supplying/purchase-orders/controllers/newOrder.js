/** @format */

import { RenderTable } from '../../../../assets/vendors/@wallace-renderTables/renderTable.js';
import {
	si_registrado,
	no_registrado,
} from '../../../../assets/js/pages/modules-sweetalert.js';
import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';

$(document).ready(() => {
	let contenedor_mensaje = document.getElementById('contenedor__mensaje');

	let renderTable = new RenderTable();
	renderTable.renderTable({
		url: '../models/loadSupplier.php',
		select: '#select-suppliers',
		divRender: '#table-supplier',
		values: [
			'id',
			'razon-social',
			'direccion',
			'ruc',
			'telefono',
			'correo',
		],
		classMain: {
			messageEmpty: 'messageEmptyWallace-0',
			items: 'itemsOnTable-0',
			table: 'tableRenderWallace-0',
		},
	});

	let renderTable2 = new RenderTable();
	renderTable2.renderTable({
		url: '../models/loadRequirement.php',
		select: '#select-requirements',
		divRender: '#table-requirement',
		values: ['id', 'fecha-y-hora', 'descripcion', 'estado', 'subtotal'],
		classMain: {
			messageEmpty: 'messageEmptyWallace-1',
			items: 'itemsOnTable-1',
			table: 'tableRenderWallace-1',
		},
	});

	$('#formulario').submit(function (e) {
		e.preventDefault();

		let selectSupplier = $('#select-suppliers');
		let selectRequirement = $('#select-requirements');

		if (selectSupplier.val().length && selectRequirement.val()) {
			const postData = {
				idSupplier: selectSupplier.val(),
				idRequirement: selectRequirement.val(),
				dateTime: $('#fecha_hora').val(),
			};

			$.ajax({
				url: '../models/newOrder.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {

					if (!response.status) {
						no_registrado('order de compra');
						return;
					}

					si_registrado();

					renderTable.limpiarTabla({
						select: '#select-suppliers',
						divRender: '#table-supplier',
						classMain: {
							messageEmpty: 'messageEmptyWallace-0',
							items: 'itemsOnTable-0',
							table: 'tableRenderWallace-0',
						},
					});

					renderTable2.limpiarTabla({
						select: '#select-requirements',
						divRender: '#table-requirement',
					});

					limpiarFormularioYRedirigirA(
						contenedor_mensaje,
						'listOrders'
					);
				},
			});
		} else {
			contenedor_mensaje.classList.add('contenedor__mensaje-activo');
		}
	});
});
