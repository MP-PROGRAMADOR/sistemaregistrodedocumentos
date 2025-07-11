<?php

include '../conexion/conexion.php';
// cogiendo el numero de entradas
$sql_entradas = "SELECT * FROM entradas";
$resultado_entradas = mysqli_query($conn, $sql_entradas);
$numero_entradas = mysqli_num_rows($resultado_entradas);

// cogiendo el numero de Salidas
$sql_salidas = "SELECT * FROM salidas";
$resultado_salidas = mysqli_query($conn, $sql_salidas);
$numero_salidas = mysqli_num_rows($resultado_salidas);

// cogiendo el numero de REFERENCIAS
$sql_Referencias = "SELECT * FROM referencias";
$resultado_referencia = mysqli_query($conn, $sql_Referencias);
$numero_referencia = mysqli_num_rows($resultado_referencia);

// cogiendo el numero de DECRETOS
$sql_decreto = "SELECT * FROM decretos";
$resultado_decreto = mysqli_query($conn, $sql_decreto);
$numero_decretos = mysqli_num_rows($resultado_decreto);

// cogiendo el numero de DESTINOS
$sql_destinos = "SELECT * FROM destino";
$resultado_destinos = mysqli_query($conn, $sql_destinos);
$numero_destinos = mysqli_num_rows($resultado_destinos);

// cogiendo el numero de INSTITUCIONES
$sql_instituciones = "SELECT * FROM instituciones";
$resultado_instituciones = mysqli_query($conn, $sql_instituciones);
$numero_instituciones = mysqli_num_rows($resultado_instituciones);

?>



<?php require "../componentes/head.php"; ?>
<!-- fin del header -->






