/** @format */

import { campos } from '../../../../assets/js/global/validarCampos.js';
import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';

// ? seleccionamos la tabla
let tableSuppliers = $('#table-suppliers');
let contenedor_mensaje = document.getElementById('contenedor__mensaje');

// ? cuando se de click dentro de table-users en algun elemento de clase .edit
tableSuppliers.on('click', '.edit', (e) => {
	let target = verifyTarget(e);
	let id = target.getAttribute('data-id');

	$.ajax({
		url: '../models/getSupplier.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {
			let supplier = response;

			$('#razon_social').val(supplier.company_name);
			$('#direccion').val(supplier.address);
			$('#ruc').val(supplier.ruc);
			$('#phone').val(supplier.phone);
			$('#email').val(supplier.email);

			Object.keys(campos).forEach((campo) => {
				campos[campo] = true;
			});
		},
		complete: function () {
			document.querySelector('.update').setAttribute('data-id', id);
			contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
			contenedor_mensaje.classList.add('contenedor__mensaje');
		},
	});
});
