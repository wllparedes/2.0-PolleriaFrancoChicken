import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';
import { dataTable } from './listUsers.js';

// ? ACTUALIZAR

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

let contenedor_mensaje = document.getElementById('contenedor__mensaje');
const inputs = document.querySelectorAll('#editUser input');

const validarFormulario = (e) => {
    
    switch (e.target.name) {
        case 'name':
            validarCampo(expresiones.name, 'name', e.target);
            break;
        case 'surnames':
            validarCampo(expresiones.surnames, 'surnames', e.target);
            break;
        case 'phone':
            validarCampo(expresiones.phone, 'phone', e.target);
            break;
        case 'dni':
            validarCampo(expresiones.dni, 'dni', e.target);
            break;
        case 'userName':
            validarCampo(expresiones.userName, 'userName', e.target);
            break;
        case 'email':
            validarCampo(expresiones.email, 'email', e.target);
            break;
        case 'password':
            validarCampo(expresiones.password, 'password', e.target);
            break;
    }
};

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});





$('#editUser').on('click', '.actualizar', function (e) {
    e.preventDefault();
    // Almacena los elementos seleccionados una vez
    let select_cargo = $('#charges');

    if (campos.name && campos.surnames && campos.phone && campos.dni && campos.userName && campos.email && campos.password && select_cargo.val()) {
        // Datos para la actualización
        const newData = {
            id: $('#id_usuario').val(),
            name: $('#name').val(),
            surnames: $('#surnames').val(),
            phone: $('#phone').val(),
            dni: $('#dni').val(),
            userName: $('#userName').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            id_charge: select_cargo.val(),
        };

        // Envía la solicitud de actualización
        $.ajax({
            url: '../models/updateUser.php',
            type: 'POST',
            data: newData,
            success: function (response) {
                console.log(response);
                let respuesta = response.trim();
                if (respuesta === 'error') {
                    error();
                } else {
                    $('#editUser').modal('hide');
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
