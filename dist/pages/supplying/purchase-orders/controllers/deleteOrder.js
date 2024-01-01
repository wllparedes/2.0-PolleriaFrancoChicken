/** @format */

import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { dataTable } from './listOrders.js';
import  {no_eliminado, si_eliminado, alerta_confirmacion, error}  from '../../../../assets/js/pages/modules-sweetalert.js';

let tableOrders = $('#table-orders');

tableOrders.on('click', '.delete', (e) => {
	alerta_confirmacion().then((resultado) => {
		if (resultado) {
			let target = verifyTarget(e);
			let id = target.getAttribute('data-id');

			$.ajax({
				url: '../models/deleteOrder.php',
				type: 'POST',
				data: { id },
				dataType: 'JSON',
                success: function (response) {

					if (response.status === 'notDelete') {
						no_eliminado();
						return;
					}

					if (!response.status) {
						error();
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
