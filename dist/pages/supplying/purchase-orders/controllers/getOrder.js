/** @format */

import { language } from '../../../../assets/js/global/esDatatable.js';
import { verifyTarget } from '../../../../assets/js/global/verifyTarget.js';
import { tableProducts } from './listOrders.js';

let tableOrders = $('#table-orders');

tableOrders.on('click', '.view', (e) => {

	let target = verifyTarget(e);
	let id = target.getAttribute('data-id');

	$.ajax({
		url: '../models/getOrder.php',
		type: 'GET',
		data: { id },
		dataType: `JSON`,
		success: function (response) {


            let order = response.order;
            let products = response.products;
            
            let dateParts = order.date_time.split(" ");
            let day = dateParts[0];
            let hour = dateParts[1];
            let state = order.state == 0 ? "<div class='badge alert-danger'>Inactivo</div>" : "<div class='badge alert-success'>Activo</div>";  
            
			$('#id').text(order.id);
            $('#date').text(day);
            $('#time').text(hour);
            $('#supplier').text(order.company_name);
            $('#ruc').text(order.ruc);
            $('#address').text(order.address);
            $('#id_requirement').text(order.id_requirement);
            $('#subtotal').text(order.subtotal);
            $('#datetime').text(order.date_time_r);
            $('#total').text(order.total);

            // limpiar los productos anteriores y dibujar los actuales
            tableProducts.clear().draw();
            products.forEach((product) => {
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
