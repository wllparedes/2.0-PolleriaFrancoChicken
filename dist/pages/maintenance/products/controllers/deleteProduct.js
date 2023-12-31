/** @format */

import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { dataTable } from './listProducts.js';
import  { alerta_confirmacion ,no_eliminado, si_eliminado}  from '../../../../assets/js/pages/modules-sweetalert.js';


// ? Eliminar
$(document).on('click', '.delete', (e) => {
	alerta_confirmacion().then((resultado) => {
		if (resultado) {
			let target = verifyTarget(e);
			let id = target.getAttribute('data-id');

			$.ajax({
				url: '../models/deleteProduct.php',
				type: 'POST',
				data: { id },
				dataType: 'JSON',
				success: function (response) {
					if (!response.status) {
						no_eliminado();
						return;
					}

					si_eliminado();
					dataTable.ajax.reload();
				},
				error: function (error) {
					console.error('Error al eliminar:', error);
				},
			});
		}
	});
});
