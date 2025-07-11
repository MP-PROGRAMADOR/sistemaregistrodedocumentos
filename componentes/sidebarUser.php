<nav class="sidebar sidebar-offcanvas shadow-sm" id="sidebar">
  <ul class="nav flex-column">

    <!-- INICIO -->
    <li class="nav-item mb-2">
      <a class="nav-link <?= $page == 'inicio' ? 'active' : '' ?>" href="index.php">
        <i class="mdi mdi-home-analytics menu-icon me-2 text-primary"></i>
        <span class="menu-title">Inicio</span>
      </a>
    </li>

    <!-- ENTRADAS -->
    <li class="nav-item mb-2">
      <a class="nav-link <?= $page == 'entradas' ? 'active' : '' ?>" href="entradas.php">
        <i class="mdi mdi-inbox-arrow-down menu-icon me-2 text-success"></i>
        <span class="menu-title">Entradas</span>
      </a>
    </li>

    <!-- SALIDAS -->
    <li class="nav-item mb-2">
      <a class="nav-link <?= $page == 'salidas' ? 'active' : '' ?>" href="salidas.php">
        <i class="mdi mdi-inbox-arrow-up menu-icon me-2 text-danger"></i>
        <span class="menu-title">Salidas</span>
      </a>
    </li>

    <!-- DECRETOS -->
    <li class="nav-item mb-2">
      <a class="nav-link <?= $page == 'decretos' ? 'active' : '' ?>" href="decretos.php">
        <i class="mdi mdi-file-document-edit-outline menu-icon me-2 text-warning"></i>
        <span class="menu-title">Decretos</span>
      </a>
    </li>

    

    
    <!-- REPORTES -->
    <li class="nav-item">
      <a class="nav-link <?= $page == 'reportes' ? 'active' : '' ?>" href="reportes.php">
        <i class="mdi mdi-chart-bar-stacked menu-icon me-2 text-dark"></i>
        <span class="menu-title">Reportes</span>
      </a>
    </li>

  </ul>
</nav>
