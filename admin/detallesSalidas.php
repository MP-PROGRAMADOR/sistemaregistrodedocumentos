<?php
// trabajar aqui ahora
require "../componentes/head.php";
$codSalida = $_GET['id'];
?>
<div class="container-scroller">

  <!-- partial:partials/_navbar.html -->
  <?php require "../componentes/topMenu.php"; ?>
  <!-- partial -->
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
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <?php
              $qSalida = "SELECT * FROM salidas WHERE salidas.Id = '$codSalida'";
              $resulSalida = mysqli_query($conn, $qSalida);
              $Salida = mysqli_fetch_array($resulSalida);
              ?>
              <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <div>
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Imprimir</a>
                  </div>
                </div>
              </div>
              <?php
              $qCantDesIns = "SELECT ir.Seccion FROM ir INNER JOIN salidas ON ir.Salida = salidas.Id WHERE salidas.Id  = '$codSalida'";
              $resulCan = mysqli_query($conn, $qCantDesIns);
              $CantInsti = mysqli_num_rows($resulCan);

              $qDestino = "SELECT personafisica.NombreCompleto FROM personafisica INNER JOIN salidas ON personafisica.Salida = salidas.Id WHERE salidas.Id = '$codSalida'";
              $resulDes = mysqli_query($conn, $qDestino);
              $numDest = mysqli_num_rows($resulDes);
              ?>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                
                <div class="row">
  <div class="col-12 mb-2">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-4 p-3 bg-light rounded shadow-sm">
      
      <div class="d-flex align-items-center gap-2">
        <i class="bi bi-card-checklist text-primary fs-3"></i>
        <div>
          <p class="mb-1 text-muted small fw-semibold">Nº de Registro</p>
          <h4 class="mb-0 fw-bold"><?php echo htmlspecialchars($Salida['NumRegistro']); ?></h4>
        </div>
      </div>

      <div class="d-flex align-items-center gap-2">
        <i class="bi bi-calendar-event text-success fs-3"></i>
        <div>
          <p class="mb-1 text-muted small fw-semibold">Fecha de Registro</p>
          <h4 class="mb-0 fw-bold"><?php echo htmlspecialchars($Salida['FechaRegistro']); ?></h4>
        </div>
      </div>

      <div class="d-flex align-items-center gap-2">
        <i class="bi bi-currency-exchange text-warning fs-3"></i>
        <div>
          <p class="mb-1 text-muted small fw-semibold">Importe</p>
          <h4 class="mb-0 fw-bold"><?php echo number_format($Salida['Importe'], 2, ',', '.'); ?> XAF</h4>
        </div>
      </div>

      <div class="d-none d-md-flex align-items-center gap-2">
        <i class="bi bi-building text-info fs-3"></i>
        <div>
          <p class="mb-1 text-muted small fw-semibold">Nº Destinos Instituciones</p>
          <h4 class="mb-0 fw-bold"><?php echo (int)$CantInsti; ?></h4>
        </div>
      </div>

      <div class="d-none d-md-flex align-items-center gap-2">
        <i class="bi bi-people text-secondary fs-3"></i>
        <div>
          <p class="mb-1 text-muted small fw-semibold">Nº Destinos Personas Físicas</p>
          <h4 class="mb-0 fw-bold"><?php echo (int)$numDest; ?></h4>
        </div>
      </div>

      <div class="d-none d-md-flex align-items-center gap-2">
        <i class="bi bi-link-45deg text-danger fs-3"></i>
        <div>
          <p class="mb-1 text-muted small fw-semibold">Referencia</p>
          <?php
          $codeRefe = $Salida['Referencia'];
          $qRef = "SELECT * FROM referencias WHERE Id = '$codeRefe'";
          $resulRef = mysqli_query($conn, $qRef);
          $ref = mysqli_fetch_array($resulRef);
          ?>
          <h4 class="mb-0 fw-bold"><?php echo htmlspecialchars($ref['Codigo']); ?></h4>
        </div>
      </div>

    </div>
  </div>
</div>


                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                      

