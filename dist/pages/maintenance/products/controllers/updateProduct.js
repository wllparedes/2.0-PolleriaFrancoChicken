import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';
import { dataTable } from './listProducts.js';

// ? ACTUALIZAR

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

let contenedor_mensaje = document.getElementById('contenedor__mensaje');
const inputs = document.querySelectorAll('#editProduct input');

const validarFormulario = (e) => {
    switch (e.target.name) {
        case 'name':
            validarCampo(expresiones.producto, 'name', e.target);
            break;
        case 'price':
            validarCampo(expresiones.precio, 'price', e.target);
            break;
    }
};

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});





$('#editProduct').on('click', '.actualizar', function (e) {
    e.preventDefault();
    // Almacena los elementos seleccionados una vez
    let select_categoria = $('#category');

    if (campos.name && campos.price && select_categoria.val()) {
        // Datos para la actualización
        const newData = {
            id: $('#id_producto').val(),
            name: $('#name').val(),
            price: $('#price').val(),
            id_category: select_categoria.val(),
        };

        // Envía la solicitud de actualización
        $.ajax({
            url: '../models/updateProduct.php',
            type: 'POST',
            data: newData,
            success: function (response) {
                console.log(response);
                let respuesta = response.trim();
                if (respuesta === 'error') {
                    error();
                } else {
                    $('#editProduct').modal('hide');
                    si_actualizado();
                    dataTable.ajax.reload();
                }
            }
        });
    } else {
        // Mostrar mensaje de validación
        //contenedor_mensaje.classList.add('contenedormensaje-activo');
    }
});
