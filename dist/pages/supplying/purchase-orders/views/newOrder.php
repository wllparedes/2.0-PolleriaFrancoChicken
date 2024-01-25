<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear orden - Almacenero</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>
    <!-- <link rel="stylesheet" href="./../../../../assets/vendors/@fortawesome/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="./../../../../assets/vendors/virtual-select/virtual-select.min.css">
    <link rel="stylesheet" href="./../../../../assets/vendors/daterangepicker/daterangepicker.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php include('./../../../../includes/_sidebar.php'); ?>


            <!-- Main Content -->
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                <div class="page-heading" id="heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3> Formulario: orden de compra </h3>
                                <p class="text-subtitle text-muted">Por favor Rellene la información requerida para
                                    poder crear una
                                    nueva orden de compra.
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
                            <div class="card" id="form">
                                <div class="card-header" id="cardHeader">
                                    <h4>Formulario:</h4>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample form-orden-compra" id="formulario">

                                        <div class="row">
                                            <div class="col-lg-6 mb-1">
                                                <label for="dni">Fecha y Hora estimada de entrega</label>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control datetimepicker"
                                                        id="fecha_hora" name="fecha_hora">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="bg-secondary">

                                        <div class="row">
                                            <!-- Grupo: Btn Seleccionar proveedor -->
                                            <div class="form-group col-md-6 formulario__grupo" id="grupo__proveedor">
                                                <label for="proveedor" class="formulario__label">Seleccionar proveedor
                                                    requerido</label>
                                                <div class="formulario__grupo-input input-group">

                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#selectSupplier">
                                                        <i class="fas fa-user"></i>
                                                        &nbsp;Seleccionar Proveedor
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="dataTable">
                                            <div class="col-12 table-responsive" id="table-supplier">

                                            </div>
                                        </div>


                                        <hr class="bg-secondary">

                                        <div class="row">
                                            <!-- Grupo: Btn Seleccionar requerimiento de compra -->
                                            <div class="form-group col-md-6 formulario__grupo"
                                                id="grupo__requerimiento">
                                                <label for="requerimiento" class="formulario__label">Seleccionar
                                                    requerimiento de compra
                                                    requerido</label>
                                                <div class="formulario__grupo-input input-group">

                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#selectRequirement">
                                                        <i class="fas fa-shopping-bag"></i>
                                                        &nbsp;Seleccionar Requerimiento de compra
                                                    </button>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="row" id="dataTable">
                                            <div class="col-12 table-responsive" id="table-requirement">

                                            </div>
                                        </div>


                                        <!-- = Message Error -->

                                        <div class="row">
                                            <div class="form-group col-md-12 contenedor__mensaje"
                                                id="contenedor__mensaje">
                                                <div class="formulario__mensaje bg-danger shadow-danger">
                                                    <span class="fas fa-exclamation-triangle"></span> <b
                                                        class="p-1">Rellene el formulario
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

            <?php include('./selectSupplier.php') ?>
            <?php include('./selectRequirement.php') ?>

            <!-- start footer -->
            <?php include('./../../../../includes/_footer.php') ?>
            <!-- end footer -->

        </div>
    </div>


    <?php include('./../../../../includes/_scripts_for_page.php') ?>

    <!-- * plugins -->
    <script src="./../../../../assets/vendors/virtual-select/virtual-select.min.js"></script>
    <script src="./../../../../assets/vendors/moment/moment.min.js"></script>
    <script src="./../../../../assets/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./../../../../assets/js/global/runDatepicker.js"></script>
    <!-- * parte de la pagina -->
    <script src="./../tasks/loadSuppliers.js"></script>
    <script src="./../tasks/loadRequirements.js"></script>
    <script src="./../controllers/newOrder.js" type="module"></script>

</body>

</html>
