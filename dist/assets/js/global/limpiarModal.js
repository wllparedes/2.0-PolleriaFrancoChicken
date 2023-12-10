
/**
 * 
 * @param {String} idModal - Id del modal que se va a limpiar
 * @param {HTMLElement} contenedor_mensaje - Contenedor del mensaje de error
 */
export const limpiarModal = (idModal, contenedor_mensaje) => {

	document.querySelectorAll(`${idModal} input`).forEach((i) => {
		i.classList.remove('is-valid', 'is-invalid');
	});

	contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
	contenedor_mensaje.classList.add('contenedor__mensaje');

};
