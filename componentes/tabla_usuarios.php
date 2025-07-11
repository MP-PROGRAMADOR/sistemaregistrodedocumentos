<div class="row">
    <div class="col-lg-6 mb-2">
         <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'SUPERUSUARIO'): ?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistroUsuario">
            Registrar Usuario
        </button>
         <?php endif; ?>
    </div>
</div>



<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'insertado') {
?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> su registro ha tenido Exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>

<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado') {
?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> su Actualizacion ha tenido Exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>

<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> ERROR!</strong> Hubo un error.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>


<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> Su Registro se ha Eliminado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>



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
                <table id="myTable" class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE DE USUARIO</th>
                            <th>DEPARTAMENTO</th>
                            <th>TIPO USUARIO</th>
                            <th>ESTADO</th>
                            <th>FOTO</th>
                            <th>EDITAR</th>
                            <th>ACTIVAR / DESACTIVAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $pacientes->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['Id']; ?></td>
                                <td><?= $row['Nombre']; ?></td>
                                <td><?= $row['NombreDepartamento'] ?? 'Desconocido'; ?></td>

                                <?php
                                // Tipo de usuario
                                switch ($row['Tipo_Usuario']) {
                                    case 'ADMINISTRADOR':
                                        $tipo_usuario = 'Administrador';
                                        $clase_badge = 'bg-danger';
                                        break;
                                    case 'SUPERUSUARIO':
                                        $tipo_usuario = 'Superusuario';
                                        $clase_badge = 'bg-warning text-dark';
                                        break;
                                    default:
                                        $tipo_usuario = 'Usuario normal';
                                        $clase_badge = 'bg-secondary';
                                }

                                // Estado del usuario
                                $activo = $row['activo'];
                                $estado = $activo ? 'Activo' : 'Inactivo';
                                $estado_badge = $activo ? 'bg-success' : 'bg-dark';
                                ?>

                                <td><span class="badge <?= $clase_badge; ?>"><?= $tipo_usuario; ?></span></td>
                                <td><span class="badge <?= $estado_badge; ?>"><?= $estado; ?></span></td>
                                <td>
                                    <img src="data:image/*;base64,<?= base64_encode($row['Foto']); ?>" alt="Foto" class="rounded-circle" height="50">
                                </td>
                                <td>
                                     <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'SUPERUSUARIO'): ?>
                                    <button class="btn btn-warning btn-sm"
                                        onclick="abrirModalEditar(
    <?= $row['Id']; ?>,
    '<?= addslashes($row['Nombre']); ?>',
    '<?= $row['Tipo_Usuario']; ?>',
    <?= $row['activo']; ?>,
    <?= $row['Dpto']; ?>,
    '<?= base64_encode($row['Foto']); ?>'
  )">
                                        <i class="bi bi-pencil-square me-1"></i> Editar
                                    </button>
                                     <?php endif; ?>


                                </td>
                                <td>
                                     <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'SUPERUSUARIO'): ?>
                                    <button
                                        class="btn btn-sm <?= $activo ? 'btn-danger' : 'btn-success'; ?>"
                                        onclick="mostrarModalConfirmacion(<?= $row['Id']; ?>, <?= $activo ? 0 : 1; ?>, '<?= $row['Nombre']; ?>')">
                                        <i class="bi <?= $activo ? 'bi-person-dash-fill' : 'bi-person-check-fill'; ?>"></i>
                                        <?= $activo ? 'Desactivar' : 'Activar'; ?>
                                    </button>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>







<!-- Botón para abrir el modal -->

<?php

require '../conexion/conexion.php';

$sqlDepartamentos = " SELECT * FROM departementos";

$departamentos1 = $conn->query($sqlDepartamentos);
$departamentos2 = $conn->query($sqlDepartamentos);


?>



