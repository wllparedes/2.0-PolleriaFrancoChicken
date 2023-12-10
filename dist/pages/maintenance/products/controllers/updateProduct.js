/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { validarCampo, campos } from '../../../../assets/js/global/validarCampos.js';
import { si_actualizado, error } from '../../../../assets/js/pages/modules-sweetalert.js';
import { dataTable } from './listProducts.js';


let contenedor_mensaje = document.getElementById('contenedor__mensaje');
const inputs = document.querySelectorAll('#editProduct input');

document.querySelector('.close-modal').addEventListener('click', () => {
	// * limpiar el mensaje de incorrecto
	contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
	contenedor_mensaje.classList.add('contenedor__mensaje');

	// * limpiar el color verde o rojo de los imputs
	document.querySelectorAll('#editProduct input').forEach((i) => {
		i.classList.remove('is-valid', 'is-invalid');
	});
});

const validarFormulario = (e) => {
	switch (e.target.name) {
		case 'name':
			validarCampo(expresiones.producto, 'name', e.target);
			break;
		case 'price':
			validarCampo(expresiones.precio, 'price', e.target);
			break;
	}
};

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

$('#editProduct').on('click', '.update', (e) => {
	e.preventDefault();
	let target = e.target;
	let id = target.getAttribute('data-id');

	let select_categoria = $('#select-category');

	if (campos.name && campos.price && select_categoria.val()) {
		const newData = {
			id: id,
			name: $('#name').val(),
			price: $('#price').val(),
			id_category: select_categoria.val(),
		};

		$.ajax({
			url: '../models/updateProduct.php',
			type: 'POST',
			data: newData,
			dataType: 'JSON',
			success: function (response) {
				if (!response.status) {
					error();
					return;
				}

				si_actualizado();
				dataTable.ajax.reload();
			},
			complete: function () {
				document.querySelectorAll('#editProduct input').forEach((i) => {
					i.classList.remove('is-valid', 'is-invalid');
				});
				$('#editProduct').modal('toggle');
				contenedor_mensaje.classList.remove(
					'contenedor__mensaje-activo'
				);
				contenedor_mensaje.classList.add('contenedor__mensaje');
				contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
			},
		});
	} else {
		contenedor_mensaje.classList.add('contenedor__mensaje-activo');
	}
});
