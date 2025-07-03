<div class="row">
    <div class="col-lg-6 mb-2">



        <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalAgregarCheque">
            <i class="bi bi-plus-circle me-2"></i>
        </button>


      
    </div>
</div>










<div class="col-lg-12 grid-margin stretch-card">


    <?php


    if (isset($_SESSION['mensaje'])): ?>
        <div id="alertaMensaje" class="alert alert-<?= $_SESSION['mensaje_tipo'] ?> alert-dismissible fade show" role="alert" style="position: fixed; top: 1rem; right: 1rem; z-index: 1055;">
            <?= htmlspecialchars($_SESSION['mensaje']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
        <script>
            // Ocultar mensaje después de 5 segundos
            setTimeout(() => {
                const alerta = document.getElementById('alertaMensaje');
                if (alerta) {
                    // Bootstrap 5 alert dispose
                    let alert = bootstrap.Alert.getOrCreateInstance(alerta);
                    alert.close();
                }
            }, 5000);
        </script>
    <?php
        unset($_SESSION['mensaje'], $_SESSION['mensaje_tipo']);
    endif;
    ?>


    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <?php


                // Consulta con JOIN para traer datos de cheques junto al nombre del banco
                $sqlEntradas = "
    SELECT c.*, b.Nombre AS banco_nombre
    FROM cheques c
    LEFT JOIN bancos b ON c.id_banco = b.Id
    ORDER BY c.id ASC
";

                $entradas = $conn->query($sqlEntradas);
                ?>

                <table id="myTable" class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Confin</th>
                            <th>Procedencia</th>
                            <th>R. Documento</th>
                            <th>Banco</th>
                            <th>Beneficiario</th>
                            <th>Importe</th>
                            <th>IVA</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Firma</th>
                            <th>Fecha Retirada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php while ($row_entradas = $entradas->fetch_assoc()) { ?>
        <tr>
            <td><?= $row_entradas['id']; ?></td>
            <td><?= $row_entradas['confin']; ?></td>
            <td><?= htmlspecialchars($row_entradas['procedencia']); ?></td>
            <td><?= $row_entradas['r_documento']; ?></td>
            <td><?= htmlspecialchars($row_entradas['banco_nombre']); ?></td>
            <td><?= htmlspecialchars($row_entradas['beneficiario']); ?></td>
            <td><?= number_format($row_entradas['importe'], 0, ',', '.'); ?> XAF</td>
            <td><?= htmlspecialchars($row_entradas['iva']); ?></td>
            <td><?= $row_entradas['fecha_entrada']; ?></td>
            <td><?= $row_entradas['fecha_firma']; ?></td>
            <td><?= $row_entradas['fecha_retirada']; ?></td>
            <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editChequeModal" onclick="cargarDatosCheque(<?= $row_entradas['id']; ?>)">
                    <i class="bi bi-pencil-square me-2"></i>
                </button>

                <?php if (!empty($row_entradas['fecha_retirada']) && !empty($row_entradas['quien_retira'])): ?>
                    <button class="btn btn-primary btn-sm verChequeBtn" data-id="<?= $row_entradas['id']; ?>">
                        <i class="bi bi-credit-card-2-front"></i> Ver Detalles
                    </button>
                <?php endif; ?>

               
            </td>
        </tr>
    <?php } ?>
</tbody>

                </table>

            </div>




            <!-- Modal -->
            <!-- Modal para Añadir Cheque -->
            <?php


            // Obtener el próximo ID
            $sqlUltimo = "SELECT MAX(id) AS ultimo_id FROM cheques";
            $resultUltimo = $conn->query($sqlUltimo);
            $rowUltimo = $resultUltimo->fetch_assoc();
            $proximoId = isset($rowUltimo['ultimo_id']) ? $rowUltimo['ultimo_id'] + 1 : 1;

            // Año actual
            $anioActual = date('Y');

            // Número de registro formateado
            $numeroRegistro = "{$proximoId}-{$anioActual}";
            ?>

            <!-- Modal para Añadir Cheque -->
            <div class="modal fade" id="modalAgregarCheque" tabindex="-1" aria-labelledby="modalAgregarChequeLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Cabecera -->
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalAgregarChequeLabel">
                                <i class="bi bi-journal-plus me-2"></i> Añadir Cheque - <span class="fw-light">Registro Nº <?= $numeroRegistro ?></span>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <!-- Cuerpo -->
                        <div class="modal-body">
                            <form action="../php/guardar_cheque.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="numero_registro" value="<?= $numeroRegistro ?>">
                                    <!-- Confin -->
                                    <div class="col-md-6 mb-3">
                                        <label for="confin" class="form-label"><i class="bi bi-hash me-2"></i> Nº Confin</label>
                                        <input type="number" class="form-control" name="confin" id="confin" required>
                                    </div>

                                    <!-- Procedencia -->
                                    <div class="col-md-6 mb-3">
                                        <label for="procedencia" class="form-label"><i class="bi bi-geo me-2"></i> Procedencia</label>
                                        <select class="form-select" name="procedencia" id="procedencia" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            <option value="PR">PR</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>

                                    <!-- R. Documento -->
                                    <div class="col-md-6 mb-3">
                                        <label for="r_documento" class="form-label"><i class="bi bi-file-earmark-text me-2"></i> Nº Documento</label>
                                        <input type="text" class="form-control" name="r_documento" id="r_documento" required>
                                    </div>

                                    <!-- Banco -->
                                    <div class="col-md-6 mb-3">
                                        <label for="id_banco" class="form-label"><i class="bi bi-bank2 me-2"></i> Banco</label>
                                        <select class="form-select" name="id_banco" id="id_banco" required>
                                            <option value="" selected disabled>Seleccione un banco</option>
                                            <?php
                                            $sqlBancos = "SELECT Id, Nombre FROM bancos ORDER BY Nombre ASC";
                                            $resultBancos = $conn->query($sqlBancos);
                                            while ($banco = $resultBancos->fetch_assoc()):
                                            ?>
                                                <option value="<?= $banco['Id'] ?>"><?= htmlspecialchars($banco['Nombre']) ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <!-- Beneficiario -->
                                    <div class="col-md-6 mb-3">
                                        <label for="beneficiario" class="form-label"><i class="bi bi-person-badge me-2"></i> Beneficiario</label>
                                        <input type="text" class="form-control" name="beneficiario" id="beneficiario" required>
                                    </div>

                                    <!-- Importe -->
                                    <div class="col-md-6 mb-3">
                                        <label for="importe" class="form-label"><i class="bi bi-currency-dollar me-2"></i> Importe</label>
                                        <input type="number" class="form-control" name="importe" id="importe" required>
                                    </div>

                                    <!-- Concepto -->
                                    <div class="col-md-12 mb-3">
                                        <label for="concepto" class="form-label"><i class="bi bi-chat-text me-2"></i> Concepto</label>
                                        <textarea class="form-control" name="concepto" id="concepto" rows="3" required></textarea>
                                    </div>

                                    <!-- IVA -->
                                    <div class="col-md-6 mb-3">
                                        <label for="iva" class="form-label"><i class="bi bi-percent me-2"></i> IVA</label>
                                        <select class="form-select" name="iva" id="iva" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            <option value="CON">CON</option>
                                            <option value="SIN">SIN</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                    <!-- Fecha de Entrada -->
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha_entrada" class="form-label"><i class="bi bi-calendar-date me-2"></i> Fecha de Entrada</label>
                                        <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada" required>
                                    </div>

                                    <!-- Archivo Adjunto -->
                                    <div class="col-md-12 mb-3">
                                        <label for="archivo" class="form-label"><i class="bi bi-paperclip me-2"></i> Documento Adjunto (PDF)</label>
                                        <input type="file" class="form-control" name="archivo" id="archivo" accept=".pdf" required>
                                    </div>
                                </div>

                                <!-- Pie del modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="bi bi-x-circle me-1"></i> Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Guardar Cheque
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <!-- Modal Editar Cheque -->
            <!-- Modal Editar Cheque Moderno con Número de Registro -->
            <div class="modal fade" id="editChequeModal" tabindex="-1" aria-labelledby="editChequeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0 shadow-sm">
                        <form id="formEditarCheque" method="POST" action="../php/actualizar_cheque.php" enctype="multipart/form-data" class="p-3">
                            <div class="modal-header" style="background-color: #2c3e50; color: #ecf0f1;">
                                <div>
                                    <h5 class="modal-title d-flex align-items-center" id="editChequeModalLabel">
                                        <i class="bi bi-pencil-square me-2"></i>Editar Cheque
                                    </h5>
                                    <small>Número de registro: <span id="edit_numero_registro" class="fw-bold"></span></small>
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="edit_id">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="edit_confin" class="form-label">
                                            <i class="bi bi-hash me-1"></i>Confin
                                        </label>
                                        <input type="number" class="form-control" id="edit_confin" name="confin" placeholder="Confin" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_procedencia" class="form-label">
                                            <i class="bi bi-box-arrow-in-down-right me-1"></i>Procedencia
                                        </label>
                                        <select class="form-select" id="edit_procedencia" name="procedencia" required>
                                            <option value="PR">PR</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_r_documento" class="form-label">
                                            <i class="bi bi-file-earmark-text me-1"></i>R. Documento
                                        </label>
                                        <input type="text" class="form-control" id="edit_r_documento" name="r_documento" placeholder="Número documento" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_id_banco" class="form-label">
                                            <i class="bi bi-bank me-1"></i>Banco
                                        </label>
                                        <select class="form-select" id="edit_id_banco" name="id_banco" required>
                                            <!-- Opciones llenadas por PHP -->
                                            <?php
                                            $bancos = $conn->query("SELECT Id, Nombre FROM bancos ORDER BY Nombre ASC");
                                            while ($banco = $bancos->fetch_assoc()) {
                                                echo '<option value="' . $banco['Id'] . '">' . htmlspecialchars($banco['Nombre']) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_beneficiario" class="form-label">
                                            <i class="bi bi-person me-1"></i>Beneficiario
                                        </label>
                                        <input type="text" class="form-control" id="edit_beneficiario" name="beneficiario" placeholder="Nombre beneficiario" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_importe" class="form-label">
                                            <i class="bi bi-currency-dollar me-1"></i>Importe
                                        </label>
                                        <input type="number" class="form-control" id="edit_importe" name="importe" placeholder="Importe" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="edit_concepto" class="form-label">
                                            <i class="bi bi-journal-text me-1"></i>Concepto
                                        </label>
                                        <textarea class="form-control" id="edit_concepto" name="concepto" rows="3" placeholder="Descripción del concepto" required></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_iva" class="form-label">
                                            <i class="bi bi-percent me-1"></i>IVA
                                        </label>
                                        <select class="form-select" id="edit_iva" name="iva" required>
                                            <option value="CON">CON</option>
                                            <option value="SIN">SIN</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_fecha_entrada" class="form-label">
                                            <i class="bi bi-calendar-event me-1"></i>Fecha Entrada
                                        </label>
                                        <input type="date" class="form-control" id="edit_fecha_entrada" name="fecha_entrada" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_fecha_firma" class="form-label">
                                            <i class="bi bi-pencil-square me-1"></i>Fecha Firma
                                        </label>
                                        <input type="date" class="form-control" id="edit_fecha_firma" name="fecha_firma">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_fecha_retirada" class="form-label">
                                            <i class="bi bi-box-arrow-up-right me-1"></i>Fecha Retirada
                                        </label>
                                        <input type="date" class="form-control" id="edit_fecha_retirada" name="fecha_retirada">
                                    </div>

                                    <div class="col-12">
                                        <label for="edit_quien_retira" class="form-label">
                                            <i class="bi bi-person-check me-1"></i>Quién Retira
                                        </label>
                                        <input type="text" class="form-control" id="edit_quien_retira" name="quien_retira" placeholder="Nombre de la persona que retira">
                                    </div>

                                    <div class="col-12">
                                        <label for="edit_archivo" class="form-label">
                                            <i class="bi bi-file-earmark-pdf me-1"></i>Archivo PDF
                                        </label>
                                        <input type="file" class="form-control" id="edit_archivo" name="archivo" accept="application/pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-3">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle me-1"></i> Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i> Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal del Cheque -->
            <!-- Modal -->
            <!-- Modal vacío -->
            <div class="modal fade" id="chequeModal" tabindex="-1" aria-labelledby="chequeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content shadow-lg rounded-4 border-0">
                        <div class="modal-header bg-primary text-white rounded-top-4">
                            <h5 class="modal-title d-flex align-items-center gap-2" id="chequeModalLabel">
                                <i class="bi bi-card-checklist"></i> Detalles del Cheque
                                <span id="modalRegistroNumero" class="badge bg-light text-info fw-bold ms-2"></span>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body p-4 bg-light" id="modalChequeBody">
                            <!-- Aquí se cargará el contenido AJAX -->
                            <div class="text-center">
                                <div class="spinner-border text-info" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                                <p>Cargando datos...</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


            <?php include '../admin/ModaleliminarInstitucion.php'    ?>



            <script>
                $('#tablaEntrada').DataTable();
            </script>


            <script>
                // boton eliminar codigo del modal..

                // agregar datos al formulario
                function agregarForm(datos) {
                    var d = datos.split('||');
                    // alert("los datos son: "+d);
                    // return false;
                    $('#Id').val(d[0]);

                }
            </script>

            <script>
                function cargarDatosCheque(id) {
                    fetch(`../php/obtener_cheque.php?id=${id}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Rellenar los campos del formulario con los datos recibidos
                                document.getElementById('edit_id').value = data.cheque.id;
                                document.getElementById('edit_confin').value = data.cheque.confin;
                                document.getElementById('edit_procedencia').value = data.cheque.procedencia;
                                document.getElementById('edit_r_documento').value = data.cheque.r_documento;
                                document.getElementById('edit_id_banco').value = data.cheque.id_banco;
                                document.getElementById('edit_beneficiario').value = data.cheque.beneficiario;
                                document.getElementById('edit_importe').value = data.cheque.importe;
                                document.getElementById('edit_concepto').value = data.cheque.concepto;
                                document.getElementById('edit_iva').value = data.cheque.iva;
                                document.getElementById('edit_fecha_entrada').value = data.cheque.fecha_entrada;
                                document.getElementById('edit_fecha_firma').value = data.cheque.fecha_firma;
                                document.getElementById('edit_fecha_retirada').value = data.cheque.fecha_retirada;
                                document.getElementById('edit_quien_retira').value = data.cheque.quien_retira;
                                let añoActual = new Date().getFullYear();
                                document.getElementById('edit_numero_registro').textContent = `${data.cheque.id}-${añoActual}`;
                            } else {
                                alert("Error al cargar datos del cheque");
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert("Error en la conexión al servidor");
                        });
                }
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const chequeModal = new bootstrap.Modal(document.getElementById('chequeModal'));
                    const modalBody = document.getElementById('modalChequeBody');
                    const modalRegistroNumero = document.getElementById('modalRegistroNumero');

                    document.querySelectorAll('.verChequeBtn').forEach(button => {
                        button.addEventListener('click', () => {
                            const chequeId = button.getAttribute('data-id');

                            modalBody.innerHTML = `
                <div class="text-center">
                    <div class="spinner-border text-info" role="status">
                      <span class="visually-hidden">Cargando...</span>
                    </div>
                    <p>Cargando datos...</p>
                </div>
            `;
                            modalRegistroNumero.textContent = '';

                            chequeModal.show();

                            fetch(`../php/ajax_get_cheque.php?id=${chequeId}`)
                                .then(response => {
                                    if (!response.ok) throw new Error('Error en la respuesta AJAX');
                                    return response.json();
                                })
                                .then(data => {
                                    if (data.error) {
                                        modalBody.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                                        return;
                                    }

                                    modalRegistroNumero.textContent = data.n_registro;

                                    modalBody.innerHTML = `
                        <div class="card border-primary shadow-sm">
                            <div class="card-body">
                                <h6 class="text-primary mb-3 fw-semibold">Número de Registro: ${data.n_registro}</h6>
                                <div class="row g-3">
                                    <div class="col-md-6"><i class="bi bi-hash me-2 text-primary"></i><strong>ID:</strong> ${data.id}</div>
                                    <div class="col-md-6"><i class="bi bi-box-seam me-2 text-primary"></i><strong>Confin:</strong> ${data.confin}</div>
                                    <div class="col-md-6"><i class="bi bi-flag me-2 text-primary"></i><strong>Procedencia:</strong> ${data.procedencia}</div>
                                    <div class="col-md-6"><i class="bi bi-file-text me-2 text-primary"></i><strong>R. Documento:</strong> ${data.r_documento}</div>
                                    <div class="col-md-6"><i class="bi bi-bank me-2 text-primary"></i><strong>Banco:</strong> ${data.banco_nombre}</div>
                                    <div class="col-md-6"><i class="bi bi-person me-2 text-primary"></i><strong>Beneficiario:</strong> ${data.beneficiario}</div>
                                    <div class="col-md-6"><i class="bi bi-cash-stack me-2 text-primary"></i><strong>Importe:</strong> ${data.importe_formateado} XAF</div>
                                    <div class="col-md-6"><i class="bi bi-percent me-2 text-primary"></i><strong>IVA:</strong> ${data.iva}</div>
                                    <div class="col-12"><i class="bi bi-card-text me-2 text-primary"></i><strong>Concepto:</strong><p class="mb-0 text-wrap">${data.concepto_html}</p></div>
                                    <hr class="my-3">
                                    <div class="col-md-4"><i class="bi bi-calendar-event me-2 text-primary"></i><strong>Fecha Entrada:</strong> ${data.fecha_entrada}</div>
                                    <div class="col-md-4"><i class="bi bi-calendar-check me-2 text-primary"></i><strong>Fecha Firma:</strong> ${data.fecha_firma}</div>
                                    <div class="col-md-4"><i class="bi bi-calendar-x me-2 text-primary"></i><strong>Fecha Retirada:</strong> ${data.fecha_retirada}</div>
                                    <div class="col-md-12"><i class="bi bi-person-badge me-2 text-primary"></i><strong>Quién Retira:</strong> ${data.quien_retira}</div>
                                    <div class="col-md-12 mt-3">
                                        <i class="bi bi-file-earmark-pdf me-2 text-primary"></i><strong>Archivo:</strong>
                                        ${data.archivo_url ? `<a href="${data.archivo_url}" target="_blank" class="btn btn-outline-primary btn-sm"><i class="bi bi-file-earmark-pdf-fill me-1"></i> Ver PDF</a>` : `<span class="text-muted">Sin archivo</span>`}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                                })
                                .catch(error => {
                                    modalBody.innerHTML = `<div class="alert alert-danger">Error al cargar los datos.</div>`;
                                    console.error(error);
                                });
                        });
                    });
                });
            </script>