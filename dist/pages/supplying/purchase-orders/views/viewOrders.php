<!-- Modal -->
<div class="modal fade text-left " id="viewOrder" tabindex="-1" role="dialog" aria-labelledby="viewOrder"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Detalle de la Orden de compra </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="viewRequirements">
                <div class="modal-body">
                    <div class="invoice">
                        <div class="invoice-print p-3">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>ID: </strong><br>
                                                <p id="id"></p>
                                                <strong>Fecha: </strong><br>
                                                <p id="date"></p>
                                                <strong>Hora: </strong><br>
                                                <p id="time"></p>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Proveedor: </strong><br>
                                                <p id="supplier">
                                                </p>
                                                <strong>RUC:</strong><br>
                                                <p id="ruc">
                                                </p>
                                                <strong>Dirección: </strong><br>
                                                <p id="address">
                                                </p>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>ID Requerimiento: </strong><br>
                                                <p id="id_requirement">
                                                </p>
                                                <strong>Subtotal:</strong><br>
                                                <p id="subtotal">
                                                </p>
                                                <strong>Fecha y Hora: </strong><br>
                                                <p id="datetime">
                                                </p>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <p class="section-lead">Todos los productos del Requerimiento de compra.</p>
                                    <div class="table-responsive">

                                        <table id="table-product" class="table table-striped table-hover table-md">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Producto</th>
                                                    <th>Categoria</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                        </table>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-8">
                                            <div class="section-title">Monto del Requerimiento de Compra: </div>
                                            <p class="section-lead"> <strong>Nota: </strong>El monto del requerimiento
                                                de compra incluye el IGV.</p>
                                        </div>
                                        <div class="col-lg-4 text-right">
                                            <hr class="mt-2 mb-2">
                                            <div class="invoice-detail-item">
                                                <div class="invoice-detail-name">Total</div>
                                                <div class="invoice-detail-value invoice-detail-value-lg">S/. <span
                                                        id="total"></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="close-modal btn btn-light-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i>
                        Imprimir
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
