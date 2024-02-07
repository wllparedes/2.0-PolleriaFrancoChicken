<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear usuario - Almacenero</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>
    <link rel="stylesheet" href="./../../../../assets/vendors/virtual-select/virtual-select.min.css">

</head>

<body>
    <div id="app">

        <?php
            $isActiveModuleUser = 'active';
            $isActiveSectionNew = 'active';
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
                            <h3> Formulario: Crear Usuario </h3>
                            <p class="text-subtitle text-muted">Por favor rellene todos los campos requeridos para poder
                                crear un nuevo usuario
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="./../../../home/storekeeper/views/index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Nuevo usuario</li>
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
                                    <h4 class="card-title">Nuevo Usuario</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="forms-sample form-usuario" id="formulario">
                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <label for="name">Nombres</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="name" name="name"
                                                            class="form-control input-form" placeholder="John Adam">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <label for="surnames">Apellidos</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="surnames" name="surnames"
                                                            class="form-control input-form" placeholder="Doe Villa">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <label for="phone">Telefono</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="phone" name="phone"
                                                            class="form-control input-form" placeholder="900111000">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-phone"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <label for="dni">DNI</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="dni" name="dni"
                                                            class="form-control input-form" placeholder="12235492">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-hash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <label for="user_name">Nombre del usuario</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="userName" name="userName"
                                                            class="form-control input-form"
                                                            placeholder="John Adam Doe Villa">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-people"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <label for="email">Email</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="email" name="email"
                                                            class="form-control input-form"
                                                            placeholder="John Adam Doe Villa">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-at"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <label for="password">Contraseña</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="password" id="password" name="password"
                                                            class="form-control input-form" placeholder="************">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-hash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <label for="charge">Cargo</label>
                                                    <div class="form-group position-relative">
                                                        <!-- <select class="charges form-control" id="charges">
                                                        </select> -->

                                                        <div class="charges form-control" id="select-charges">

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

            <!-- start footer -->
            <?php include('./../../../../includes/_footer.php') ?>
            <!-- end footer -->

        </div>
    </div>


    <?php include('./../../../../includes/_scripts_for_page.php') ?>

    <!-- * plugins -->
    <script src="./../../../../assets/vendors/virtual-select/virtual-select.min.js"></script>
    <!-- * parte de la pagina -->
    <script src="../tasks/charges.js"></script>
    <script src="../controllers/NewUser.js" type="module"></script>
</body>

</html>
