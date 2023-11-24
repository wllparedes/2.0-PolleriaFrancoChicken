<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Lista de usuarios - Almacenero</title>
    <link rel="stylesheet" href="./../../../../assets/vendors/choices.js/choices.min.css" />
    <?php include('./../../../../includes/_head.php'); ?>
    <link rel="stylesheet" href="./../../../../assets/vendors/datatable/datatable.min.css">
    <link rel="stylesheet" href="./../../../../assets/vendors/simple-datatables/style.css">
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
                            <h3> Lista de usuarios </h3>
                            <p class="text-subtitle text-muted">Página donde podremos vizualizar la lista de usuarios
                                con los que contamos, podrás editar, eliminar y buscar a un usuario en específico.
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

                <!-- * DATA TABLES -->


                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Lista de usuarios
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table-users">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>DNI</th>
                                        <th>Nombre de usuario</th>
                                        <th>Email</th>
                                        <th>Cargo</th>
                                        <th>Opcciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ¨* dataTable -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>

                <!-- * DATA TABLES -->

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
    <!-- !! -->
    <script src="./../../../../assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="./../../../../assets/js/pages/modules-sweetalert.js"></script>
    <script src="./../../../../assets/js/underscore-min.js"></script>
    <!-- <script src="./../../../../assets/vendors/simple-datatables/simple-datatables.js"></script> -->
    <script src="./../../../../assets/vendors/datatable/datatable.min.js"></script>

    <!-- * -->
    <script src="./../controllers/listUsers.js" type="module"></script>
    <script src="./../../../../assets/js/main.js"></script>



</body>

</html>
