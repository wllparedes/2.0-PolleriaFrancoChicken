import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';
import { dataTable } from './listSuppliers.js';
// ? ACTUALIZAR

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');
    const inputs = document.querySelectorAll('#editSupplier input');

    // Start ValidaciÃ³n del formulario

    const validarFormulario = (e) => {

        switch (e.target.name) {
            case 'razon_social':
                validarCampo(expresiones.razon_social, 'razon_social', e.target);
                break;
            case 'direccion':
                validarCampo(expresiones.direccion, 'direccion', e.target);
                break;
            case 'ruc':
                validarCampo(expresiones.ruc, 'ruc', e.target);
                break;
            case 'phone':
                validarCampo(expresiones.phone, 'phone', e.target);
                break;
            case 'email':
                validarCampo(expresiones.email, 'email', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // End


    //? Cuando se de click al boton actualizar

    $('#editSupplier').on('click', '.actualizar', function (e) {
        e.preventDefault();
        if ( campos.razon_social  && campos.direccion && campos.ruc && campos.phone && campos.email ) {
            // Ajax
            const newData = {
                id: $('#id_supplier').val(),
                razon_social: $('#razon_social').val(),
                direccion: $('#direccion').val(),
                ruc: $('#ruc').val(),
                phone: $('#phone').val(),
                email: $('#email').val()
            };
            $.ajax({
                url: '../models/updateSupplier.php',
                type: 'POST',
                data: newData,
                success: function (response) {
                    console.log(response);
                    let respuesta = response.trim();
                    if (respuesta === 'error') {
                        error();
                    } else {
                        $('#editSupplier').modal('hide');
                        si_actualizado();
                        dataTable.ajax.reload();
                        /*fetchCategorias(); */
                        /* document.getElementById("search").value = ""; */
                        /* $('#categorias-result').hide(); */
                        // 
                        /* document.querySelectorAll('.formulariogrupo-correcto').forEach((i) => {
                            i.classList.remove('formulariogrupo-correcto')
                        }) */
                        /* contenedor_mensaje.classList.remove('contenedor__mensaje-activo'); */
                    }
                }
            });
        } /* else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        } */
    });