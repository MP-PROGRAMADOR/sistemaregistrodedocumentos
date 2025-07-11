<?php
// trabajar aqui ahora
require "../componentes/head.php";
$codEntrada = $_GET['id'];
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
              $qEntrada = "SELECT * FROM entradas WHERE entradas.Id = '$codEntrada'";
              $resulEntrada = mysqli_query($conn, $qEntrada);
              $Entrada = mysqli_fetch_array($resulEntrada);
              ?>
              <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <div>
                  <div class="btn-wrapper">
                    <!-- <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Imprimir</a> -->
                  </div>
                </div>
              </div>
              <?php
              $qDecreto = "SELECT decretos.Descripcion, decretos.Fecha, decretos.Archivo FROM decretos INNER JOIN entradas ON decretos.DocEntrada = entradas.Id WHERE entradas.Id = '$codEntrada'";
              $resul = mysqli_query($conn, $qDecreto);
              $numDecre = mysqli_num_rows($resul);

              $qDestino = "SELECT destino.Miembro FROM destino INNER JOIN decretos ON destino.Decreto = decretos.Id WHERE decretos.DocEntrada ='$codEntrada' GROUP BY(destino.Miembro)";
              $resulDes = mysqli_query($conn, $qDestino);
              $numDest = mysqli_num_rows($resulDes);
              ?>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">

                 <div class="row gy-3 mb-2">
  <div class="col-12 col-md-6 col-lg-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm">
      <i class="bi bi-journal-check fs-2 text-primary"></i>
      <div>
        <small class="text-muted text-uppercase fw-semibold">Nº de Registro</small>
        <h5 class="mb-0 fw-bold"><?php echo htmlspecialchars($Entrada['NumRegistro']); ?></h5>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm">
      <i class="bi bi-calendar-event fs-2 text-success"></i>
      <div>
        <small class="text-muted text-uppercase fw-semibold">Fecha de Registro</small>
        <h5 class="mb-0 fw-bold"><?php echo htmlspecialchars($Entrada['FechaRegistro']); ?></h5>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm">
      <i class="bi bi-currency-exchange fs-2 text-warning"></i>
      <div>
        <small class="text-muted text-uppercase fw-semibold">Importe</small>
        <h5 class="mb-0 fw-bold"><?php echo number_format($Entrada['Importe'], 2); ?> XAF</h5>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm">
      <i class="bi bi-file-earmark-text fs-2 text-info"></i>
      <div>
        <small class="text-muted text-uppercase fw-semibold">Nº Decretos</small>
        <h5 class="mb-0 fw-bold"><?php echo (int)$numDecre; ?></h5>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm">
      <i class="bi bi-geo-alt fs-2 text-danger"></i>
      <div>
        <small class="text-muted text-uppercase fw-semibold">Nº Destinos</small>
        <h5 class="mb-0 fw-bold"><?php echo (int)$numDest; ?></h5>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm">
      <i class="bi bi-bookmark-check fs-2 text-secondary"></i>
      <div>
        <small class="text-muted text-uppercase fw-semibold">Referencia</small>
        <h5 class="mb-0 fw-bold">
          <?php
            $codeRefe = $Entrada['Referencia'];
            $qRef = "SELECT Codigo FROM referencias WHERE Id = '$codeRefe' LIMIT 1";
            $resulRef = mysqli_query($conn, $qRef);
            $ref = mysqli_fetch_assoc($resulRef);
            echo htmlspecialchars($ref['Codigo'] ?? 'N/A');
          ?>
        </h5>
      </div>
    </div>
  </div>
</div>
                  
                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">

                     

                    <?php
// Consultas previas más limpias y con alias para evitar nombres duplicados
$qUsuario = "SELECT usuarios.Nombre FROM usuarios INNER JOIN entradas ON entradas.Usuario = usuarios.Id WHERE entradas.Id = '$codEntrada' LIMIT 1";
$resulUsuario = mysqli_query($conn, $qUsuario);
$Usuario = mysqli_fetch_assoc($resulUsuario);

