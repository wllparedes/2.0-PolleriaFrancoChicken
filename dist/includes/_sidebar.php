<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="./../../../home/storekeeper/views/index.php"><img src="./../../../../assets/images/logo/logo.png" alt="Logo"></a>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li
                    class="sidebar-item ">
                    <a href="./../../../home/storekeeper/views/index.php" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Mantenimiento</li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="./../../../maintenance/users/views/newUser.php">Nuevo usuario</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./../../../maintenance/users/views/listUsers.php">Lista de usuarios</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Categorias</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="./../../../maintenance/categories/views/newCategory.php">Nuevo categoria</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./../../../maintenance/categories/views/listCategories.php">Lista de categorias</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-pen-fill"></i>
                        <span>Productos</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="./../../../maintenance/products/views/newProduct.php">Nuevo producto</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./../../../maintenance/products/views/listProducts.php">Lista de productos</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="table.html" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Proveedores</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="./../../../maintenance/suppliers/views/newSupplier.php">Nuevo proveedor</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./../../../maintenance/suppliers/views/listSuppliers.php">Lista de proveedores</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Abastecimiento</li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Requerimiento de compra</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="./../../../supplying/purchase-requirements/views/newRequirement.php">Nuevo requerimiento</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./../../../supplying/purchase-requirements/views/listRequirements.php">Lista de requerimientos</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-egg-fill"></i>
                        <span>Orden de compra</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="./../../../supplying/purchase-orders/views/newOrder.php">Nueva orden</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./../../../supplying/purchase-orders/views/listOrders.php">Lista de ordenes</a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Comprobante de compra</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="ui-chart-chartjs.html">Registrar comprobante</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-chart-apexcharts.html">Lista de comprobantes</a>
                        </li>
                    </ul>
                </li> -->

                <li class="sidebar-title">Perfil</li>

                <li class="sidebar-item">
                    <a href="./../../../maintenance/profile/views/viewProfile.php" class="sidebar-link">
                        <i class="bi bi-life-preserver"></i>
                        <span>Mi perfil</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="./../../../../php/cerrar_session.php" class="sidebar-link">
                        <i class="bi bi-cash"></i>
                        <span>Salir</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>
