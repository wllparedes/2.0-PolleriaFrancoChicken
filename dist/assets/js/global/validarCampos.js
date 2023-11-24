/** @format */

export const campos = {
	// * Cliente
	razon_social: false,
	direccion: false,
	email: false,
	ruc: false,
	phone: false,
	// * Categoria
	nombre: false,
	descripcion: false,
	// * Consumible
	precio: false,
	consumible: false,

	// * Pedido
	observacion: false,

	// * Producto
	producto: false,

	// * User
	name: false,
	surnames: false,
	dni: false,
	userName: false,
	password: false,

	// ? Faltan más campos
};

export const validarCampo = (expresion, campo, input) => {
	// Seleccionar elementos DOM ( / )
	let input_v = document.getElementById(input.id);

	if (_.isEmpty(input.value.trim())) {
		// form_grupo.classList.remove('formulario__grupo-incorrecto');
		// span.classList.remove('fa-exclamation-circle');
		// error.classList.remove('formulario__input-error-activo');
		// form_grupo.classList.remove('formulario__grupo-correcto');
		// span.classList.remove('fa-check-circle');

        input_v.classList.remove('is-invalid');
        input_v.classList.remove('is-valid');
        campos[campo] = false;

	} else {
		if (expresion.test(input.value)) {
            input_v.classList.remove('is-invalid');
            input_v.classList.add('is-valid');

			campos[campo] = true;
		} else {
			
            input_v.classList.remove('is-valid');
            input_v.classList.add('is-invalid');

			campos[campo] = false;
		}
	}
};
