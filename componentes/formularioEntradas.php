<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">FORMULARIO DE REGISTRO DE ENTRADAS</h4>
            <form class="forms-sample" method="POST" action="../php/guardar_entradas.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="TipoDoc">Tipo de Documento</label>
                    <input type="text" class="form-control" id="TipoDoc" name="TipoDoc" placeholder="Ejemplo carta...">
                </div>
                <div class="form-group">
                    <label for="ckeditor">Descripción</label>
                    <textarea name="descripcion" id="ckeditor" class="form-control ckeditor" id="" cols="30" rows="15" placeholder="Descripcion del documento"></textarea>
                </div>
                <div class="form-group">
                    <label for="palabrasClaves">Palabras Claves del Documento</label>
                    <input type="text" class="form-control" id="palabrasClaves" name="palabrasClaves" placeholder="Ejemplo solicitud de...">
                </div>
                <div class="form-group">
                    <label for="fechaFirma">¿Cuando de Firmo el documento?</label>
                    <input type="date" class="form-control" id="fechaFirma" name="fechaFirma" placeholder="Ejemplo solicitud de...">
                </div>
                <div class="form-group">
                    <label for="importe">Importe</label>
                    <input type="text" class="form-control" id="importe" name="importe" placeholder="Ejemplo 1.000.000">
                </div>
                <div class="form-group" id="">
                    <label for="institucion"> Seleccione la Referencia</label>
                    <select class="form-control" aria-label=".form-select-lg example" id="ref" name="ref">
                        <option selected value="">seleccione una referencia.....</option>
                        <?php while ($referencia = mysqli_fetch_array($referencias)) { ?>
                            <option value="<?php echo $referencia['Id']; ?>"><?php echo $referencia['Codigo']." / ".$referencia['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="archivo">Selecciona el Documento</label>
                    <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Ejemplo solicitud de...">
                </div>
                <label for="institucion"> Procede de una...</label>
                <div class="form-group">
                    <label class="form-check-label">
                        <input class="checkbox" name="procede" type="radio" id="perF" value="pf"> Persona Física<i class="input-helper rounded"></i>
                    </label>
                </div>
                <div class="form-group">
                    <label class="form-check-label">
                        <input class="checkbox" name="procede" type="radio"  id="perJ" value="pj"> Persona Jurídica<i class="input-helper rounded"></i>
                    </label>
                </div>

                <div class="form-group" id="pf">
                    <label for="importe">Nombre Completo de la Persona</label>
                    <input type="text" class="form-control" id="persFisic" name="persFisic" placeholder="Ingrese el nombre completo de la persona">
                </div>
                <div class="form-group" id="pj">
                    <label for="institucion"> Seleccione la Institucion</label>
                    <select class="form-control" aria-label=".form-select-lg example" id="institucion" name="institucion">
                        <option selected value="">seleccione una Institucion.....</option>
                        <?php while ($institucion = mysqli_fetch_array($instituciones)) { ?>
                            <option value="<?php echo $institucion['Codigo']; ?>"><?php echo $institucion['Institucion']."/".$institucion['Departamento']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary me-2">GUARDAR</button>
                <a href="./entradas.php" class="btn btn-light">CANCELAR</a>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $("#pf").hide();
       $("#pj").hide();

       $(function (){
        $("#perF").change(function(){
            if (!$(this).prop('checked')) {
                $("#pf").hide();
            }else{
                $("#pf").show();
                $("#pj").hide();
            }
        });
       });

       $(function (){
        $("#perJ").change(function(){
            if (!$(this).prop('checked')) {
                $("#pj").hide();
            }else{
                $("#pj").show();
                $("#pf").hide();
            }
        });
       });
     

    });
</script>