$qInstitucion = "SELECT departementos.Nombre AS DepNombre, departementos.Institucion, proviene.Seccion 
    FROM departementos 
    INNER JOIN proviene ON departementos.Id = proviene.Seccion 
    WHERE proviene.Entrada ='$codEntrada' LIMIT 1";
$resulInsti = mysqli_query($conn, $qInstitucion);
$datoInst = mysqli_fetch_assoc($resulInsti);
$filas = mysqli_num_rows($resulInsti);

if ($filas == 0) {
    $qPF = "SELECT NombreCompleto FROM personafisica WHERE Entrada = '$codEntrada' LIMIT 1";
    $resulPF = mysqli_query($conn, $qPF);
    $DatoPF = mysqli_fetch_assoc($resulPF);
} else {
    $codeInst = $datoInst['Institucion'];
    $qInt = "SELECT Nombre, Nombre_Corto FROM instituciones WHERE Id = '$codeInst' LIMIT 1";
    $resulInst = mysqli_query($conn, $qInt);
    $instiNom = mysqli_fetch_assoc($resulInst);
}
?>

<div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
          <div>
            <h4 class="card-title fw-bold mb-1">
              <i class="bi bi-person-circle me-2 text-primary"></i> Entrada realizado por: <span class="text-secondary"><?php echo htmlspecialchars($Usuario['Nombre']); ?></span>
            </h4>
            <p class="card-subtitle text-muted">
              Tipo de Documento: <strong><?php echo htmlspecialchars($Entrada['TipoDoc']); ?></strong>
            </p>
          </div>
          <div>
            <a href="../documentos/entradas/<?php echo urlencode($Entrada['Archivo']); ?>" download="Entrada-<?php echo htmlspecialchars($Entrada['NumRegistro']); ?>" class="btn btn-outline-primary" title="Descargar archivo">
              <i class="bi bi-download"></i> Descargar
            </a>
          </div>
        </div>

        <hr>

        <div class="mt-3">
          <h5 class="fw-semibold mb-2">Descripción del documento</h5>
          <p class="text-justify text-muted"><?php echo nl2br(htmlspecialchars($Entrada['Descripcion'])); ?></p>
        </div>

        <div class="mt-4 border-top pt-3">
          <h5 class="fw-semibold mb-3">Procedencia</h5>
          <?php if ($filas == 0) : ?>
            <p><i class="bi bi-geo-alt-fill text-success me-2"></i><strong><?php echo htmlspecialchars($DatoPF['NombreCompleto']); ?></strong></p>
          <?php else: ?>
            <p><i class="bi bi-building text-warning me-2"></i><strong><?php echo htmlspecialchars($instiNom['Nombre'] . ' / ' . $instiNom['Nombre_Corto']); ?></strong></p>
          <?php endif; ?>

          <p><i class="bi bi-file-earmark-check-fill text-info me-2"></i><strong>Fecha de Firma:</strong> <?php echo htmlspecialchars($Entrada['FechaFirma']); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>



                      <!-- fin del cuadro de entradas -->
                     <?php
// Consulta decretos vinculados a la entrada
$qDecreto = "SELECT decretos.Descripcion, decretos.Fecha, decretos.Archivo 
             FROM decretos 
             INNER JOIN entradas ON decretos.DocEntrada = entradas.Id 
             WHERE entradas.Id = '$codEntrada'";
$resul = mysqli_query($conn, $qDecreto);
$numDecre = mysqli_num_rows($resul);
?>

