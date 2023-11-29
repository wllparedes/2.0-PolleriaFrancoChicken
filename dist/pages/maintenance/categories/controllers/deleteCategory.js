import { dataTable } from "./listCategories.js";

// ? Eliminar
$(document).on('click', '.eliminar', function () {
    console.log("hola")
    alerta_confirmacion().then((resultado) => {
        if (resultado) {
            // Accede a la fila correspondiente en la tabla DataTable
            let row = $(this).closest('tr');
            
            // Obtén el ID de la categoría de la fila
            let id = dataTable.cell(row, 0).data();

            // Realiza la eliminación utilizando DataTables
            dataTable.row(row).remove().draw();

            // Realiza la solicitud AJAX para eliminar la categoría en el servidor
            $.ajax({
                url: '../models/deleteCategory.php',
                type: 'POST',
                data: { id },
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta !== 'correcto') {
                        no_eliminado();
                    } else {
                        si_eliminado();
                        dataTable.ajax.reload();
                    }
                },
                error: function (error) {
                    console.error('Error al eliminar:', error);
                    // Manejar errores según sea necesario
                }
            });
        }
    });
});
