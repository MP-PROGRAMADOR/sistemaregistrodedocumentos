<div class="row">
    <div class="col-lg-6 mb-2">



        <!-- Botón para abrir el modal de agregar pago -->
        <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalAgregarPago">
            <i class="bi bi-plus-circle me-2"></i> Añadir Pago
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
                // Consulta con JOIN para traer datos de pagos junto al nombre del banco
                $sqlPagos = "
    SELECT p.*, b.Nombre AS banco_nombre
    FROM pagos p
    LEFT JOIN bancos b ON p.id_banco = b.Id
    ORDER BY p.Id ASC
";

                $pagos = $conn->query($sqlPagos);
                ?>

                <table id="myTable" class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>N. Registro</th>
                            <th>Confin</th>
                            <th>Procedencia</th>
                            <th>N. Documento</th>
                            <th>Banco</th>
                            <th>Beneficiario</th>
                            <th>Importe</th>
                            <th>IVA</th>
                            <th>Fecha Firma</th>
                            <th>Cuenta Tesoro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_pago = $pagos->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row_pago['Id']; ?></td>
                                <td><?= htmlspecialchars($row_pago['n_registro']); ?></td>
                                <td><?= $row_pago['confin']; ?></td>
                                <td><?= htmlspecialchars($row_pago['procedencia']); ?></td>
                                <td><?= htmlspecialchars($row_pago['n_documento']); ?></td>
                                <td><?= htmlspecialchars($row_pago['banco_nombre']); ?></td>
                                <td><?= htmlspecialchars($row_pago['Beneficiario']); ?></td>
                                <td><?= number_format($row_pago['importe'], 0, ',', '.'); ?> XAF</td>
                                <td><?= htmlspecialchars($row_pago['iva']); ?></td>
                                <td><?= $row_pago['fecha_firma']; ?></td>
                                <td><?= htmlspecialchars($row_pago['cuenta_tesoro']); ?></td>
                                <td>
                                    <!-- Aquí podrías añadir botones para ver, editar o eliminar -->

                                    <button
                                        type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditarPago"
                                        onclick="cargarDatosPago(<?= $row_pago['Id'] ?>)">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>


                               
                                    


<button type="button" class="btn btn-primary" title="Ver Pago" onclick="abrirModalPago(<?= $row_pago['Id'] ?>)">
   Ver Detalles Pago
