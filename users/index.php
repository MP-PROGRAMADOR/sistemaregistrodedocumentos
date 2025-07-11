<?php require "../componentes/head.php"; ?>



<?php

include '../conexion/conexion.php';
// cogiendo el numero de entradas
$sql_entradas = "SELECT * FROM entradas where Usuario=$usuario_id";
$resultado_entradas = mysqli_query($conn, $sql_entradas);
$numero_entradas = mysqli_num_rows($resultado_entradas);

$sql_entradasT = "SELECT * FROM entradas";
$resultado_entradasT = mysqli_query($conn, $sql_entradasT);
$numero_entradasT = mysqli_num_rows($resultado_entradasT);



// cogiendo el numero de Salidas
$sql_salidas = "SELECT * FROM salidas where Usuario=$usuario_id";
$resultado_salidas = mysqli_query($conn, $sql_salidas);
$numero_salidas = mysqli_num_rows($resultado_salidas);

$sql_salidasT = "SELECT * FROM salidas";
$resultado_salidasT = mysqli_query($conn, $sql_salidasT);
$numero_salidasT = mysqli_num_rows($resultado_salidasT);

// cogiendo el numero de INFORMES
// $sql_informe = "SELECT `usuarios`.*, `departementos`.*, `informe`.* FROM `usuarios` LEFT JOIN `departementos` ON `usuarios`.`Dpto` = `departementos`.`Id` LEFT JOIN `informe` ON `informe`.`Dpto` = `departementos`.`Id` where usuarios.Id=$usuario_id";
// $resultado_informe = mysqli_query($conn, $sql_informe);
// $numero_informe = mysqli_num_rows($resultado_informe);

// cogiendo el numero de DECRETOS
$sql_decreto = "SELECT decretos.Descripcion FROM decretos INNER JOIN entradas ON decretos.DocEntrada = entradas.Id WHERE entradas.Usuario = $usuario_id";
$resultado_decreto = mysqli_query($conn, $sql_decreto);
$numero_decretos = mysqli_num_rows($resultado_decreto);

// // cogiendo el numero de DESTINOS
// $sql_destinos = "SELECT * FROM destino where Usuario=$usuario_id";
// $resultado_destinos = mysqli_query($conn, $sql_destinos);
// $numero_destinos = mysqli_num_rows($resultado_destinos);

// // cogiendo el numero de INSTITUCIONES
// $sql_instituciones = "SELECT * FROM instituciones where Usuario=$usuario_id";
// $resultado_instituciones = mysqli_query($conn, $sql_instituciones);
// $numero_instituciones = mysqli_num_rows($resultado_instituciones);




?>







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
    <?php require "../componentes/sidebarUser.php"; ?>
    <!-- partial fin del sidebar-->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <div class="d-sm-flex align-items-center justify-content-between border-bottom">


              </div>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                 


                <div class="row g-3">
  <div class="col-6 col-md-2">
    <div class="info-card">
      <div class="info-icon bg-entrada"><i class="bi bi-arrow-down-circle-fill"></i></div>
      <div class="info-title">Entradas</div>
      <div class="info-value"><?= $numero_entradas ?></div>
    </div>
  </div>

  <div class="col-6 col-md-2">
    <div class="info-card">
      <div class="info-icon bg-salida"><i class="bi bi-arrow-up-circle-fill"></i></div>
      <div class="info-title">Salidas</div>
      <div class="info-value"><?= $numero_salidas ?></div>
    </div>
  </div>

  <div class="col-6 col-md-2">
    <div class="info-card">
      <div class="info-icon bg-decreto"><i class="bi bi-journal-text"></i></div>
      <div class="info-title">Decretos</div>
      <div class="info-value"><?= $numero_decretos ?></div>
    </div>
  </div>

  <div class="col-6 col-md-3">
    <div class="info-card">
      <div class="info-icon bg-fecha"><i class="bi bi-calendar-event"></i></div>
      <div class="info-title">Fecha</div>
      <div class="info-value"><?= date('d-m-Y') ?></div>
    </div>
  </div>

  <div class="col-6 col-md-3 mb-3">
    <div class="info-card">
      <div class="info-icon bg-hora"><i class="bi bi-clock-history"></i></div>
      <div class="info-title">Hora</div>
      <div class="info-value"><?= $hora ?></div>
    </div>
  </div>
