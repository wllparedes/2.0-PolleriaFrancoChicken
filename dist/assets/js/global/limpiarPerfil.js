export const limpiarProfile = (contenedor_mensaje) => {
    document.querySelectorAll('#formulario input').forEach((i) => {
        i.classList.remove('is-valid', 'is-invalid');
    });
    // $('#formulario').trigger('reset');
     contenedor_mensaje.classList.add('contenedor__mensaje');
    contenedor_mensaje.classList.remove('contenedor__mensaje-activo')
};