</button>




                                   
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>




            <?php
            // Obtener el próximo ID
            $sqlUltimo = "SELECT MAX(Id) AS ultimo_id FROM pagos";
            $resultUltimo = $conn->query($sqlUltimo);
            $rowUltimo = $resultUltimo->fetch_assoc();
            $proximoId = isset($rowUltimo['ultimo_id']) ? $rowUltimo['ultimo_id'] + 1 : 1;

            // Año actual
            $anioActual = date('Y');
            $numeroRegistro = "{$proximoId}-{$anioActual}";
            ?>

            <!-- Modal para Añadir Pago -->
            <div class="modal fade" id="modalAgregarPago" tabindex="-1" aria-labelledby="modalAgregarPagoLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Cabecera -->
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalAgregarPagoLabel">
                                <i class="bi bi-journal-plus me-2"></i> Añadir Pago - <span class="fw-light">Registro Nº <?= $numeroRegistro ?></span>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <!-- Cuerpo -->
                        <div class="modal-body">
                            <form action="../php/guardar_pago.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="n_registro" value="<?= $numeroRegistro ?>">
                                <div class="row">
                                    <!-- Nº Documento -->
                                    <div class="col-md-6 mb-3">
                                        <label for="n_documento" class="form-label"><i class="bi bi-file-earmark-text me-2"></i> Nº Documento</label>
                                        <input type="text" class="form-control" name="n_documento" id="n_documento" required>
                                    </div>

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
                                        <label for="Beneficiario" class="form-label"><i class="bi bi-person-badge me-2"></i> Beneficiario</label>
                                        <input type="text" class="form-control" name="beneficiario" id="Beneficiario" required>
                                    </div>

                                    <!-- Cuenta Tesoro -->
                                    <div class="col-md-6 mb-3">
                                        <label for="cuenta_tesoro" class="form-label"><i class="bi bi-credit-card-2-front me-2"></i> Cuenta Tesoro</label>
                                        <input type="text" class="form-control" name="cuenta_tesoro" id="cuenta_tesoro" required>
                                    </div>

                                    <!-- Importe -->
                                    <div class="col-md-6 mb-3">
                                        <label for="importe" class="form-label"><i class="bi bi-cash-coin me-2"></i> Importe</label>
                                        <input type="number" class="form-control" name="importe" id="importe" required>
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

                                    <!-- Fecha Firma -->
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha_firma" class="form-label"><i class="bi bi-calendar-check me-2"></i> Fecha de Firma</label>
                                        <input type="date" class="form-control" name="fecha_firma" id="fecha_firma" required>
                                    </div>

                                    <!-- Fecha Entrada Tesorería -->
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha_entrada_tesoreria" class="form-label"><i class="bi bi-calendar-event me-2"></i> Entrada Tesorería</label>
                                        <input type="date" class="form-control" name="fecha_entrada_tesoreria" id="fecha_entrada_tesoreria">
                                    </div>

                                    <!-- Concepto -->
                                    <div class="col-md-12 mb-3">
                                        <label for="Concepto" class="form-label"><i class="bi bi-chat-left-text me-2"></i> Concepto</label>
                                        <textarea class="form-control" name="concepto" id="Concepto" rows="3" required></textarea>
                                    </div>

                                    <!-- Archivo PDF -->
                                    <div class="col-md-12 mb-3">
                                        <label for="Archivo" class="form-label"><i class="bi bi-paperclip me-2"></i> Documento Adjunto (PDF)</label>
                                        <input type="file" class="form-control" name="archivo" id="Archivo" accept=".pdf" required>
                                    </div>

                                </div>

                                <!-- Pie del modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="bi bi-x-circle me-1"></i> Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Guardar Pago
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>






            <!-- Modal Editar Pago -->

            <div class="modal fade" id="modalEditarPago" tabindex="-1" aria-labelledby="modalEditarPagoLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Cabecera -->
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalEditarPagoLabel">
                                <i class="bi bi-pencil-square me-2"></i> Editar Pago - <span id="editarPagoNumeroRegistro" class="fw-light"></span>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <!-- Cuerpo -->
                        <div class="modal-body">
                            <form id="formEditarPago" action="../php/actualizar_pago.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="Id" id="editarPagoId">

                                <div class="row">
                                    <!-- Número de documento -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarNDocumento" class="form-label"><i class="bi bi-file-earmark-text me-2"></i> Nº Documento</label>
                                        <input type="text" class="form-control" name="n_documento" id="editarNDocumento" required>
                                    </div>

                                    <!-- Confin -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarConfin" class="form-label"><i class="bi bi-hash me-2"></i> Nº Confin</label>
                                        <input type="number" class="form-control" name="confin" id="editarConfin" required>
                                    </div>

                                    <!-- Procedencia -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarProcedencia" class="form-label"><i class="bi bi-geo me-2"></i> Procedencia</label>
                                        <select class="form-select" name="procedencia" id="editarProcedencia" required>
                                            <option value="" disabled>Seleccione</option>
                                            <option value="PR">PR</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>

                                    <!-- Banco -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarIdBanco" class="form-label"><i class="bi bi-bank2 me-2"></i> Banco</label>
                                        <select class="form-select" name="id_banco" id="editarIdBanco" required>
                                            <option value="" disabled>Seleccione un banco</option>
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
                                        <label for="editarBeneficiario" class="form-label"><i class="bi bi-person-badge me-2"></i> Beneficiario</label>
                                        <input type="text" class="form-control" name="Beneficiario" id="editarBeneficiario" required>
                                    </div>

                                    <!-- Cuenta Tesoro -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarCuentaTesoro" class="form-label"><i class="bi bi-wallet2 me-2"></i> Cuenta Tesoro</label>
                                        <input type="text" class="form-control" name="cuenta_tesoro" id="editarCuentaTesoro" required>
                                    </div>

                                    <!-- Importe -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarImporte" class="form-label"><i class="bi bi-currency-dollar me-2"></i> Importe</label>
                                        <input type="number" class="form-control" name="importe" id="editarImporte" required>
                                    </div>

                                    <!-- IVA -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarIva" class="form-label"><i class="bi bi-percent me-2"></i> IVA</label>
                                        <select class="form-select" name="iva" id="editarIva" required>
                                            <option value="" disabled>Seleccione</option>
                                            <option value="CON">CON</option>
                                            <option value="SIN">SIN</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                    <!-- Fecha Firma -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarFechaFirma" class="form-label"><i class="bi bi-calendar-date me-2"></i> Fecha Firma</label>
                                        <input type="date" class="form-control" name="fecha_firma" id="editarFechaFirma" required>
                                    </div>


                                    <!-- Concepto -->
                                    <div class="col-md-12 mb-3">
                                        <label for="editarConcepto" class="form-label"><i class="bi bi-chat-text me-2"></i> Concepto</label>
                                        <textarea class="form-control" name="Concepto" id="editarConcepto" rows="3" required></textarea>
                                    </div>

                                    <!-- Fecha Entrada Banco -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarFechaEntradaBanco" class="form-label"><i class="bi bi-bank me-2"></i> Fecha Entrada Banco</label>
                                        <input type="date" class="form-control" name="fecha_entrada_banco" id="editarFechaEntradaBanco" required>
                                    </div>

                                    <!-- Fecha Entrega -->
                                    <div class="col-md-6 mb-3">
                                        <label for="editarFechaEntrega" class="form-label"><i class="bi bi-truck me-2"></i> Fecha Entrega</label>
                                        <input type="date" class="form-control" name="fecha_entrega" id="editarFechaEntrega" required>
                                    </div>

                                    <!-- Documento Adjunto -->
                                    <div class="col-md-12 mb-3">
                                        <label for="editarArchivo" class="form-label"><i class="bi bi-paperclip me-2"></i> Documento Adjunto (PDF)</label>
                                        <input type="file" class="form-control" name="archivo" id="editarArchivo" accept=".pdf">
                                        <small class="text-muted">Si no selecciona ningún archivo, se mantendrá el actual.</small>
                                    </div>
                                </div>

                                <!-- Pie del modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="bi bi-x-circle me-1"></i> Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Guardar Cambios
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Modal del Cheque -->
            <!-- Modal Mostrar Pago como Tarjeta -->
   <!-- Modal -->