</div>



                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card shadow-sm border-0 rounded-4 bg-light-subtle">
                            <div class="card-body">
                              <!-- Título y selector -->
                              <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                <div>
                                  <h4 class="fw-bold text-primary mb-1">📈 Estadísticas</h4>
                                  <p class="text-muted small mb-0">Registro anual de entradas y salidas</p>
                                </div>
                                <div>
                                 
                                </div>
                              </div>

                              <!-- Gráfico -->
                              <div class="mt-4">
                                <div class="bg-white border rounded-3 p-3 shadow-sm">
                                  <div id="chart_div" style="width: 100%; height: 100%;"></div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>




                    <div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card shadow-sm border-0 rounded-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="card-title fw-bold text-primary">
            <i class="bi bi-graph-up-arrow me-2"></i> Progreso del Usuario
          </h4>
        </div>

        <div class="table-responsive">
          <table class="table align-middle table-borderless">
            <thead class="bg-light text-uppercase small text-muted">
              <tr>
                <th><i class="bi bi-person-circle me-1"></i> Usuario</th>
                <th><i class="bi bi-building me-1"></i> Departamento</th>
                <th><i class="bi bi-box-arrow-in-down me-1"></i> Entradas</th>
                <th><i class="bi bi-box-arrow-up me-1"></i> Salidas</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../conexion/conexion.php';
              $sql_usuario = "SELECT * FROM usuarios WHERE Id=$usuario_id";
              $resultado_usuario = mysqli_query($conn, $sql_usuario);

              while ($row_usuarios = $resultado_usuario->fetch_assoc()) {
              ?>
                <tr class="bg-white border-bottom">
                  <td class="d-flex align-items-center py-3">
                    <img src="data:image/*;base64,<?= base64_encode($row_usuarios['Foto']); ?>" 
                         class="rounded-circle me-3 shadow-sm border" height="55" width="55" alt="Foto">
                    <div>
                      <div class="fw-semibold fs-6"><?= $row_usuarios['Nombre']; ?></div>
                      <div class="text-muted small"><?= $row_usuarios['Tipo_Usuario']; ?></div>
                    </div>
                  </td>
                  <td>
                    <?php
                    $codeDep = $row_usuarios['Dpto'];
                    $depart = "SELECT * FROM departementos WHERE Id = '$codeDep'";
                    $resulDep = mysqli_query($conn, $depart);
                    $nomDep = mysqli_fetch_array($resulDep);
                    ?>
                    <span class="badge bg-info-subtle text-dark rounded-pill px-3 py-2">
                      <?= $nomDep['Nombre']; ?>
                    </span>
                  </td>
                  <td style="min-width: 200px;">
                    <?php
                    $resulDiv = ($numero_entradas / $numero_entradasT) * 100/100;
                    $porCientoEntrada = round($resulDiv);
                    ?>
                    <div class="d-flex justify-content-between mb-1">
                      <small class="text-success fw-bold"><?= $porCientoEntrada; ?>%</small>
                      <small class="text-muted"><?= "$numero_entradas / $numero_entradasT"; ?></small>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: <?= $resulDiv; ?>%;"></div>
                    </div>
                  </td>
                  <td style="min-width: 200px;">
                    <?php
                    $resulDivS = ($numero_salidas / $numero_salidasT) * 100/100;
                    $porCientoSalida = round($resulDivS);
                    ?>
                    <div class="d-flex justify-content-between mb-1">
                      <small class="text-danger fw-bold"><?= $porCientoSalida; ?>%</small>
                      <small class="text-muted"><?= "$numero_salidas / $numero_salidasT"; ?></small>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $resulDivS; ?>%;"></div>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>





                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                    <div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card shadow-sm border-0 rounded-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="card-title text-primary fw-bold mb-0">
            <i class="bi bi-journal-text me-2"></i> Último Registro de Entradas
          </h4>
          <button class="btn btn-outline-primary rounded-pill btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Nuevo
          </button>
        </div>

        <?php
        $sql_entradas2 = "SELECT * FROM entradas ORDER BY Id DESC LIMIT 2";
        $resultado_entradas = mysqli_query($conn, $sql_entradas2);
        ?>

        <ul class="list-group list-group-flush">
          <?php while ($fila = mysqli_fetch_assoc($resultado_entradas)) : ?>
            <li class="list-group-item bg-light rounded-3 mb-2 shadow-sm border-0">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="mb-1 text-dark">
                    <i class="bi bi-file-earmark-text me-2 text-secondary"></i>
                    <?= htmlspecialchars($fila['TipoDoc']) ?>
                  </h6>
                  <small class="text-muted">
                    <i class="bi bi-calendar-check me-1"></i> Fecha: <?= htmlspecialchars($fila['FechaRegistro']) ?>
                  </small>
                </div>
                <span class="badge bg-warning-subtle text-dark fw-semibold px-3 py-2 rounded-pill">
                  Nº <?= htmlspecialchars($fila['NumRegistro']) ?>
                </span>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>

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
                                      <div id="piechart" style="width: 100%; height: 100%;"></div>
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
    <div class="card shadow-sm border-0 rounded-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="card-title text-primary fw-bold mb-0">
            <i class="bi bi-box-arrow-up-right me-2"></i> Últimos Registros de Salida
          </h4>
        </div>

        <?php
        $sql_salida2 = "SELECT * FROM salidas ORDER BY Id DESC LIMIT 2";
        $resultado_salida2 = mysqli_query($conn, $sql_salida2);
        ?>

        <ul class="list-group list-group-flush">
          <?php while ($fila23 = mysqli_fetch_assoc($resultado_salida2)) : ?>
            <li class="list-group-item bg-light rounded-3 mb-2 shadow-sm border-0">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="mb-1 text-dark">
                    <i class="bi bi-file-earmark-arrow-up me-2 text-secondary"></i>
                    <?= htmlspecialchars($fila23['TipoDoc']) ?>
                  </h6>
                  <small class="text-muted">
                    <i class="bi bi-calendar-check me-1"></i> Fecha: <?= htmlspecialchars($fila23['FechaRegistro']) ?>
                  </small>
                </div>
                <span class="badge bg-warning-subtle text-dark fw-semibold px-3 py-2 rounded-pill">
                  Nº <?= htmlspecialchars($fila23['NumRegistro']) ?>
                </span>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>

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