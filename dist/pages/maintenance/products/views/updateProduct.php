<!-- Modal -->
<div class="modal fade text-left" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para editar Producto </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class='modal-body'>
            <form>
            <input type="hidden" id="id_producto" name="id_producto" value="">
                <div class="row">
                    <div class="col-lg-4 mb-1">
                        <label for="name">Producto</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="escribe el nombre del producto">
                            <div class="form-control-icon">
                                <i class="bi bi-box-seam "></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-1">
                        <label for="price">Precio</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="price" name="price"
                                class="form-control" placeholder="S/.">
                            <div class="form-control-icon">
                                <i class="bi bi-cash "></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mb-1">
                        <label for="category">Categoria</label>
                        <div class="form-group position-relative">
                            <select class="categories form-control" id="category">
                            </select>
                        </div>
                    </div>
                </div>
                <!--? Container btns -->
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
</div>