<div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="modalPagoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">

      <div class="modal-header bg-primary text-white rounded-top">
        <h5 class="modal-title" id="modalPagoLabel">
          <i class="bi bi-credit-card-2-front me-2"></i> Detalles del Pago
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <div class="card border-primary shadow-sm">
          <div class="card-body">

            <div class="row mb-3">
              <div class="col-md-6">
                <h6><i class="bi bi-hash me-2 text-primary"></i> Nº Registro:</h6>
                <p class="fw-bold" id="p_n_registro">Cargando...</p>
              </div>
              <div class="col-md-6">
                <h6><i class="bi bi-file-earmark-text me-2 text-primary"></i> Nº Documento:</h6>
                <p class="fw-bold" id="p_n_documento">Cargando...</p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <h6><i class="bi bi-hash me-2 text-primary"></i> Nº Confin:</h6>
                <p class="fw-bold" id="p_confin">Cargando...</p>
              </div>
              <div class="col-md-6">
                <h6><i class="bi bi-geo me-2 text-primary"></i> Procedencia:</h6>
                <p class="fw-bold" id="p_procedencia">Cargando...</p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <h6><i class="bi bi-bank2 me-2 text-primary"></i> Banco:</h6>
                <p class="fw-bold" id="p_banco">Cargando...</p>
              </div>
              <div class="col-md-6">
                <h6><i class="bi bi-person-badge me-2 text-primary"></i> Beneficiario:</h6>
                <p class="fw-bold" id="p_beneficiario">Cargando...</p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <h6><i class="bi bi-wallet2 me-2 text-primary"></i> Cuenta Tesoro:</h6>
                <p class="fw-bold" id="p_cuenta_tesoro">Cargando...</p>
              </div>
              <div class="col-md-6">
                <h6><i class="bi bi-currency-dollar me-2 text-primary"></i> Importe:</h6>
                <p class="fw-bold text-success" id="p_importe">Cargando...</p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <h6><i class="bi bi-percent me-2 text-primary"></i> IVA:</h6>
                <p class="fw-bold" id="p_iva">Cargando...</p>
              </div>
              <div class="col-md-6">
                <h6><i class="bi bi-calendar-date me-2 text-primary"></i> Fecha Firma:</h6>
                <p class="fw-bold" id="p_fecha_firma">Cargando...</p>
              </div>
            </div>

            <div class="mb-3">
              <h6><i class="bi bi-chat-text me-2 text-primary"></i> Concepto:</h6>
              <p class="fw-bold" id="p_concepto">Cargando...</p>
            </div>

            <div>
              <h6><i class="bi bi-paperclip me-2 text-primary"></i> Documento Adjunto:</h6>
              <a href="#" target="_blank" class="btn btn-outline-primary btn-sm" id="p_documento_link">
                <i class="bi bi-file-earmark-pdf"></i> Ver PDF
              </a>
            </div>

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-1"></i> Cerrar
        </button>
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
                function cargarDatosPago(idPago) {
                    fetch(`../php/obtener_pago.php?id=${idPago}`)
                        .then(response => response.json())
                        .then(pago => {
                            if (!pago) {
                                alert('No se encontró el pago.');
                                return;
                            }

                            document.getElementById('editarPagoId').value = pago.Id;
                            document.getElementById('editarPagoNumeroRegistro').textContent = pago.n_registro || '';
                            document.getElementById('editarNDocumento').value = pago.n_documento || '';
                            document.getElementById('editarConfin').value = pago.confin || '';
                            document.getElementById('editarProcedencia').value = pago.procedencia || '';
                            document.getElementById('editarIdBanco').value = pago.id_banco || '';
                            document.getElementById('editarBeneficiario').value = pago.Beneficiario || '';
                            document.getElementById('editarCuentaTesoro').value = pago.cuenta_tesoro || '';
                            document.getElementById('editarImporte').value = pago.importe || '';
                            document.getElementById('editarIva').value = pago.iva || '';
                            document.getElementById('editarFechaFirma').value = pago.fecha_firma || '';
                            document.getElementById('editarFechaEntradaBanco').value = pago.fecha_entrada_banco || '';
                            document.getElementById('editarFechaEntrega').value = pago.fecha_entrega || '';
                            document.getElementById('editarConcepto').value = pago.Concepto || '';
                        })
                        .catch(error => {
                            console.error('Error al obtener datos del pago:', error);
                            alert('Error al cargar los datos del pago.');
                        });
                }
            </script>

            <script>
               function mostrarPago(data) {
  console.log("Cargando datos del pago:", data);

  // Carga datos en el modal (ejemplo de campos)
  document.getElementById('modalNRegistro').textContent = data.n_registro || '';
  document.getElementById('modalNDocumento').textContent = data.n_documento || '';
  document.getElementById('modalConfin').textContent = data.confin || '';
  document.getElementById('modalProcedencia').textContent = data.procedencia || '';
  document.getElementById('modalBanco').textContent = data.banco_nombre || '';
  document.getElementById('modalBeneficiario').textContent = data.beneficiario || '';
  document.getElementById('modalCuentaTesoro').textContent = data.cuenta_tesoro || '';
  document.getElementById('modalImporte').textContent = data.importe ? new Intl.NumberFormat('es-ES').format(data.importe) + ' XAF' : '';
  document.getElementById('modalIva').textContent = data.iva || '';
  document.getElementById('modalFechaFirma').textContent = data.fecha_firma || '';
  document.getElementById('modalConcepto').textContent = data.concepto || '';
  if(data.archivo){
    document.getElementById('modalArchivo').innerHTML = `<a href="../documentos/pagos/${data.archivo}" target="_blank" class="btn btn-outline-primary btn-sm"><i class="bi bi-file-earmark-pdf"></i> Ver Documento PDF</a>`;
  } else {
    document.getElementById('modalArchivo').innerHTML = '';
  }

  // Abrir modal usando Bootstrap 5 JS API
  const modalElement = document.getElementById('modalPago');
  const modalBootstrap = new bootstrap.Modal(modalElement);
  modalBootstrap.show();
}

            </script>

            <script>

                function abrirModalPago(idPago) {
  console.log('Abriendo modal para pago ID:', idPago);

  // Mostrar el modal
  var modalPago = new bootstrap.Modal(document.getElementById('modalPago'));
  modalPago.show();

  // Mostrar texto "Cargando..." mientras se obtiene info
  const campos = ['n_registro', 'n_documento', 'confin', 'procedencia', 'banco', 'beneficiario', 'cuenta_tesoro', 'importe', 'iva', 'fecha_firma', 'concepto', 'documento_link'];
  campos.forEach(campo => {
    const elem = document.getElementById('p_' + campo);
    if (elem) {
      if(campo === 'documento_link'){
        elem.href = '#';
        elem.textContent = 'Cargando...';
      } else {
        elem.textContent = 'Cargando...';
      }
    }
  });

  // Realizar petición AJAX (fetch API)
  fetch('../php/obtener_pago_t.php?id=' + idPago)
    .then(response => response.json())
    .then(data => {
      console.log('Datos recibidos:', data);

      if(data.success){
        document.getElementById('p_n_registro').textContent = data.pago.n_registro;
        document.getElementById('p_n_documento').textContent = data.pago.n_documento;
        document.getElementById('p_confin').textContent = data.pago.confin;
        document.getElementById('p_procedencia').textContent = data.pago.procedencia;
        document.getElementById('p_banco').textContent = data.pago.banco_nombre || 'N/A';
        document.getElementById('p_beneficiario').textContent = data.pago.Beneficiario;
        document.getElementById('p_cuenta_tesoro').textContent = data.pago.cuenta_tesoro;
        document.getElementById('p_importe').textContent = new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'XAF' }).format(data.pago.importe);
        document.getElementById('p_iva').textContent = data.pago.iva;
        document.getElementById('p_fecha_firma').textContent = data.pago.fecha_firma;
        document.getElementById('p_concepto').textContent = data.pago.Concepto;

        // Documento adjunto
        const enlace = document.getElementById('p_documento_link');
        if(data.pago.Archivo){
          enlace.href = '../documentos/pagos/' + data.pago.Archivo;
          enlace.textContent = 'Ver PDF';
          enlace.classList.remove('disabled');
        } else {
          enlace.href = '#';
          enlace.textContent = 'No hay documento';
          enlace.classList.add('disabled');
        }
      } else {
        alert('No se encontró el pago.');
        // Cerrar modal si no hay datos
        modalPago.hide();
      }
    })
    .catch(error => {
      console.error('Error al obtener los datos:', error);
      alert('Error al obtener los datos del pago.');
      modalPago.hide();
    });
}
            </script>