<!-- Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para editar Producto </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class='modal-body'>
                <form>
                    <div class="row">
                        <div class="col-lg-12 mb-1">
                            <label for="name">Producto</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="name" name="name" class="form-control input-form"
                                    placeholder="escribe el nombre del producto">
                                <div class="form-control-icon">
                                    <i class="bi bi-box-seam "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-1">
                            <label for="price">Precio</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="price" name="price" class="form-control input-form" placeholder="S/.">
                                <div class="form-control-icon">
                                    <i class="bi bi-cash "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-1">
                            <label for="category">Categoria</label>
                            <div class="form-group position-relative" id="parent-category">

                                <div class="category form-control" id="select-category">

                                </div>
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

                    <!--? Container btns -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" class="update btn btn-primary ml-1 actualizar">
                            Actualizar
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
