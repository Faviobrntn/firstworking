<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Carreras/editar/<?= $carrera['id']; ?></span>
        </h4>

        <div class="d-flex justify-content-center">
            <a href="<?=HOST?>facultades" class="btn btn-dark btn-sm my-0 p">
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
                Editar
            </div>

            <!--Card content-->
            <div class="card-body">
                <div class="text-center p-3">
                    <form action="<?=HOST?>carreras/editar/<?= $carrera['id']; ?>" method="post">
                        <input type="text" name="nombre" class="form-control mb-4" placeholder="Nombre" value="<?=(!empty($carrera["nombre"])? $carrera["nombre"] : '')?>">
                        <select name="facultad_id" id="localidad-id" class="form-control mb-4">
                            <?php if(!empty($facultades)): ?>
                                <?php foreach($facultades as $key => $value): ?>
                                    <?php $check = ((!empty($carrera["facultad_id"]) AND ($carrera["facultad_id"] = $key))? 'selected' : '')?>; ?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        <textarea name="descripcion" class="form-control mb-4" rows="3" placeholder="Descripción"><?php if(!empty($carrera["descripcion"])) echo $carrera["descripcion"]; ?></textarea>
                        
                        <button class="btn btn-info float-right my-4" type="submit">Agregar</button>
                    </form>
                </form>
            </div>
        </div>
        <!--/.Card-->
    </div>