/** @format */

import { error } from '../../../../assets/js/pages/modules-sweetalert.js';

let chartOrdersForMonth;

const MONTH_ES = {
	January: 'Enero',
	February: 'Febrero',
	March: 'Marzo',
	April: 'Abril',
	May: 'Mayo',
	June: 'Junio',
	July: 'Julio',
	August: 'Agosto',
	September: 'Septiembre',
	October: 'Octubre',
	November: 'Noviembre',
	December: 'Diciembre',
};

$(document).ready(() => {
	$.ajax({
		url: './../models/qtyPurchaseOrders.php',
		type: 'GET',
		dataType: 'JSON',
		success: function (response) {
			let months = response;

			let nameMonths = months.map((month) => MONTH_ES[month.month]);
			let quantity = months.map((month) => month.quantity);

			let optionsOrdersForMonth = {
				annotations: {
					position: 'back',
				},
				dataLabels: {
					enabled: false,
				},
				chart: {
					type: 'bar',
					height: 300,
				},
				fill: {
					opacity: 1,
				},
				plotOptions: {},
				series: [
					{
						name: 'ordenes',
						data: quantity,
					},
				],
				colors: ['#969fff'],
				xaxis: {
					categories: nameMonths,
				},
				yaxis: {
					labels: {
						formatter: function (value) {
							return Math.floor(value);
						},
					},
				},
			};

			chartOrdersForMonth = new ApexCharts(
				document.querySelector('#chart-orders-for-month'),
				optionsOrdersForMonth
			);
		},
		complete: function (data) {
			chartOrdersForMonth.render();
		},
		error: function (data) {
			error();
		},
	});
});
