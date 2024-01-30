<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Lista de categorias - Almacenero</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>
    <!-- * datatable -->
    <link rel="stylesheet"
        href="./../../../../assets/vendors/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="./../../../../assets/vendors/datatables/Responsive-2.2.1/css/responsive.bootstrap4.min.css">
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
                            <h3> Lista de categorias </h3>
                            <p class="text-subtitle text-muted">Página donde podremos vizualizar la lista de categorias
                                con los que contamos, podrás editar, eliminar y buscar a una categoria en específico.
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./../../../home/storekeeper/views/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Input Group</li>
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
                            <table class="table table-striped" id="table-categories">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombres</th>
                                        <th>Descripcion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </section>

                <!-- * DATA TABLES -->

            </div>

            <?php include("./updateCategory.php") ?>

            <!-- start footer -->
            <?php include('./../../../../includes/_footer.php') ?>
            <!-- end footer -->

        </div>
    </div>


    <?php include('./../../../../includes/_scripts_for_page.php') ?>
    
    <!--* data table -->
    <script src="./../../../../assets/vendors/datatables/datatables.min.js"></script>
    <script src="./../../../../assets/vendors/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="./../../../../assets/vendors/datatables/Responsive-2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="./../../../../assets/vendors/datatables/Responsive-2.2.1/js/responsive.bootstrap4.min.js"></script>

    <!-- * plugins  -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

    <!-- * parte de la pagina  -->
    <script src="./../controllers/listCategories.js" type="module"></script>
    <script src="./../controllers/getCategory.js" type="module"></script>
    <script src="./../controllers/updateCategory.js" type="module"></script>
    <script src="./../controllers/deleteCategory.js" type="module"></script>


</body>

</html>
