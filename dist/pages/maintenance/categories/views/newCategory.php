<?php
//dd
include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear categoria - Almacenero</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>
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
                            <h3> Formulario: Crear Categoria </h3>
                            <p class="text-subtitle text-muted">Por favor rellene todos los campos requeridos para poder
                                crear un nueva categoria
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
                                    <h4 class="card-title">Nueva Categoria</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!--Empiezo del form-->
                                        <form action="forms-sample form-category" id="formulario">
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <label for="name">Nombre</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="nameCategory" name="nameCategory"
                                                            class="form-control" placeholder="Productos Derivados">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-bookmark-heart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-1">
                                                    <label for="description">Descripción</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="description" name="description" rows="5"
                                                            class="form-control"
                                                            placeholder="Acompañamientos para el pollo, como papas fritas, ensaladas y arroz.">
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

    <?php include('./../../../../includes/_scripts_for_page.php') ?>

    <!-- * parte de la pagina -->
    <script src="../controllers/NewCategory.js" type="module"></script>

</body>

</html>
