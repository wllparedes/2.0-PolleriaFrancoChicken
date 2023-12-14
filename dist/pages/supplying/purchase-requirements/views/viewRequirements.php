<!-- Modal -->
<div class="modal fade text-left " id="viewRequirements" tabindex="-1" role="dialog" aria-labelledby="viewRequirements"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para ver el Requerimiento </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="viewRequirements">
                <div class="modal-body">
                    <div class="invoice">
                        <div class="invoice-print">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title d-flex justify-content-between">
                                        <strong>
                                            Requerimiento de Compra
                                        </strong>
                                        <div class="badge badge-light">
                                            <strong>
                                            Requerimiento de Compra #
                                            </strong>
                                            <span id="id_requirement"></span>
                                            
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>ID Encargado: </strong><br>
                                                <p id="id_user">
                                                </p>
                                                <strong>Fecha: </strong><br>
                                                <p id="date">
                                                </p>
                                                <strong>Hora: </strong><br>
                                                <p id="time">
                                                <div class="badge badge-info">
                                                </div>
                                                </p>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Encargado: </strong><br>
                                                <p id="name_user">
                                                </p>
                                                <strong>Descripcion:</strong><br>
                                                <p id="description">
                                                </p>
                                                <strong>Estado: </strong><br>
                                                <p id="state">
                                                </p>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="section-title">Detalle del Requerimiento de Compra</div>
                                    <p class="section-lead">Todos los productos del Requerimiento de compra.</p>
                                    <div class="table-responsive">

                                        <!-- ? Tabla a elegir  -->
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
                                            <tbody id="body-product">
                                            
                                            </tbody>

                                        </table>

                                    <!-- ? Fin de la tabla a elegir -->

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-8">
                                            <div class="section-title">Monto del Requerimiento de Compra: </div>
                                            <p class="section-lead"> <strong>Nota: </strong>El monto del requerimiento de compra no incluye el IGV.</p>
                                        </div>
                                        <div class="col-lg-4 text-right">
                                            <hr class="mt-2 mb-2">
                                            <div class="invoice-detail-item">
                                                <div class="invoice-detail-name">Sub Total</div>
                                                <div class="invoice-detail-value invoice-detail-value-lg">S/. <span id="subtotal"></span> </div>
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