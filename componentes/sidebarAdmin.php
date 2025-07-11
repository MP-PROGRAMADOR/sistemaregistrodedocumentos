<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="mdi mdi-view-dashboard menu-icon"></i> <span class="menu-title">Inicio</span>
            </a>
        </li>

        <li class="nav-item nav-category">Documentos & Transacciones</li>
        <li class="nav-item">
            <a class="nav-link" href="entradas.php">
                <i class="mdi mdi-file-import menu-icon"></i> <span class="menu-title">Entradas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="decretos.php">
                <i class="mdi mdi-gavel menu-icon"></i> <span class="menu-title">Decretos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="salidas.php">
                <i class="mdi mdi-file-export menu-icon"></i> <span class="menu-title">Salidas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cheques.php">
                <i class="mdi mdi-cash-check menu-icon"></i> <span class="menu-title">Cheques</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pagos.php">
                <i class="mdi mdi-cash-multiple menu-icon"></i> <span class="menu-title">Pagos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="referencias.php">
                <i class="mdi mdi-link-variant menu-icon"></i> <span class="menu-title">Referencias</span>
            </a>
        </li>

         <li class="nav-item">
            <a class="nav-link" href="reportes.php">
                <i class="mdi mdi-link-variant menu-icon"></i> <span class="menu-title">Reportes</span>
            </a>
        </li>

        <li class="nav-item nav-category">Administración</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#gestionInstitucion" aria-expanded="false" aria-controls="gestionInstitucion">
                <i class="menu-icon mdi mdi-office-building"></i> <span class="menu-title">Gestión de Institución</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gestionInstitucion"> <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../admin/departamentos.php">Departamentos</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../admin/instituciones.php">Instituciones</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../admin/bancos.php">Bancos</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#empleadosMenu" aria-expanded="false" aria-controls="empleadosMenu">
                <i class="menu-icon mdi mdi-account-group"></i> <span class="menu-title">Empleados</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="empleadosMenu"> <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../admin/miembros.php">Miembros</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#usuariosMenu" aria-expanded="false" aria-controls="usuariosMenu">
                <i class="menu-icon mdi mdi-account-key"></i> <span class="menu-title">Usuarios</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="usuariosMenu"> <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../admin/usuarios.php">Usuarios</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>