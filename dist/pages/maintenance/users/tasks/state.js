/** @format */

$(document).ready(() => {
	VirtualSelect.init({
		ele: '#select-state',
		placeholder: 'Seleccione un estado',
		required: true,
		options: [
			{ label: 'Activo', value: '1' },
			{ label: 'Inactivo', value: '0' },
		],
	});
});
