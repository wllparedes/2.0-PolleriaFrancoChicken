<?php
//dd
include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear Proveedor - Almacenero</title>
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
                            <h3> Formulario: Crear Proveedor </h3>
                            <p class="text-subtitle text-muted">Por favor rellene todos los campos requeridos para poder
                                crear un nuevo proveedor
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
                                    <h4 class="card-title">Nuevo Proveedor</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!--Empiezo del form-->
                                        <form action="forms-sample form-supplier" id="formulario">
                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <label for="razon_social">Razon Social</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="razon_social" name="razon_social"
                                                            class="form-control" placeholder="Gallinas y Alas SRL">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-bookmark-heart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <label for="direccion">Dirección</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="direccion" name="direccion" rows="5"
                                                            class="form-control"
                                                            placeholder="Av. Exquisitamente 606, Lima">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-card-text"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <label for="ruc">Ruc</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="ruc" name="ruc" rows="5"
                                                            class="form-control" placeholder="20538856674">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-card-text"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <label for="phone">Telefono</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="phone" name="phone" rows="5"
                                                            class="form-control" placeholder="+51 985 987 685">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-card-text"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <label for="email">Email</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="email" name="email" rows="5"
                                                            class="form-control" placeholder="gallinas_alas@gmail.com">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-card-text"></i>
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
                                        <!--Final del form-->
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
    <script src="./../../../../assets/js/global/login/redirect.js"></script>
    <!-- !! -->
    <script src="./../../../../assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="./../../../../assets/js/pages/modules-sweetalert.js"></script>
    <script src="../controllers/NewSupplier.js" type="module"></script>
    <script src="../../../../assets/js/underscore-min.js"></script>

</body>

</html>
