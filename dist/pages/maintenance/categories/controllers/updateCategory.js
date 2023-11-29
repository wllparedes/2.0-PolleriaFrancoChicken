import { expresiones } from '../../../../assets/js/global/exprecionesRegulares.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';
import { dataTable } from './listCategories.js';
// ? ACTUALIZAR

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');
    const inputs = document.querySelectorAll('#editCategory input');

    // Start ValidaciÃ³n del formulario

    const validarFormulario = (e) => {

        switch (e.target.name) {
            case 'nameCategory':
                validarCampo(expresiones.nameCategory, 'nameCategory', e.target);
                break;
            case 'description':
                validarCampo(expresiones.description, 'description', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // End


    //? Cuando se de click al boton actualizar

    $('#editCategory').on('click', '.actualizar', function (e) {
        e.preventDefault();
        if ( campos.nameCategory && campos.description ) {
            // Ajax
            const newData = {
                id: $('#idCategory').val(),
                nameCategory: $('#nameCategory').val(),
                description: $('#description').val()
            };
            $.ajax({
                url: '../models/updateCategory.php',
                type: 'POST',
                data: newData,
                success: function (response) {
                    console.log(response);
                    let respuesta = response.trim();
                    if (respuesta === 'error') {
                        error();
                    } else {
                        $('#editCategory').modal('hide');
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