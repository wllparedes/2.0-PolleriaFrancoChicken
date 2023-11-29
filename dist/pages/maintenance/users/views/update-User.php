<!-- Modal -->
<div class="modal fade text-left" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Formulario para editar categoria </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class='modal-body'>
            <form>
            <input type="hidden" id="id_usuario" name="id_usuario" value="">
                <div class="row">
                    <div class="col-lg-4 mb-1">
                        <label for="name">Nombres</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="John Adam">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-4 mb-1">
                        <label for="surnames">Apellidos</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="surnames" name="surnames"
                                class="form-control" placeholder="Doe Villa">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-1">
                        <label for="phone">Phone</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="phone" name="phone" class="form-control"
                                placeholder="+51 902 124 544">
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
                            <input type="text" id="dni" name="dni" class="form-control"
                                placeholder="12235492">
                            <div class="form-control-icon">
                                <i class="bi bi-hash"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-1">
                        <label for="user_name">Nombre del usuario</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="userName" name="userName"
                                class="form-control" placeholder="John Adam Doe Villa">
                            <div class="form-control-icon">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-1">
                        <label for="email">Email</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="email" name="email" class="form-control"
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
                                class="form-control" placeholder="************">
                            <div class="form-control-icon">
                                <i class="bi bi-hash"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-1">
                        <label for="charge">Cargo</label>
                        <div class="form-group position-relative">
                            <select class="charges form-control" id="charges">
                            </select>
                        </div>
                    </div>
                </div>
                <!--? Container btns -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cerrar</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1 actualizar" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Actualizar</span>
                    </button>
                </div>
            </form>
              
            </div>

        </div>
    </div>
</div>
