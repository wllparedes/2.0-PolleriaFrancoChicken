/** @format */

import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';
import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarModal } from '../../../../assets/js/global/limpiarModal.js';

// ? seleccionamos la tabla
let tableSuppliers = $('#table-suppliers');
export let contenedor_mensaje = document.getElementById('contenedor__mensaje');
export let validadorFormulario;

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

			// * inicializar el validador del los inputs del form

			const inputs = document.querySelectorAll('#editSupplier .input-form');
			validadorFormulario = new ValidarFormulario();

			validadorFormulario.validarFormulario(inputs, {
				razon_social: expresiones.razon_social,
				direccion: expresiones.direccion,
				ruc: expresiones.ruc,	
				phone: expresiones.phone,
				email: expresiones.email,
			});
		},
		complete: function () {
			document.querySelector('.update').setAttribute('data-id', id);
			limpiarModal('#editSupplier', contenedor_mensaje);
		},
	});
});
