<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Ofertas/alta</span>
        </h4>

        <div class="d-flex justify-content-center">
            <a href="<?=HOST?>ofertas" class="btn btn-dark btn-sm my-0 p">
                Volver
            </a>
        </div>

    </div>

</div>
<!-- Heading -->

<div class="row wow fadeIn">

    <div class="col-md-6 mb-4">
        <!--Card-->
        <div class="card">
            <div class="card-header text-center">
                Alta
            </div>

            <!--Card content-->
            <div class="card-body">
                <div class="text-center p-3">
                    <form action="<?=HOST?>ofertas/alta" method="post">
                        <input type="text" name="titulo" class="form-control mb-4" placeholder="Titulo" value="<?=(!empty($_POST["titulo"])? $_POST["titulo"] : '')?>">
                        <input type="text" name="modalidad" class="form-control mb-4" placeholder="Modalidad" value="<?=(!empty($_POST["modalidad"])? $_POST["modalidad"] : '')?>">
                        <input type="text" name="horario_laboral" class="form-control mb-4" placeholder="Horario laboral" value="<?=(!empty($_POST["horario_laboral"])? $_POST["horario_laboral"] : '')?>">
                        <input type="number" name="remuneracion" class="form-control mb-4" placeholder="Remuneracion" value="<?=(!empty($_POST["remuneracion"])? $_POST["remuneracion"] : '')?>">
                        <select name="localidad_id" id="localidad-id" class="form-control mb-4">
                            <option value="">Seleccione localidad</option>
                            <?php if(!empty($localidades)): ?>
                                <?php foreach($localidades as $key => $value): ?>
                                    <?php $check = ((!empty($_POST["localidad_id"]) AND ($_POST["localidad_id"] = $key))? 'selected' : '')?>; ?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        <select name="carrera_id" id="carrera-id" class="form-control mb-4">
                            <option value="">Seleccione Carrera</option>
                            <?php if(!empty($carreras)): ?>
                                <?php foreach($carreras as $key => $value): ?>
                                    <?php $check = ((!empty($_POST["carrera_id"]) AND ($_POST["carrera_id"] = $key))? 'selected' : '')?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        <textarea name="descripcion" class="form-control mb-4" rows="3" placeholder="Descripción"><?php if(!empty($_POST["descripcion"])) echo $_POST["descripcion"]; ?></textarea>
                        
                        <button class="btn btn-info float-right my-4" type="submit">Agregar</button>
                    </form>
                </form>
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>