<!-- Modal editar usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
           <form method="POST" action="../php/actualizar_usuarios.php" enctype="multipart/form-data" autocomplete="off">

                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalEditarUsuarioLabel">
                        <i class="bi bi-person-lines-fill me-2"></i> Editar Acceso del Usuario
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_usuario" id="edit_id_usuario">

                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label"><i class="bi bi-person-fill me-1"></i> Nombre de Usuario</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_password" class="form-label"><i class="bi bi-shield-lock-fill me-1"></i> Nueva Contraseña</label>
                        <input type="password" class="form-control"  name="password" placeholder="(Dejar en blanco para no cambiar la Contraseña)" autocomplete="new-password">
                       
                    </div>

                    <div class="mb-3">
                        <label for="edit_tipo_usuario" class="form-label"><i class="bi bi-person-badge-fill me-1"></i> Tipo de Usuario</label>
                        <select class="form-select" id="edit_tipo_usuario" name="tipo_usuario" required>
                            <option value="USUARIO">Usuario normal</option>
                            <option value="ADMINISTRADOR">Administrador</option>
                            <option value="SUPERUSUARIO">Superusuario</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_departamento" class="form-label"><i class="bi bi-building me-1"></i> Departamento</label>
                        <select class="form-select" id="edit_departamento" name="departamento" required>
                            <!-- Opciones cargadas dinámicamente con PHP -->
                            <?php
                            // Asumiendo que $departamentos1 tiene el listado
                            while ($dpto = mysqli_fetch_array($departamentos1)) {
                                echo "<option value=\"{$dpto['Id']}\">{$dpto['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_foto" class="form-label"><i class="bi bi-camera-fill me-1"></i> Foto</label>
                        <input type="file" class="form-control" id="edit_foto" name="archivo" accept="image/*" onchange="previewEditFoto(event)">
                        <img id="previewEditFoto" src="" alt="Previsualización" class="img-fluid mt-2 rounded" style="max-height:150px; display:none;">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="edit_activo" name="activo" value="1">
                        <label class="form-check-label" for="edit_activo"><i class="bi bi-toggle-on me-1"></i> Usuario Activo</label>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save2-fill me-1"></i> Guardar Cambios
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill me-1"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="modalRegistroUsuario" tabindex="-1" aria-labelledby="modalRegistroUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4">
            <form method="POST" action="../php/guardar_usuarios.php" enctype="multipart/form-data">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title d-flex align-items-center" id="modalRegistroUsuarioLabel">
                        <i class="bi bi-person-lines-fill me-2"></i> Formulario de Registro de Usuario
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="nombre" class="form-label"><i class="bi bi-person-fill me-1"></i>Nombre de Usuario</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: jdoe" required>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label"><i class="bi bi-shield-lock-fill me-1"></i>Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="******" required>
                        </div>

                        <div class="col-md-6">
                            <label for="Tipo_Usuario" class="form-label"><i class="bi bi-person-badge-fill me-1"></i>Tipo de Usuario</label>
                            <select name="Tipo_Usuario" id="Tipo_Usuario" class="form-select" required>
                                <option value="">Selecciona...</option>
                                <option value="ADMINISTRADOR">Administrador</option>
                                <option value="USUARIO">Usuario</option>
                                <option value="SUPERUSUARIO">Superusuario</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="departamento" class="form-label"><i class="bi bi-building me-1"></i>Departamento</label>
                            <select class="form-select" id="departamento" name="departamento" required>
                                <option value="">Seleccione una institución...</option>
                                <?php while ($departamentos = mysqli_fetch_array($departamentos2)) { ?>
                                    <option value="<?php echo $departamentos['Id']; ?>"><?php echo $departamentos['Nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="archivo" class="form-label"><i class="bi bi-camera-fill me-1"></i>Foto</label>
                            <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*" onchange="previewImagenUsuario(event)" required>
                            <div class="mt-2">
                                <img id="previewImagen" src="https://via.placeholder.com/120x120.png?text=Foto" alt="Previsualización" class="img-thumbnail" width="120">
                            </div>
                        </div>

                        <div class="col-md-6 d-flex align-items-center mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="estado" name="estado" value="1" checked>
                                <label class="form-check-label" for="estado"><i class="bi bi-toggle-on me-1"></i>Usuario Activo</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer rounded-bottom-4 bg-light">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save2-fill me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill me-1"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal de confirmación -->
<div class="modal fade" id="confirmarEstadoModal" tabindex="-1" aria-labelledby="confirmarEstadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title d-flex align-items-center" id="confirmarEstadoModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Confirmación de acción
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-center">
                <p id="mensajeConfirmacion" class="fs-5">¿Estás seguro que deseas continuar?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle-fill me-1"></i> Cancelar
                </button>
                <button type="button" class="btn btn-primary" id="confirmarBtn">
                    <i class="bi bi-check-circle-fill me-1"></i> Sí, continuar
                </button>
            </div>
        </div>
    </div>
</div>





<script>
    // Mostrar previsualización de la imagen seleccionada
    function previewEditFoto(event) {
        const input = event.target;
        const preview = document.getElementById('previewEditFoto');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }

    // Rellenar modal con datos, incluyendo foto
    function abrirModalEditar(id, nombre, tipo, activo, departamentoId, fotoBase64) {
        document.getElementById('edit_id_usuario').value = id;
        document.getElementById('edit_nombre').value = nombre;
        document.getElementById('edit_tipo_usuario').value = tipo;
        document.getElementById('edit_activo').checked = activo == 1;
        document.getElementById('edit_departamento').value = departamentoId;

        const preview = document.getElementById('previewEditFoto');
        if (fotoBase64) {
            preview.src = 'data:image/*;base64,' + fotoBase64;
            preview.style.display = 'block';
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }

        new bootstrap.Modal(document.getElementById('modalEditarUsuario')).show();
    }
</script>




<script>
    // agregar datos al formulario
    function agregarForm(datos) {
        var d = datos.split('||');
        // alert("los datos son: "+d);
        // return false;
        $('#Id').val(d[0]);

    }
</script>

<script>
    function previewImagenUsuario(event) {
        const input = event.target;
        const preview = document.getElementById('previewImagen');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = 'https://via.placeholder.com/120x120.png?text=Foto';
        }
    }
</script>

<script>
    let usuarioId = null;
    let nuevoEstado = null;

    function mostrarModalConfirmacion(id, estado, nombre) {
        usuarioId = id;
        nuevoEstado = estado;

        const accion = estado === 1 ? 'activar' : 'desactivar';
        const mensaje = `¿Estás seguro de que deseas <strong>${accion}</strong> al usuario <strong>${nombre}</strong>?`;

        document.getElementById('mensajeConfirmacion').innerHTML = mensaje;
        const modal = new bootstrap.Modal(document.getElementById('confirmarEstadoModal'));
        modal.show();
    }

    document.getElementById('confirmarBtn').addEventListener('click', () => {
        // Crear y enviar el formulario dinámicamente
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '../php/cambiar_estado_usuario.php';

        const inputId = document.createElement('input');
        inputId.type = 'hidden';
        inputId.name = 'id_usuario';
        inputId.value = usuarioId;

        const inputEstado = document.createElement('input');
        inputEstado.type = 'hidden';
        inputEstado.name = 'nuevo_estado';
        inputEstado.value = nuevoEstado;

        form.appendChild(inputId);
        form.appendChild(inputEstado);
        document.body.appendChild(form);
        form.submit();
    });
</script>


<script>
    function abrirModalEditar(id, nombre, tipo, activo) {
        document.getElementById('edit_id_usuario').value = id;
        document.getElementById('edit_nombre').value = nombre;
        document.getElementById('edit_tipo_usuario').value = tipo;
        document.getElementById('edit_activo').checked = activo == 1;

        new bootstrap.Modal(document.getElementById('modalEditarUsuario')).show();
    }
</script>