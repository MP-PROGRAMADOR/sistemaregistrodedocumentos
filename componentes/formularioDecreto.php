<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">FORMULARIO DE REGISTRO</h4>
            <form class="forms-sample" method="POST" action="../php/guardar_decreto.php">

                <div class="form-group">
                    <label for="ckeditor">Descripción del Decreto</label>
                    <textarea name="descripcion" id="ckeditor" class="form-control ckeditor" id="" cols="30" rows="15" placeholder="Descripcion del documento"></textarea>
                </div>
                <?php
                $queryMiembros = "SELECT * FROM miembros";
                $ResultMiembros = $conn->query($queryMiembros);
                ?>
                    <label for="miembro">Miembros</label>
                <?php while ($miembros = mysqli_fetch_array($ResultMiembros)) { ?>
                    <div class="form-group">                       
                        <input type="checkbox" id="miembro<?php echo $miembros['Id']; ?>" name="miembro[]" value="<?php echo $miembros['Id']; ?>">
                        <label for="miembro<?php echo $miembros['Id']; ?>"><?php echo $miembros['Nombre']; ?></label>
                    </div>
                <?php } ?>
                    
                <div class="form-group">
                    <label for="archivo">Selecciona el Documento</label>
                    <input type="file" class="form-control" id="archivo" name="archivo">
                </div>
                <div class="form-group">
                    <label for="entradaDoc"> Entrada...</label>
                    <select class="form-control" aria-label=".form-select-lg example" id="entradaDoc" name="entradaDoc" required>
                        <option selected value="">seleccione el numero de registro del documento de entrada.....</option>
                        <?php while ($entradas = mysqli_fetch_array($ResultEntradas)) { ?>
                            <option value="<?php echo $entradas['Id']; ?>"><?php echo $entradas['NumRegistro'] . " / " . $entradas['TipoDoc']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary me-2">GUARDAR</button>
                <a href="./entradas.php" class="btn btn-light">CANCELAR</a>
            </form>
        </div>
    </div>
</div>