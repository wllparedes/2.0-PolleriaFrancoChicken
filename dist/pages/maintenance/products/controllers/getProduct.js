/** @format */

import { campos } from '../../../../assets/js/global/validarCampos.js';
import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';

// ? seleccionamos la tabla
let tableProducts = $('#table-products');
let contenedor_mensaje = document.getElementById('contenedor__mensaje');
// ? cuando se de click dentro de table-products en algun elemento de clase .edit
tableProducts.on('click', '.edit', (e) => {
	let target = verifyTarget(e);
	let id = target.getAttribute('data-id');

	$.ajax({
		url: '../models/getProduct.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {
			let datos = response;
			let producto = datos['product'][0];
			let category = datos['category'];

			$('#name').val(producto.name);
			$('#price').val(producto.price);

			// * seleccionar elemento padre para agregar el select
			const parentElement = document.getElementById('parent-category');

			//  * removemos el html dentro de padre
			parentElement.innerHTML = '';

			// * creamos el elemento select
			const element = document.createElement('div');
			element.setAttribute('id', 'select-category');
			element.setAttribute('class', 'form-control category');

			parentElement.appendChild(element);

			VirtualSelect.init({
				ele: element,
				options: category,
				required: true,
				placeholder: 'Seleccione una categoria',
				selectedValue: producto.id_category,
			});

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
