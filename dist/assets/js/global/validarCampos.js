/**
 * 
 * @param {*} expresion - Expreción regular para validar el campo.
 * @param {HTMLElement} input - Elemento input del formulario a validar con la expreción regular.
 * @returns {Boolean} - Retorna true si el campo es válido y false si no lo es.
 */
export const validarCampo = (expresion, input) => {
	// Seleccionar elementos DOM ( / )
	let input_v = document.getElementById(input.id);

	if (_.isEmpty(input.value.trim())) {

        input_v.classList.remove('is-invalid');
        input_v.classList.remove('is-valid');
        return false;

	} else {
		if (expresion.test(input.value)) {
            input_v.classList.remove('is-invalid');
            input_v.classList.add('is-valid');

			return true;
		} else {
			
            input_v.classList.remove('is-valid');
            input_v.classList.add('is-invalid');

			return false;
		}
	}
};
