/** @format */

import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { dataTable } from './listSuppliers.js';

// ? Eliminar
$(document).on('click', '.delete', function (e) {
	alerta_confirmacion().then((resultado) => {
		let target = verifyTarget(e);
		let id = target.getAttribute('data-id');

		if (resultado) {
			$.ajax({
				url: '../models/deleteSupplier.php',
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