<div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded shadow-sm">
      <div class="card-body">
        <?php
        $qUsuario = "SELECT usuarios.Nombre FROM usuarios INNER JOIN salidas ON salidas.Usuario = usuarios.Id WHERE salidas.Id = '$codSalida'";
        $resulUsuario = mysqli_query($conn, $qUsuario);
        $Usuario = mysqli_fetch_array($resulUsuario);

        $qInstitucion = "SELECT departementos.Nombre, departementos.Institucion, ir.Seccion 
                         FROM departementos INNER JOIN ir ON departementos.Id = ir.Seccion WHERE ir.Salida ='$codSalida'";
        $resulInsti = mysqli_query($conn, $qInstitucion);
        $filas = mysqli_num_rows($resulInsti);
        $datoInst = mysqli_fetch_array($resulInsti);
        ?>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
          <div>
            <h4 class="card-title mb-1">Salida realizada por: <span class="text-primary"><?php echo htmlspecialchars($Usuario['Nombre']); ?></span></h4>
            <p class="text-muted mb-2">Tipo de Documento: <strong><?php echo htmlspecialchars($Salida['TipoDoc']); ?></strong></p>
            <a title="Descargar archivo" 
               href="../documentos/salidas/<?php echo urlencode($Salida['Archivo']); ?>" 
               download="Salida-<?php echo htmlspecialchars($Salida['NumRegistro']); ?>" 
               class="btn btn-outline-primary btn-sm">
               <i class="bi bi-download me-1"></i> Descargar Archivo
            </a>
          </div>
          <div class="text-md-end">
            <?php if ($filas > 0): ?>
              <p class="mb-0"><strong>Procedencia:</strong> <?php echo htmlspecialchars($datoInst['Nombre'] . ' / ' . $datoInst['Institucion']); ?></p>
            <?php else: ?>
              <p class="mb-0 text-muted fst-italic">Procedencia no disponible</p>
            <?php endif; ?>
          </div>
        </div>

        <hr>

        <div class="mt-3">
          <h5 class="fw-semibold mb-2">Descripción del Documento</h5>
          <p class="text-secondary"><?php echo nl2br(htmlspecialchars($Salida['Descripcion'])); ?></p>
        </div>

        <div class="mt-4">
          <h6 class="text-muted">Fecha Firma</h6>
          <p class="fw-bold"><?php echo htmlspecialchars($Salida['FechaFirma']); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

                      <!-- fin del cuadro de entradas -->
                      <div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded shadow-sm">
      <div class="card-body">

        <?php
        // Obtener destinos institucionales y las instituciones relacionadas en una sola consulta para optimizar
        $qDestinos = "
          SELECT d.Nombre AS NomDpto, i.Nombre AS NomInst 
          FROM ir AS ir
          INNER JOIN departementos AS d ON d.Id = ir.Seccion
          INNER JOIN instituciones AS i ON i.Id = d.Institucion
          WHERE ir.Salida = '$codSalida'
        ";
        $resul = mysqli_query($conn, $qDestinos);
        $numDestinos = mysqli_num_rows($resul);
        ?>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title">
            <i class="bi bi-building me-2"></i>Destinos Institucionales
          </h4>
          <span class="badge bg-primary fs-6">
            <?php echo $numDestinos; ?> Destinos
          </span>
        </div>

        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th><i class="bi bi-bank me-1"></i>Institución</th>
                <th><i class="bi bi-diagram-3 me-1"></i>Sección</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($numDestinos > 0): ?>
                <?php while ($fila = mysqli_fetch_assoc($resul)): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($fila['NomInst']); ?></td>
                    <td><?php echo htmlspecialchars($fila['NomDpto']); ?></td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="2" class="text-center text-muted">No se encontraron destinos institucionales.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
                      <!-- fin de  los decretos -->

                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                     <div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title">
            <i class="bi bi-person-badge-fill me-2"></i>Destinos Personas Físicas
          </h4>
          <span class="badge bg-primary fs-6">
            <?php echo mysqli_num_rows($resulMiem ?? mysqli_query($conn, "SELECT personafisica.NombreCompleto FROM personafisica INNER JOIN salidas ON personafisica.Salida = salidas.Id WHERE salidas.Id ='$codSalida'")); ?> Personas
          </span>
        </div>

        <?php
          // Consulta optimizada y segura
          if (!isset($resulMiem)) {
            $query = "SELECT NombreCompleto FROM personafisica WHERE Salida = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $codSalida);
            $stmt->execute();
            $resulMiem = $stmt->get_result();
          }
        ?>

        <?php if ($resulMiem && $resulMiem->num_rows > 0): ?>
          <ul class="list-group list-group-flush rounded">
            <?php while ($row = $resulMiem->fetch_assoc()): ?>
              <li class="list-group-item d-flex align-items-center">
                <i class="bi bi-person-circle text-info fs-4 me-3"></i>
                <span class="text-truncate"><?php echo htmlspecialchars($row['NombreCompleto']); ?></span>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php else: ?>
          <div class="alert alert-warning mb-0" role="alert">
            No se encontraron destinos para personas físicas en esta salida.
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


                      <div class="row flex-grow">

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