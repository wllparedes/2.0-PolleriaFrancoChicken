/** @format */

/**
 * @param {HTMLElement} contenedor_mensaje - Contenedor del mensaje de error (es necesario limpiar ese mensaje).
 * @param {string} url - Nombre de la vista a redirigir (sin el php). ejem: listUsers
 * @returns {void} - Redirecciona a la vista indicada
 */

export const limpiarFormularioYRedirigirA = (contenedor_mensaje, url = false) => {
	document.querySelectorAll('#formulario input').forEach((i) => {
		i.classList.remove('is-valid', 'is-invalid');
	});
	$('#formulario').trigger('reset');
	contenedor_mensaje.classList.add('contenedor__mensaje');
	contenedor_mensaje.classList.remove('contenedor__mensaje-activo');

	if(!url){
		return ;
	}
	redireccionar(url);
};