<div class="container-scroller">

  <!-- partial:partials/_navbar.html inicio del top menu -->
  <?php require "../componentes/topMenu.php"; ?>

  <!-- partial fin del top menu -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
      <div id="settings-trigger"><i class="ti-settings"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
          <div class="img-ss rounded-circle bg-light border me-3"></div>Light
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default"></div>
        </div>
      </div>
    </div>
    <div id="right-sidebar" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
        </li>
      </ul>
      <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
          <div class="add-items d-flex px-3 mb-0">
            <form class="form w-100">
              <div class="form-group d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
              </div>
            </form>
          </div>
          <div class="list-wrapper px-3">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Team review meeting at 3.00 PM
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Prepare for presentation
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Resolve all the low priority tickets due today
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Schedule meeting for next week
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Project review
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
            </ul>
          </div>
          <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary me-2"></i>
              <span>Feb 11 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
            <p class="text-gray mb-0">The total number of sessions</p>
          </div>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary me-2"></i>
              <span>Feb 7 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
            <p class="text-gray mb-0 ">Call Sarah Graves</p>
          </div>
        </div>
        <!-- To do section tab ends -->
        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
          </div>
          <ul class="chat-list">
            <li class="list active">
              <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Thomas Douglas</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">19 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <div class="wrapper d-flex">
                  <p>Catherine</p>
                </div>
                <p>Away</p>
              </div>
              <div class="badge badge-success badge-pill my-auto mx-2">4</div>
              <small class="text-muted my-auto">23 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Daniel Russell</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">14 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <p>James Richardson</p>
                <p>Away</p>
              </div>
              <small class="text-muted my-auto">2 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Madeline Kennedy</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">5 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Sarah Graves</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">47 min</small>
            </li>
          </ul>
        </div>
        <!-- chat tab ends -->
      </div>
    </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <?php require "../componentes/sidebarAdmin.php"; ?>
    <!-- partial fin del sidebar-->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="index.php" role="tab" aria-controls="overview" aria-selected="true">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="usuarios.php" role="tab" aria-selected="false">Usuarios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="miembros.php" role="tab" aria-selected="false">Miembros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="departamentos.php" role="tab" aria-selected="false">Departamentos</a>
                  </li>
                </ul>
                <div>
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Imprimir</a>
                  </div>
                </div>
              </div>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">


                  <div class="row">
                    <div class="col-12">
                      <div class="row g-3 mb-3">
                        <div class="col-sm-6 col-md-4 col-lg-2">
                          <div class="card shadow-sm h-100 text-center">
                            <div class="card-body">
                              <i class="bi bi-box-arrow-in-right display-5 text-primary mb-2"></i>
                              <p class="card-title text-muted mb-1 small">ENTRADAS</p>
                              <h4 class="card-text fw-bold text-primary mb-0"><?php echo $numero_entradas; ?></h4>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-2">
                          <div class="card shadow-sm h-100 text-center">
                            <div class="card-body">
                              <i class="bi bi-box-arrow-right display-5 text-success mb-2"></i>
                              <p class="card-title text-muted mb-1 small">SALIDAS</p>
                              <h4 class="card-text fw-bold text-success mb-0"><?php echo $numero_salidas; ?></h4>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-2">
                          <div class="card shadow-sm h-100 text-center">
                            <div class="card-body">
                              <i class="bi bi-link-45deg display-5 text-info mb-2"></i>
                              <p class="card-title text-muted mb-1 small">REFERENCIAS</p>
                              <h4 class="card-text fw-bold text-info mb-0"><?php echo $numero_referencia; ?></h4>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-2 d-none d-md-block">
                          <div class="card shadow-sm h-100 text-center">
                            <div class="card-body">
                              <i class="bi bi-file-earmark-text display-5 text-warning mb-2"></i>
                              <p class="card-title text-muted mb-1 small">DECRETOS</p>
                              <h4 class="card-text fw-bold text-warning mb-0"><?php echo $numero_decretos; ?></h4>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-2 d-none d-md-block">
                          <div class="card shadow-sm h-100 text-center">
                            <div class="card-body">
                              <i class="bi bi-geo-alt display-5 text-danger mb-2"></i>
                              <p class="card-title text-muted mb-1 small">DESTINOS</p>
                              <h4 class="card-text fw-bold text-danger mb-0"><?php echo $numero_destinos; ?></h4>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-2 d-none d-md-block">
                          <div class="card shadow-sm h-100 text-center">
                            <div class="card-body">
                              <i class="bi bi-building display-5 text-secondary mb-2"></i>
                              <p class="card-title text-muted mb-1 small">INSTITUCIONES</p>
                              <h4 class="card-text fw-bold text-secondary mb-0"><?php echo $numero_instituciones; ?></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Estadisticas</h4>
                                  <p class="card-subtitle card-subtitle-dash">estadistica del registro de entrada y salidas</p>
                                </div>

                              </div>
                              <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                  <!-- <h4 class="text-success">(+1.37%)</h4> -->
                                </div>
                                <div class="me-3">
                                  <div id="marketing-overview-legend"></div>
                                </div>
                              </div>
                              <div class="chartjs-bar-wrapper mt-3">
                                <!-- <canvas id="marketingOverview"></canvas> -->

                                <div id="chart_div2" style="width: 100%; height: 100%;"></div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="row flex-grow-1">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded shadow-lg border-0">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-center mb-4">
                                <div>
                                  <h4 class="card-title card-title-dash text-dark fw-bold">
                                    <i class="bi bi-person-lines-fill me-2 text-primary"></i> Progreso de los Últimos Usuarios
                                  </h4>
                                  <p class="text-muted small">Visualiza las actividades de los 3 usuarios más recientes.</p>
                                </div>
                              </div>
                              <div class="table-responsive mt-3">
                                <table class="table table-hover table-striped">
                                  <thead class="bg-light">
                                    <tr>
                                      <th scope="col" class="text-uppercase text-muted fw-bold">Usuario</th>
                                      <th scope="col" class="text-uppercase text-muted fw-bold">Departamento</th>
                                      <th scope="col" class="text-uppercase text-muted fw-bold">Entradas</th>
                                      <th scope="col" class="text-uppercase text-muted fw-bold">Salidas</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    include '../conexion/conexion.php'; // Asegúrate de que esta ruta sea correcta

                                    $sql_usuario = "SELECT * FROM usuarios ORDER BY Id DESC LIMIT 3"; // Ordenamos por ID descendente para los "últimos"
                                    $resultado_usuario = mysqli_query($conn, $sql_usuario);

                                    if ($resultado_usuario && mysqli_num_rows($resultado_usuario) > 0) {
                                      while ($row_usuarios = $resultado_usuario->fetch_assoc()) {
                                        // Obtener nombre del departamento
                                        $codeDep = $row_usuarios['Dpto'];
                                        $depart_query = "SELECT Nombre FROM departementos WHERE Id = '$codeDep'";
                                        $resulDep = mysqli_query($conn, $depart_query);
                                        $nomDep = $resulDep ? mysqli_fetch_array($resulDep)['Nombre'] : 'N/A';

                                        // Calcular entradas del usuario
                                        $user_id = $row_usuarios['Id'];
                                        $sql_entradaUser = "SELECT COUNT(*) AS total_entradas FROM entradas WHERE Usuario = $user_id";
                                        $resultado_entradaUser = mysqli_query($conn, $sql_entradaUser);
                                        $numero_entrada = $resultado_entradaUser ? mysqli_fetch_assoc($resultado_entradaUser)['total_entradas'] : 0;

                                        // Calcular salidas del usuario
                                        $sql_salida = "SELECT COUNT(*) AS total_salidas FROM salidas WHERE Usuario = $user_id";
                                        $resultado_salida = mysqli_query($conn, $sql_salida);
                                        $numero_salida = $resultado_salida ? mysqli_fetch_assoc($resultado_salida)['total_salidas'] : 0;

                                        // Obtener total de entradas y salidas para el cálculo de porcentaje global
                                        // Asumo que $numero_entradas y $numero_salidas vienen de una consulta global previa o están definidos.
                                        // Si no es así, deberías consultarlos aquí o pasarlos como variables.
                                        // Para este ejemplo, usaré valores de ejemplo o asumiré que están disponibles globalmente.
                                        // Si no los tienes, podrías usar un total ficticio o el máximo del usuario.
                                        $total_global_entradas = isset($numero_entradas) ? $numero_entradas : 100; // Valor por defecto si no está definido
                                        $total_global_salidas = isset($numero_salidas) ? $numero_salidas : 100;   // Valor por defecto si no está definido

                                        $porCientoEntrada = ($total_global_entradas > 0) ? round(($numero_entrada / $total_global_entradas) * 100) : 0;
                                        $porCientoSalida = ($total_global_salidas > 0) ? round(($numero_salida / $total_global_salidas) * 100) : 0;
                                    ?>
                                        <tr>
                                          <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                              <?php
                                              $image_src = 'data:image/*;base64,' . base64_encode($row_usuarios['Foto']);
                                              // Verifica si la imagen está vacía o es inválida antes de mostrarla
                                              if (!empty($row_usuarios['Foto'])) {
                                                echo '<img src="' . $image_src . '" class="rounded-circle me-3" alt="Foto de perfil" style="width: 40px; height: 40px; object-fit: cover;">';
                                              } else {
                                                // Icono de Bootstrap si no hay foto
                                                echo '<i class="bi bi-person-circle fs-3 text-muted me-3" style="width: 40px; height: 40px;"></i>';
                                              }
                                              ?>
                                              <div>
                                                <h6 class="mb-0 text-dark"><?= htmlspecialchars($row_usuarios['Nombre']); ?></h6>
                                                <p class="text-muted small mb-0"><?= htmlspecialchars($row_usuarios['Tipo_Usuario']); ?></p>
                                              </div>
                                            </div>
                                          </td>
                                          <td class="align-middle text-muted"><?= htmlspecialchars($nomDep); ?></td>
                                          <td class="align-middle">
                                            <div>
                                              <div class="d-flex justify-content-between align-items-center mb-1">
                                                <p class="text-success fw-bold mb-0 small"><?= $porCientoEntrada; ?>%</p>
                                                <p class="text-muted mb-0 small"><?= $numero_entrada . "/" . $total_global_entradas; ?></p>
                                              </div>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= $porCientoEntrada; ?>%" aria-valuenow="<?= $porCientoEntrada; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                          <td class="align-middle">
                                            <div>
                                              <div class="d-flex justify-content-between align-items-center mb-1">
                                                <p class="text-danger fw-bold mb-0 small"><?= $porCientoSalida; ?>%</p>
                                                <p class="text-muted mb-0 small"><?= $numero_salida . "/" . $total_global_salidas; ?></p>
                                              </div>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $porCientoSalida; ?>%" aria-valuenow="<?= $porCientoSalida; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                    <?php
                                      }
                                    } else {
                                      echo '<tr><td colspan="4" class="text-center text-muted py-4">No hay usuarios recientes para mostrar.</td></tr>';
                                    }

                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="col-lg-4 d-flex flex-column">

                      <div class="row flex-grow-1">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded shadow-lg border-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                                    <h4 class="card-title card-title-dash text-dark fw-bold mb-0">
                                      <i class="bi bi-journal-text me-2 text-primary"></i> Últimos Registros de Entrada
                                    </h4>
                                  </div>

                                  <div class="list-wrapper">
                                    <ul class="list-group list-group-flush">
                                      <?php
                                      include '../conexion/conexion.php';
                                      $sql_entradas2 = "SELECT * FROM entradas ORDER BY Id DESC LIMIT 4";
                                      $resultado_entradas = mysqli_query($conn, $sql_entradas2);

                                      if ($resultado_entradas && mysqli_num_rows($resultado_entradas) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado_entradas)) {
                                      ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start py-3 px-2">
                                            <div class="d-flex align-items-start flex-grow-1">
                                              <div class="form-check me-3 mt-1">
                                                <input class="form-check-input" type="checkbox" id="entrada_<?= $fila['Id'] ?>">
                                              </div>
                                              <div>
                                                <h6 class="mb-1 text-dark fw-semibold">
                                                  <i class="bi bi-chevron-right text-primary me-1"></i>
                                                  <?= htmlspecialchars(mb_strimwidth($fila['Descripcion'], 0, 50, '...')); ?>
                                                </h6>
                                                <small class="text-muted d-block">
                                                  <i class="bi bi-calendar-event me-1"></i> <?= htmlspecialchars($fila['FechaRegistro']); ?>
                                                </small>
                                              </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                              <span class="badge bg-light text-primary border border-primary py-2 px-3 rounded-pill fw-medium shadow-sm">
                                                <i class="bi bi-hash me-1"></i> <?= htmlspecialchars($fila['NumRegistro']); ?>
                                              </span>
                                            </div>
                                          </li>
                                      <?php
                                        }
                                      } else {
                                        echo '<li class="list-group-item text-center text-muted py-4">No hay registros de entrada recientes.</li>';
                                      }
                                      ?>
                                    </ul>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>




                       <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card shadow-sm border-0 rounded-4 bg-light-subtle">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <!-- Título -->
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="fw-bold text-primary mb-1">
                                          🧮 Entradas vs Salidas - <?= $anio_actual ?>
                                        </h4>
                                        <p class="text-muted small mb-0">Resumen gráfico de los registros anuales</p>
                                      </div>
                                    </div>

                                    <!-- Gráfico -->
                                    <div class="bg-white border rounded-3 p-3 shadow-sm">
                                      <div id="piechart1" style="width: 100%; height: 100%;"></div>
                                    </div>

                                    <!-- Leyenda si aplica -->
                                    <div id="doughnut-chart-legend" class="mt-4 text-center text-muted small"></div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>



                      <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                      <h4 class="card-title card-title-dash">Últimos Registros de Salida</h4>
                                      <p class="text-muted mb-0">Visualiza los movimientos más recientes</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Ver Todos</a>
                                  </div>
                                  <div class="mt-3">
                                    <?php
                                    // Asegúrate de que $conn esté definido y sea una conexión válida a la base de datos
                                    // Ejemplo (adapta esto a tu configuración):
                                    // $servername = "localhost";
                                    // $username = "tu_usuario";
                                    // $password = "tu_contraseña";
                                    // $dbname = "tu_base_de_datos";
                                    // $conn = mysqli_connect($servername, $username, $password, $dbname);
                                    // if (!$conn) {
                                    //     die("Conexión fallida: " . mysqli_connect_error());
                                    // }

                                    $sql_salida23 = "SELECT * FROM salidas ORDER BY Id DESC LIMIT 4";
                                    $resultado_salida23 = mysqli_query($conn, $sql_salida23);

                                    if (mysqli_num_rows($resultado_salida23) > 0) {
                                      echo '<ul class="list-group list-group-flush">';
                                      while ($fila = mysqli_fetch_assoc($resultado_salida23)) {
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-start">';
                                        echo '  <div class="ms-2 me-auto">';
                                        echo '    <div class="fw-bold">' . htmlspecialchars($fila['Descripcion']) . '</div>'; // Usa htmlspecialchars para evitar XSS
                                        echo '    <small class="text-muted">' . htmlspecialchars($fila['FechaRegistro']) . '</small>';
                                        echo '  </div>';
                                        echo '  <span class="badge bg-primary rounded-pill">Número: ' . htmlspecialchars($fila['NumRegistro']) . '</span>';
                                        echo '</li>';
                                      }
                                      echo '</ul>';
                                    } else {
                                      echo '<div class="alert alert-info text-center" role="alert">';
                                      echo '  No hay registros de salida recientes.';
                                      echo '</div>';
                                    }
                                    // No olvides cerrar la conexión a la base de datos al final de tu script o página
                                    // mysqli_close($conn);
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <?php require "../componentes/footer.php"; ?>