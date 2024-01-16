<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear requerimiento - Almacenero</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>
    <link rel="stylesheet" href="./../../../../assets/vendors/virtual-select/virtual-select.min.css">

</head>

<body>
    <div id="app">

        <!-- start sidebar -->

        <?php include('./../../../../includes/_sidebar.php'); ?>

        <!-- end sidebar -->

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
                            <h3> Formulario: Requerimiento de compra </h3>
                            <p class="text-subtitle text-muted">Por favor rellene todos los campos requeridos para poder
                                crear un nuevo requerimiento de compra
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

                <section id="basic-input-groups">
                    <div class="row">
                        <div class="col-12">
                            <div class="card" id="form">
                                <div class="card-header" id="cardHeader">
                                    <h4 class="card-title">Nuevo requerimiento de compra</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="forms-sample form-requerimiento" id="formulario">
                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <label for="name">Seleccionar productos a elegir</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#selectProducts"
                                                            class="btn icon icon-left btn-info">
                                                            <i class="fas fa-seedling"></i>
                                                            Seleccionar productos
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="dataTable">
                                                <div class="col-12 table-responsive" id="table-products">

                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <label for="dni">Observación</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <textarea rows="4" type="text" id="observation"
                                                            name="observation" class="form-control input-form"
                                                            placeholder="Los kilos de papa divididas en 3 sacos..."></textarea>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-hash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- = Message Error -->

                                            <div class="row">
                                                <div class="form-group col-md-12 contenedor__mensaje"
                                                    id="contenedor__mensaje">
                                                    <div class="formulario__mensaje bg-danger shadow-danger">
                                                        <i class="bi bi-exclamation-triangle-fill"></i></span> <b
                                                            class="p-1">Rellene el formulario
                                                            correctamente.</b>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--? Container btns -->
                                            <div class="row justify-content-center">
                                                <div class="form-group col-lg-4 col-md-8 d-flex justify-content-around">
                                                    <button id="registrar" type="submit" name="registrar"
                                                        class="btn btn-sm btn-success ">
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
                <!-- Basic Inputs Groups end -->

            </div>

            <?php include('selectProducts.php') ?>

            <!-- start footer -->
            <?php include('./../../../../includes/_footer.php') ?>
            <!-- end footer -->

        </div>
    </div>


    <?php include('./../../../../includes/_scripts_for_page.php') ?>

    <!-- * plugins -->
    <script src="./../../../../assets/vendors/virtual-select/virtual-select.min.js"></script>
    <!-- * parte de la pagina -->
    <script src="./../tasks/loadProducts.js" ></script>
    <script src="./../controllers/newRequirement.js" type="module" ></script>

</body>

</html>
