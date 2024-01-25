<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content" id="form">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para editar usuario </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class='modal-body'>
                <form id="editUser">
                    <div class="row">
                        <div class="col-lg-4 mb-1">
                            <label for="name">Nombres</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="name" name="name" class="form-control input-form" placeholder="John Adam">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-1">
                            <label for="surnames">Apellidos</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="surnames" name="surnames" class="form-control input-form"
                                    placeholder="Doe Villa">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-1">
                            <label for="phone">Phone</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="phone" name="phone" class="form-control input-form"
                                    placeholder="901901901">
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
                                <input type="text" id="dni" name="dni" class="form-control input-form" placeholder="12235492">
                                <div class="form-control-icon">
                                    <i class="bi bi-hash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-1">
                            <label for="user_name">Nombre del usuario</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="userName" name="userName" class="form-control input-form"
                                    placeholder="John Adam Doe Villa">
                                <div class="form-control-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-1">
                            <label for="email">Email</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="email" name="email" class="form-control input-form"
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
                                <input type="password" id="password" name="password" class="form-control input-form"
                                    placeholder="************">
                                <div class="form-control-icon">
                                    <i class="bi bi-hash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-1">
                            <label for="charge">Cargo</label>
                            <div class="form-group position-relative" id="parent-charges">
                                <!-- <div class="charges form-control" id="select-charges">

                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 contenedor__mensaje" id="contenedor__mensaje">
                            <div class="formulario__mensaje bg-danger shadow-danger">
                                <i class="bi bi-exclamation-triangle-fill"></i></span> <b class="p-1">Rellene el
                                    formulario
                                    correctamente.</b>
                            </div>
                        </div>
                    </div>

                    <!--? Container btns -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger close-modal" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-success ml-1 update">
                            Actualizar
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
