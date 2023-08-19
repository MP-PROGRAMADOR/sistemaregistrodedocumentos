<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">FORMULARIO DE REGISTRO</h4>
            <form class="forms-sample" method="POST" action="../php/guardar_decreto.php">
                
                <div class="form-group">
                    <label for="ckeditor">Descripción del Decreto</label>
                    <textarea name="descripcion" id="ckeditor" class="form-control ckeditor" id="" cols="30" rows="15" placeholder="Descripcion del documento"></textarea>                    
                </div>
                <div class="form-group">
                    <label for="archivo">Selecciona el Documento</label>
                    <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Ejemplo solicitud de...">
                </div>
                <div class="form-group">
                    <label for="entradaDoc"> Entrada...</label>
                    <select class="form-control" aria-label=".form-select-lg example" id="entradaDoc" name="entradaDoc" required>
                        <option selected value="">seleccione el numero de registro del documento de entrada.....</option>
                        <?php while ($entradas = mysqli_fetch_array($ResultEntradas)) { ?>
                            <option value="<?php echo $entradas['Id']; ?>"><?php echo $entradas['NumRegistro']." / ".$entradas['TipoDoc']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary me-2">GUARDAR</button>
                <a href="./entradas.php" class="btn btn-light">CANCELAR</a>
            </form>
        </div>
    </div>
</div>