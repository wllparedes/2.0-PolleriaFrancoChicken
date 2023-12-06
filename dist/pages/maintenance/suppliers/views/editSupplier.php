<!-- Modal -->
<div class="modal fade text-left" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para editar proveedor </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <input type="hidden" id="id_supplier" name="id_supplier" value="">
                    <label>Razon social: </label>
                    <div class="form-group">
                        <input type="text" id="razon_social" name="razon_social" placeholder="Nombre de la razon social"
                            class="form-control">
                    </div>
                    <label>Dirección: </label>
                    <div class="form-group">
                        <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="form-control">
                    </div>
                    <label>Ruc: </label>
                    <div class="form-group">
                        <input type="text" id="ruc" name="ruc" placeholder="Ruc del proveedor" class="form-control">
                    </div>
                    <label>Teléfono: </label>
                    <div class="form-group">
                        <input type="text" id="phone" name="phone" placeholder="Telefono" class="form-control">
                    </div>
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="text" id="email" name="email" placeholder="Email de contacto" class="form-control">
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
                    <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" class="btn btn-primary ml-1 actualizar">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
