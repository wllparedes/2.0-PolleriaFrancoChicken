/** @format */

// ? Eliminar

import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { dataTable } from './listUsers.js';
import  {no_eliminado, si_eliminado, alerta_confirmacion}  from '../../../../assets/js/pages/modules-sweetalert.js';

let tableUsers = $('#table-users');

tableUsers.on('click', '.delete', (e) => {
	alerta_confirmacion().then((resultado) => {
		if (resultado) {
			let target = verifyTarget(e);
			let id = target.getAttribute('data-id');

			$.ajax({
				url: '../models/deleteUser.php',
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
