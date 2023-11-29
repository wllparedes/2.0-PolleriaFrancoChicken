<!-- Modal -->
<div class="modal fade text-left" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para editar categoria </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <input type="hidden" id="idCategory" name="idCategory" value="">
                    <label>Nombre: </label>
                    <div class="form-group">
                        <input type="text" id="nameCategory" name="nameCategory" placeholder="Nombre de la categoria" class="form-control">
                    </div>
                    <label>Descripción: </label>
                    <div class="form-group">
                        <input type="text" id="description" name="description" placeholder="Descripcion de la categoria" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cerrar</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1 actualizar" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Actualizar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>