/** @format */

import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import { limpiarModal } from '../../../../assets/js/global/limpiarModal.js';
import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';

// ? seleccionamos la tabla
let tableProducts = $('#table-products');
export let contenedor_mensaje = document.getElementById('contenedor__mensaje');
export let validadorFormulario;
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
			let producto = datos['product'];
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
				search: true,
				noSearchResultsText: 'No se encontraron categorias',
				searchPlaceholderText: 'Buscar categoria',
			});

			// * inicializar el validador del los inputs del form

			const inputs = document.querySelectorAll('#editProduct .input-form');
			validadorFormulario = new ValidarFormulario();

			validadorFormulario.validarFormulario(inputs, {
				name: expresiones.name,
				price: expresiones.price,
			});

		},
		complete: function () {
			document.querySelector('.update').setAttribute('data-id', id);
			limpiarModal('#editProduct', contenedor_mensaje);
		},
	});
});
