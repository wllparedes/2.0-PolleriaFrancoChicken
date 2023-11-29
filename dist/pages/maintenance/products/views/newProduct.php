<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Producto</title>
    <link rel="stylesheet" href="./../../../../assets/vendors/choices.js/choices.min.css" />
    <?php include('./../../../../includes/_head.php'); ?>
    <link rel="stylesheet" href="./../../../../assets/vendors/sweetalert2/sweetalert2.min.css">
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

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3> Registrar Producto: </h3>
                            <p class="text-subtitle text-muted">Completar todos los campos
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
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Nuevo Producto</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="forms-sample form-usuario" id="formulario">
                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <label for="name">Producto</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            placeholder="escribe el nombre del producto">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-box-seam "></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <label for="price">Precio</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="price" name="price"
                                                            class="form-control" placeholder="S/.">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-cash "></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 mb-1">
                                                    <label for="category">Categoria</label>
                                                    <div class="form-group position-relative">
                                                        <select class="categories form-control" id="category" name="category">
                                                        </select>
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

            <!-- start footer -->
            <?php include('./../../../../includes/_footer.php') ?>
            <!-- end footer -->

        </div>
    </div>
    <script src="./../../../../assets/vendors/jquery/jquery.min.js"></script>
    <script src="./../../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="./../../../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="./../../../../assets/vendors/choices.js/choices.min.js"></script>
    <script src="./../../../../assets/js/main.js"></script>
    <!-- !! -->
    <script src="./../../../../assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="./../../../../assets/js/pages/modules-sweetalert.js"></script>
    <script src="../tasks/categories.js"></script>
    <script src="../controllers/newProduct.js" type="module"></script>
    <script src="../../../../assets/js/underscore-min.js"></script>
    
</body>

</html>
