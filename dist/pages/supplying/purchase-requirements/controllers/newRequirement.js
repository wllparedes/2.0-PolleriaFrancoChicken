/** @format */

import { RenderTable } from '../../../../assets/vendors/@wallace-renderTables/renderTable.js';
import  {si_registrado, no_registrado}  from '../../../../assets/js/pages/modules-sweetalert.js';
import { limpiarFormularioYRedirigirA } from '../../../../assets/js/global/limpiarFormularioYRedirigir.js';

$(document).ready(() => {

    let renderTable = new RenderTable(true);
    let contenedor_mensaje = document.getElementById('contenedor__mensaje');

    renderTable.renderTable({
        url:'../models/loadProducts.php',
		select: '#select-products',
		divRender: '#table-products',
		values: ['id', 'nombre', 'precio', 'categoria', 'cantidad']
    });

	$('#formulario').submit(function (e) {
		e.preventDefault();
        
        let selectProducts = $('#select-products');

		if (selectProducts.val().length > 0) {

			const postData = {
				description: $('#observation').val(),
				items: renderTable.obtenerCantidadYProducto(),
			};

			$.ajax({
				url: '../models/newRequirement.php',
				type: 'POST',
				data: postData,
				dataType: 'JSON',
				success: function (response) {

					if (!response.status) {
						no_registrado('requerimiento');
						return;
					}

					si_registrado();

					renderTable.limpiarTabla({
						select: '#select-products',
						divRender: '#table-products',
					});
					
					limpiarFormularioYRedirigirA(
						contenedor_mensaje,
						'listRequirements'
					);
				},
			});

		} else {

			contenedor_mensaje.classList.add('contenedor__mensaje-activo');

        }
	});
});
