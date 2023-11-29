/** @format */
import { language } from './../../../../assets/js/global/esDatatable.js';
import {validarCampo, campos} from '../../../../assets/js/global/validarCampos.js';

let tableCategories = document.querySelector('#table-categories');

export const dataTable = new DataTable(tableCategories, {
    ajax: {
        url: '../models/listCategories.php',
        method: 'GET',
        dataType: 'JSON',
        dataSrc: '',
    },
    columns: [
        { data: 'id_category' },
        { data: 'nameCategory' },
        { data: 'description' },
        {
            defaultContent:
            '<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCategory"><i class="bi bi-pen-fill"></i></button> &nbsp;<button class="btn btn-sm btn-danger eliminar"> <i class="bi bi-trash"></i> </button>',
        },
    ],
    language: language,
});

    // Obtén la referencia al modal de edición
    let editCategoryModal = new bootstrap.Modal(document.getElementById('editCategory'));

    // Escucha el evento 'show.bs.modal'
    editCategoryModal._element.addEventListener('show.bs.modal', function (event) {
    // Accede al botón que desencadenó la apertura del modal
    let button = event.relatedTarget;

    // Accede a la fila correspondiente en la tabla DataTable
    let row = button.closest('tr');

    // Obtén los datos de la fila
    let id = dataTable.cell(row, 0).data();

    // Completa los campos del formulario con los datos de la categoría seleccionada
    $('#nameCategory').val(name);
    $('#description').val(description);

    $.ajax({
        url: '../models/getCategory.php',
        type: 'GET',
        data: { id },
        dataType: `JSON`,
        success: function (response) {

            // Aquí cargas los datos del cliente en los campos del formulario en el modal
            let category = response;
            /* const cargos = usuario['cargo'];
            const datos = usuario['usuario'][0]; */

            $('#idCategory').val(category.id);
            $('#nameCategory').val(category.name);
            $('#description').val(category.description);
            // Carga los demás campos del formulario según corresponda
            
            Object.keys(campos).forEach(campo => { campos[campo] = true; });
        }
    });
    /* console.log(id); */
});