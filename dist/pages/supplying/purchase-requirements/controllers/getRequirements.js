/** @format */

import { language } from './../../../../assets/js/global/esDatatable.js';

import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { ValidarFormulario } from '../../../../assets/vendors/@wallace-validate/validarFormulario.js';
import { limpiarModal } from '../../../../assets/js/global/limpiarModal.js';
import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';


// ? seleccionamos la tabla
let tableRequirements = $('#table-requirements');
// ? cuando se de click dentro de table-users en algun elemento de clase .edit
tableRequirements.on('click', '.view', (e) => {
	let target = verifyTarget(e);
	let id = target.getAttribute('data-id');
    console.log(e)

	$.ajax({
		url: '../models/getRequirements.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {

            let productos = response['productos'];
            let requerimientos = response['requerimientos'][0];
            
            console.log(productos)
            console.log(requerimientos)

            let dateParts = requerimientos['date_time'].split(" ");
            let day = dateParts[0];
            let hour = dateParts[1];
            let state = requerimientos['state'] == 0 ? "<div class='badge alert-danger'>Inactivo</div>" : "<div class='badge alert-success'>Activo</div>";  
            
			$('#id_requirement').text(requerimientos.id);
            $('#id_user').text(requerimientos.id_user);
            $('#date').text(day);
            $('#time').text(hour);
            $('#name_user').text(requerimientos.name);
			$('#description').text(requerimientos.description);
            $('#state').html(state);
            $('#subtotal').text(requerimientos.subtotal);

            
            let tableProducts = $('#table-product').DataTable();
            tableProducts.clear().draw();
            productos.forEach((product) => {
                tableProducts.row.add([
                    product.pr_id,
                    product.name,
                    product.category_name,
                    product.price,
                    product.quantity
                ]).draw(false);
            });


		},
	});

});
