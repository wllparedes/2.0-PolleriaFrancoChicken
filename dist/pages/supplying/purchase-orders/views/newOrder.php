<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear orden - Almacenero</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>
    <link rel="stylesheet" href="./../../../../assets/vendors/virtual-select/virtual-select.min.css">

</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include('./../../../../includes/_sidebar.php'); ?>

      <!--?php include("./../../../../includes/almacenero/_sidebar.php"); ?-->


      <!-- Main Content -->
      <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3> Formulario: orden de compra </h3>
                            <p class="text-subtitle text-muted">Por favor Rellene la información requerida para poder crear una nueva orden de compra.
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Input Group</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

            <!-- ! FILA  -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Formulario:</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample form-orden-compra" id="formulario">

                      <div class="row">
                        <!-- Grupo: Razon Social -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__fecha_hora">
                          <label>Fecha y Hora estimada de entrega</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control datetimepicker" id="fecha_hora" name="fecha_hora">
                          </div>
                        </div>
                      </div>

                      <hr class="bg-secondary">

                      <div class="row">
                        <!-- Grupo: Btn Seleccionar proveedor -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__proveedor">
                          <label for="proveedor" class="formulario__label">Seleccionar proveedor requerido</label>
                          <div class="formulario__grupo-input input-group">

                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                              data-bs-target="#seleccionarProveedor">
                              <i class="fas fa-user"></i>
                              &nbsp;Seleccionar Proveedor
                            </button>

                          </div>
                        </div>
                      </div>

                      <h6 class="text-center col-12 p-4 text-muted advProveedor">
                        <strong>Seleccionar un proveedor</strong>
                      </h6>

                      <!-- Tabla donde deben de estar el proveedor seleccionado -->
                      <div class="row table__seleccionados" id="table">
                        <div class="col-12">
                          <div class="section-title">Información del Proveedor</div>
                          <p class="section-lead">Toda la información precisa del proveedor seleccionado.</p>

                          <div class="card">
                            <div class="card-body p-0 clienteBox">
                              <div class="table-responsive">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Razon Social</th>
                                      <th>Direccion</th>
                                      <th>Correo</th>
                                      <th>RUC</th>
                                      <th>Número</th>
                                    </tr>
                                  </thead>
                                  <tbody id="contenido">

                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>


                      <hr class="bg-secondary">

                      <div class="row">
                        <!-- Grupo: Btn Seleccionar requerimiento de compra -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__requerimiento">
                          <label for="requerimiento" class="formulario__label">Seleccionar requerimiento de compra
                            requerido</label>
                          <div class="formulario__grupo-input input-group">

                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                              data-bs-target="#seleccionarRequerimiento">
                              <i class="fas fa-shopping-bag"></i>
                              &nbsp;Seleccionar Requerimiento de compra
                            </button>

                          </div>
                        </div>
                      </div>

                      <h6 class="text-center col-12 p-4 text-muted advRequerimiento">
                        <strong>Seleccionar un requerimiento de compra</strong>
                      </h6>

                      <!-- Tabla donde deben de estar el requerimiento seleccionado -->
                      <div class="contenedor table__seleccionados_dos" id="table_requerimiento">
                        <div class="section-title">Información precisa del Requerimiento de compra</div>
                        <p class="section-lead">Toda la información precisa del Requerimiento de compra.</p>

                        <!-- 1ra fila -->
                        <div class="row">
                          <!-- Grupo: ID_REQUERIMIENTO  -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__requerimiento">
                            <label for="id_requerimiento" class="formulario__label">ID Requerimiento</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-fingerprint"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="id_req" name="id_req">
                            </div>
                          </div>

                          <!-- Grupo: id_cusuario -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__usuario">
                            <label for="usuario" class="formulario__label">ID Usuario</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-user"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="usuario" name="usuario">
                            </div>
                          </div>

                          <!-- Grupo: nombre  -->
                          <div class="form-group col-md-6 formulario__grupo" id="grupo__registrador">
                            <label for="registrador" class="formulario__label">Nombres y Apellidos del
                              registrador</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-signature"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="registrador" name="registrador">
                            </div>
                          </div>
                        </div>

                        <!-- * segunda fila -->
                        <div class="row">
                          <!-- Grupo: estado -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__estado">
                            <label for="estado" class="formulario__label">Estado</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-toggle-on"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="estado" name="estado">
                            </div>
                          </div>

                          <!-- Grupo: fecha -->
                          <div class="form-group col-md-5 formulario__grupo" id="grupo__fecha">
                            <label for="fecha" class="formulario__label">Fecha de registro</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-calendar"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="fecha" name="fecha">
                            </div>
                          </div>

                          <!-- Grupo: hora -->
                          <div class="form-group col-md-4 formulario__grupo" id="grupo__hora">
                            <label for="hora" class="formulario__label">Hora de Registro</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-clock"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="hora" name="hora">
                            </div>
                          </div>
                        </div>


                        <!-- * tercera fila -->
                        <div class="row">

                          <!-- Grupo: observacion  -->
                          <div class="form-group col-md-8 formulario__grupo" id="grupo__observacion">
                            <label for="observacion" class="formulario__label">Observacion</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-eye"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="observacion" name="observacion">
                            </div>
                          </div>
                        </div>


                        <!-- Lista de productos -->

                        <div class="row mt-4">
                          <div class="col-md-12">
                            <div class="section-title">Detalle del Requerimiento de compra</div>
                            <p class="section-lead">Todos los consumibles del Requerimiento de compra.</p>
                            <div class="table-responsive">

                              <!-- ? Tabla a elegir  -->
                              <table id="tabla" class="table table-striped table-hover table-md">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Descripción</th>
                                  </tr>
                                </thead>
                                <tbody id="contenido_requerimiento">

                                </tbody>
                              </table>

                              <!-- ? Fin de la tabla a elegir -->

                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-8">
                                <div class="section-title">Monto del Requerimiento de compra: </div>
                                <p class="section-lead"> <strong>Nota: </strong>Al momento de intentar de registrar el
                                  requerimiento de compra, se adicionará el IGV.
                                </p>
                              </div>
                              <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Subtotal</div>
                                  <h5>
                                    <div class="invoice-detail-value" id="sub_total"></div>
                                  </h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      <!-- = Message Error -->

                      <div class="row">
                        <div class="form-group col-md-12 contenedor__mensaje" id="contenedor__mensaje">
                          <div class="formulario__mensaje bg-danger shadow-danger">
                            <span class="fas fa-exclamation-triangle"></span> <b class="p-1">Rellene el formulario
                              correctamente.</b>
                          </div>
                        </div>
                      </div>

                      <!--? Container btns -->
                      <div class="row justify-content-center">
                        <div class="form-group col-lg-4 col-md-8 d-flex justify-content-around">
                          <button id="registrar" type="submit" name="registrar"
                            class="btn btn-lg btn-success bg-success">
                            <i class="fas fa-check-double"></i>
                            &nbsp;<b>Registrar</b>
                          </button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

            <!--?php include('selectProducts.php') ?-->

            <!-- start footer -->
            <?php include('./../../../../includes/_footer.php') ?>
            <!-- end footer -->

        </div>
    </div>


    <?php include('./../../../../includes/_scripts_for_page.php') ?>

    <!-- * plugins -->
    <script src="./../../../../assets/vendors/virtual-select/virtual-select.min.js"></script>
    <!-- * parte de la pagina -->
    <!--script src="./../tasks/loadProducts.js" ></script-->
    <!--script src="./../tasks/loadProducts.js" ></script-->
    <script src="./../controllers/newOrder.js" type="module" ></script>

</body>

</html>


