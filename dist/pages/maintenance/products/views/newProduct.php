<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Producto</title>
    <?php include('./../../../../includes/_links_for_page.php'); ?>
    <!-- virtual select -->
    <link rel="stylesheet" href="./../../../../assets/vendors/virtual-select/virtual-select.min.css">
    <!-- filepond css -->
    <link href="./../../../../assets/vendors/filepond/filepond.min.css" rel="stylesheet">
    <link href="./../../../../assets/vendors/filepond/plugin/filepond-preview.min.css" rel="stylesheet">
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
                                                        <input type="text" id="name" name="name" class="form-control input-form"
                                                            placeholder="Pollo a la Parrilla">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-box-seam"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <label for="price">Precio</label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" id="price" name="price" class="form-control input-form"
                                                            placeholder="S/. 15.99">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-cash "></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <label for="category">Categoria</label>
                                                    <div class="form-group position-relative">
                                                        <!-- <select class="categories form-control" id="category"
                                                            name="category">
                                                        </select> -->
                                                        <div class="categories form-control" id="category"
                                                            name="category">

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

    <!-- virtual select -->
    <script src="./../../../../assets/vendors/virtual-select/virtual-select.min.js"></script>

    <!-- filepond image -->
    <script src="./../../../../assets/vendors/filepond/validator/filepond-validate-size.js"></script>
    <script src="./../../../../assets/vendors/filepond/validator/filepond-validate-type.js"></script>
    <script src="./../../../../assets/vendors/filepond/plugin/filepond-preview.min.js"></script>
    <script src="./../../../../assets/vendors/filepond/filepond.min.js"></script>

    <!-- * parte de la pagina -->
    <script src="../tasks/categories.js"></script>
    <script src="../controllers/newProduct.js" type="module"></script>

    <script>
        // register desired plugins...
        FilePond.registerPlugin(
            FilePondPluginFileValidateSize,
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            // FilePondPluginImageResize,
        );

        // Filepond: Image Preview
        FilePond.create(document.querySelector('.image-preview-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            imageResizeMode: 'cover',
            imageResizeUpscale: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

    </script>

</body>

</html>
