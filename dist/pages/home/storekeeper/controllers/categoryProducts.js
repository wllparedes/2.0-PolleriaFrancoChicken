/** @format */

import { error } from '../../../../assets/js/pages/modules-sweetalert.js';

let chartVisitorsProfile;

$(document).ready(() => {
	$.ajax({
		url: './../models/categoryProducts.php',
		type: 'GET',
		dataType: 'JSON',
		success: function (response) {
			let products = response;

			let names = products.map((product) => product.name);
			let qty = products.map((product) => product.quantity);

			let optionsProductsForCategory = {
				series: qty,
				labels: names,
				colors: ['#5ddab4', '#55c6e8', '#ff7976', '#9694ff'],
				chart: {
					type: 'donut',
					width: '100%',
					height: '350px',
				},
				legend: {
					position: 'bottom',
				},
				plotOptions: {
					pie: {
						donut: {
							size: '30%',
						},
					},
				},
			};
			chartVisitorsProfile = new ApexCharts(
				document.getElementById('chart-products-for-category'),
				optionsProductsForCategory
			);
		},
		complete: function (data) {
			chartVisitorsProfile.render();
		},
		error: function (data) {
			error();
		},
	});
});