<div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
          <div>
            <h4 class="card-title fw-bold mb-0">Decretos de la entrada</h4>
            <small class="text-muted">Esta entrada tiene <strong><?php echo $numDecre; ?></strong> decreto<?php echo $numDecre !== 1 ? 's' : ''; ?></small>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-light text-uppercase small">
              <tr>
                <th scope="col">Descripción</th>
                <th scope="col" style="width: 140px;">Fecha</th>
                <th scope="col" style="width: 180px;">Archivo</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($decreto = mysqli_fetch_assoc($resul)) : ?>
                <tr>
                  <td class="text-break"><?php echo htmlspecialchars($decreto['Descripcion']); ?></td>
                  <td><?php echo date("d/m/Y", strtotime($decreto['Fecha'])); ?></td>
                  <td>
                    <div class="d-flex align-items-center gap-3">
                      <a href="../documentos/decretos/<?php echo urlencode($decreto['Archivo']); ?>" 
                         download="Decreto-Entrada-<?php echo htmlspecialchars($decreto['Archivo']); ?>" 
                         class="btn btn-sm btn-outline-primary" 
                         title="Descargar archivo">
                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                      </a>
                      <span class="text-truncate" style="max-width: 120px;" title="<?php echo htmlspecialchars($decreto['Archivo']); ?>">
                        <?php echo htmlspecialchars($decreto['Archivo']); ?>
                      </span>
                    </div>
                  </td>
                </tr>
              <?php endwhile; ?>
              <?php if ($numDecre === 0): ?>
                <tr>
                  <td colspan="3" class="text-center text-muted fst-italic">No hay decretos asociados a esta entrada.</td>
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
                          <div class="card card-rounded">
                            <div class="card-body">

                            
                            <?php
// Consulta miembros intervenidos
$qIdMiembro = "SELECT destino.Miembro FROM destino 
               INNER JOIN decretos ON destino.Decreto = decretos.Id 
               WHERE decretos.DocEntrada = '$codEntrada' 
               GROUP BY destino.Miembro";
$resulIdMiembros = mysqli_query($conn, $qIdMiembro);

// Consulta personas físicas intervenidas
$qIdPersonas = "SELECT personafisica.NombreCompleto FROM personafisica 
                INNER JOIN decretos ON personafisica.Decreto = decretos.Id 
                WHERE decretos.DocEntrada = '$codEntrada' 
                GROUP BY personafisica.NombreCompleto";
$resulIdPersonas = mysqli_query($conn, $qIdPersonas);
?>

<div class="row">
  <div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
      <h4 class="card-title fw-bold mb-2">Miembros Intervenidos</h4>
      <!-- Aquí puedes agregar botones u otros controles si lo deseas -->
    </div>

    <ul class="list-group mb-4 shadow-sm rounded">
      <?php if (mysqli_num_rows($resulIdMiembros) > 0): ?>
        <?php while ($filaMiembro = mysqli_fetch_assoc($resulIdMiembros)): 
          $codMiem = $filaMiembro['Miembro'];
          $qMiem = "SELECT Nombre FROM miembros WHERE Id = '$codMiem'";
          $ResultMiem = mysqli_query($conn, $qMiem);
          $miembro = mysqli_fetch_assoc($ResultMiem);
        ?>
          <li class="list-group-item d-flex align-items-center gap-3">
            <i class="bi bi-person-badge-fill text-primary fs-5"></i>
            <span class="flex-grow-1"><?php echo htmlspecialchars($miembro['Nombre']); ?></span>
          </li>
        <?php endwhile; ?>
      <?php else: ?>
        <li class="list-group-item text-muted fst-italic">No hay miembros intervenidos.</li>
      <?php endif; ?>
    </ul>

    <h4 class="card-title fw-bold mb-3">Personas Físicas Intervenidas</h4>
    <ul class="list-group shadow-sm rounded">
      <?php if (mysqli_num_rows($resulIdPersonas) > 0): ?>
        <?php while ($filaPersona = mysqli_fetch_assoc($resulIdPersonas)): ?>
          <li class="list-group-item d-flex align-items-center gap-3">
            <i class="bi bi-person-fill text-success fs-5"></i>
            <span class="flex-grow-1"><?php echo htmlspecialchars($filaPersona['NombreCompleto']); ?></span>
          </li>
        <?php endwhile; ?>
      <?php else: ?>
        <li class="list-group-item text-muted fst-italic">No hay personas físicas intervenidas.</li>
      <?php endif; ?>
    </ul>
  </div>
</div>



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