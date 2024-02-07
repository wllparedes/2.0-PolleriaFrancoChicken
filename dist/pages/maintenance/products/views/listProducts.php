<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Lista de Productos</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>

    <!-- virtual select -->
    <link rel="stylesheet" href="./../../../../assets/vendors/virtual-select/virtual-select.min.css">
    <!-- * datatable -->
    <link rel="stylesheet"
        href="./../../../../assets/vendors/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="./../../../../assets/vendors/datatables/Responsive-2.2.1/css/responsive.bootstrap4.min.css">

</head>

<body>
    <div id="app">


        <?php
            $isActiveModuleProduct = 'active';
            $isActiveSectionListProduct = 'active';
        ?>
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
                            <h3> Productos Registrados </h3>
                            <p class="text-subtitle text-muted">Repositorio para vizualizar la lista de productos
                                registrados, podrás editar, eliminar y buscar a un producto en específico.
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./../../../home/storekeeper/views/index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lista de productos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- * DATA TABLES -->


                <section class="section">
                    <div class="card" id="dataTable">
                        <div class="card-header" id="headerTable">
                            Generar reportes de mantenimiento (EXCEL - PDF)
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table-products">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Categoria</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </section>

                <!-- * DATA TABLES -->

            </div>

            <?php include("updateProduct.php") ?>
            <!-- start footer -->
            <?php include('./../../../../includes/_footer.php') ?>
            <!-- end footer -->

        </div>
    </div>

    <?php include('./../../../../includes/_scripts_for_page.php'); ?>

    <!--* data table -->
    <script src="./../../../../assets/vendors/datatables/datatables.min.js"></script>
    <script src="./../../../../assets/vendors/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="./../../../../assets/vendors/datatables/Responsive-2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="./../../../../assets/vendors/datatables/Responsive-2.2.1/js/responsive.bootstrap4.min.js"></script>

    <!-- * plugins  -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

    <!-- virtual select -->
    <script src="./../../../../assets/vendors/virtual-select/virtual-select.min.js"></script>

    <!-- * parte de la pagina  -->
    <script src="./../controllers/listProducts.js" type="module"></script>
    <script src="./../controllers/updateProduct.js" type="module"></script>
    <script src="./../controllers/deleteProduct.js" type="module"></script>
    <script src="./../controllers/getProduct.js" type="module"></script>


</body>

</html>
