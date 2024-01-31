/** @format */

// Daterangepicker
if (jQuery().daterangepicker) {
	if ($('.datepicker').length) {
		$('.datepicker').daterangepicker({
			locale: { format: 'YYYY-MM-DD', "applyLabel": "Aplicar", "cancelLabel": "Cancelar", "daysOfWeek": ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"], "monthNames": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"] },
			singleDatePicker: true,
		});
	}
	if ($('.datetimepicker').length) {
		$('.datetimepicker').daterangepicker({
			locale: { format: 'YYYY-MM-DD hh:mm', "applyLabel": "Aplicar", "cancelLabel": "Cancelar", "daysOfWeek": ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"], "monthNames": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"] },
			singleDatePicker: true,
			timePicker: true,
			timePicker24Hour: true,
		});
	}
	if ($('.daterange').length) {
		$('.daterange').daterangepicker({
			locale: { format: 'YYYY-MM-DD', "applyLabel": "Aplicar", "cancelLabel": "Cancelar", "daysOfWeek": ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"], "monthNames": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"] },
			drops: 'down',
			opens: 'right',
		});
	}
}
// Timepicker
if (jQuery().timepicker && $('.timepicker').length) {
	$('.timepicker').timepicker({
		icons: {
			up: 'fas fa-chevron-up',
			down: 'fas fa-chevron-down',
		},
	});
}
