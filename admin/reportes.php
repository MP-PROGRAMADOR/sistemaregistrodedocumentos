<?php

require '../conexion/conexion.php';

$sqlInstituciones = "SELECT departementos.Id AS Codigo, departementos.Nombre AS Departamento, instituciones.Nombre_Corto AS Institucion 
    FROM departementos INNER JOIN instituciones ON departementos.Institucion = instituciones.Id WHERE instituciones.Nombre_Corto != 'TGE';";

$instituciones = $conn->query($sqlInstituciones);

$sqlreferencias = "SELECT * FROM referencias";

$referencias = $conn->query($sqlreferencias);


?>

<?php require "../componentes/head.php"; ?>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require "../componentes/topMenu.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->
        <!-- <div class="theme-setting-wrapper">
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
        </div> -->
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
                            <div class="profile"><img src="../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
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
                            <div class="profile"><img src="../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
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
        <!-- partial:../../partials/_sidebar.html -->


        <?php require "../componentes/sidebarAdmin.php"; ?>


        <!-- partial sidebar final -->
        <div class="main-panel">
            <div class="content-wrapper">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

                <ul class="nav nav-tabs mb-4" id="reportesTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="entradas-tab" data-bs-toggle="tab" data-bs-target="#entradas" type="button" role="tab" aria-controls="entradas" aria-selected="true">
                            <i class="bi bi-box-arrow-in-down me-1"></i> Entradas
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="salidas-tab" data-bs-toggle="tab" data-bs-target="#salidas" type="button" role="tab" aria-controls="salidas" aria-selected="false">
                            <i class="bi bi-box-arrow-up me-1"></i> Salidas
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="decretos-tab" data-bs-toggle="tab" data-bs-target="#decretos" type="button" role="tab" aria-controls="decretos" aria-selected="false">
                            <i class="bi bi-gavel-fill me-1"></i> Decretos
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cheques-tab" data-bs-toggle="tab" data-bs-target="#cheques" type="button" role="tab" aria-controls="cheques" aria-selected="false">
                            <i class="bi bi-receipt-cutoff me-1"></i> Cheques
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pagos-tab" data-bs-toggle="tab" data-bs-target="#pagos" type="button" role="tab" aria-controls="pagos" aria-selected="false">
                            <i class="bi bi-cash-stack me-1"></i> Pagos
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="reportesTabsContent">




                    <?php
                   
                    if (isset($_SESSION['mensaje'])) {
                        $tipo = $_SESSION['tipo_mensaje'] ?? 'info';
                    ?>
                        <div class="alert alert-<?php echo htmlspecialchars($tipo); ?> alert-dismissible fade show" role="alert" id="alert-msg">
                            <?php echo htmlspecialchars($_SESSION['mensaje']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <script>
                            // Espera 5 segundos (5000 ms) y cierra la alerta automáticamente
                            setTimeout(() => {
                                const alert = document.getElementById('alert-msg');
                                if (alert) {
                                    // Bootstrap 5 usa métodos JS para cerrar alerts
                                    let alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                                    alertInstance.close();
                                }
                            }, 5000);
                        </script>
                    <?php
                        unset($_SESSION['mensaje']);
                        unset($_SESSION['tipo_mensaje']);
                    }
                    ?>



                    <div class="tab-pane fade show active" id="entradas" role="tabpanel" aria-labelledby="entradas-tab">
                        <!-- Formulario Entradas -->
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form method="POST" action="../fpdf/entradas_filtro.php" target="_blank" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="fecha_entradas_tab" class="form-label">Por Día</label>
                                        <input type="date" class="form-control" id="fecha_entradas_tab" name="fecha" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mes_entradas_tab" class="form-label">Por Mes</label>
                                        <select id="mes_entradas_tab" name="mes" class="form-select">
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>

                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="ano_entradas_tab" class="form-label">Por Año</label>
                                        <input type="number" min="1900" max="2100" class="form-control" id="ano_entradas_tab" name="ano" placeholder="Ej: 2025" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-warning"><i class="bi bi-printer-fill me-1"></i> Imprimir</button>
                                        <a href="./entradas.php" class="btn btn-danger"><i class="bi bi-x-lg me-1"></i> Cancelar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="salidas" role="tabpanel" aria-labelledby="salidas-tab">
                        <!-- Formulario Salidas -->
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form method="POST" action="../fpdf/salidas_filtro.php" target="_blank" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="fecha_salidas_tab" class="form-label">Por Día</label>
                                        <input type="date" class="form-control" id="fecha_salidas_tab" name="fecha" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mes_salidas_tab" class="form-label">Por Mes</label>
                                        <select id="mes_salidas_tab" name="mes" class="form-select">
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>

                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="ano_salidas_tab" class="form-label">Por Año</label>
                                        <input type="number" min="1900" max="2100" class="form-control" id="ano_salidas_tab" name="ano" placeholder="Ej: 2025" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-warning"><i class="bi bi-printer-fill me-1"></i> Imprimir</button>
                                        <a href="./salidas.php" class="btn btn-danger"><i class="bi bi-x-lg me-1"></i> Cancelar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="decretos" role="tabpanel" aria-labelledby="decretos-tab">
                        <!-- Formulario Decretos -->
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form method="POST" action="../fpdf/decretos_filtro.php" target="_blank" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="fecha_decretos_tab" class="form-label">Por Día</label>
                                        <input type="date" class="form-control" id="fecha_decretos_tab" name="fecha" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mes_decretos_tab" class="form-label">Por Mes</label>
                                        <select id="mes_decretos_tab" name="mes" class="form-select">
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>

                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="ano_decretos_tab" class="form-label">Por Año</label>
                                        <input type="number" min="1900" max="2100" class="form-control" id="ano_decretos_tab" name="ano" placeholder="Ej: 2025" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-warning"><i class="bi bi-printer-fill me-1"></i> Imprimir</button>
                                        <a href="./decretos.php" class="btn btn-danger"><i class="bi bi-x-lg me-1"></i> Cancelar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="cheques" role="tabpanel" aria-labelledby="cheques-tab">
                        <!-- Formulario Cheques -->
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form method="POST" action="../fpdf/cheque_filtro.php" target="_blank" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="fecha_cheques_tab" class="form-label">Por Día</label>
                                        <input type="date" class="form-control" id="fecha_cheques_tab" name="fecha" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mes_cheques_tab" class="form-label">Por Mes</label>
                                        <select id="mes_cheques_tab" name="mes" class="form-select">
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>

                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="ano_cheques_tab" class="form-label">Por Año</label>
                                        <input type="number" min="1900" max="2100" class="form-control" id="ano_cheques_tab" name="ano" placeholder="Ej: 2025" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-warning"><i class="bi bi-printer-fill me-1"></i> Imprimir</button>
                                        <a href="./cheques.php" class="btn btn-danger"><i class="bi bi-x-lg me-1"></i> Cancelar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
                        <!-- Formulario Pagos -->
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form method="POST" action="../fpdf/pago_filtro.php" target="_blank" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="fecha_pagos_tab" class="form-label">Por Día</label>
                                        <input type="date" class="form-control" id="fecha_pagos_tab" name="fecha" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mes_pagos_tab" class="form-label">Por Mes</label>
                                        <select id="mes_pagos_tab" name="mes" class="form-select">
                                            <option value="">--Seleccione--</option>

                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>



                                    </div>
                                    <div class="mb-4">
                                        <label for="ano_pagos_tab" class="form-label">Por Año</label>
                                        <input type="number" min="1900" max="2100" class="form-control" id="ano_pagos_tab" name="ano" placeholder="Ej: 2025" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-warning"><i class="bi bi-printer-fill me-1"></i> Imprimir</button>
                                        <a href="./pagos.php" class="btn btn-danger"><i class="bi bi-x-lg me-1"></i> Cancelar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>





            <script>
                $(document).ready(function() {
                    $("#pf").hide();
                    $("#pj").hide();

                    $(function() {
                        $("#perF").change(function() {
                            if (!$(this).prop('checked')) {
                                $("#pf").hide();
                            } else {
                                $("#pf").show();
                                $("#persFisic").focus();
                                $("#pj").hide();
                            }
                        });
                    });

                    $(function() {
                        $("#perJ").change(function() {
                            if (!$(this).prop('checked')) {
                                $("#pj").hide();
                            } else {
                                $("#pj").show();
                                $("#institucion").focus();
                                $("#pf").hide();
                            }
                        });
                    });


                });
            </script>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <?php require "../componentes/footer.php"; ?>