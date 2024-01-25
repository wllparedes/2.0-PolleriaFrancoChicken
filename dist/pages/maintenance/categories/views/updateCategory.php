<!-- Modal -->
<div class="modal fade text-left" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategory"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="form">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para editar categoria </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="editCategory">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-1">
                            <label>Nombre: </label>
                            <div class="form-group">
                                <input type="text" id="nameCategory" name="nameCategory"
                                    placeholder="Nombre de la categoria" class="form-control input-form">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-1">
                            <label>Descripción: </label>
                            <div class="form-group">
                                <input type="text" id="description" name="description"
                                    placeholder="Descripcion de la categoria" class="form-control input-form">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 contenedor__mensaje" id="contenedor__mensaje">
                            <div class="formulario__mensaje bg-danger shadow-danger">
                                <i class="bi bi-exclamation-triangle-fill"></i></span> <b class="p-1">Rellene el
                                    formulario
                                    correctamente.</b>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="close-modal btn btn-light-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" class="update btn btn-primary ml-1">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
