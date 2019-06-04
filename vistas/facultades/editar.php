<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Facultades/editar/<?= $facultad['id']; ?></span>
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
                    <form action="<?=HOST?>facultades/editar/<?= $facultad['id']; ?>" method="post">
                        <input type="text" name="nombre" class="form-control mb-4" placeholder="Nombre" value="<?=(!empty($facultad["nombre"])? $facultad["nombre"] : '')?>">
                        <input type="text" name="direccion" class="form-control mb-4" placeholder="Dirección" value="<?=(!empty($facultad["direccion"])? $facultad["direccion"] : '')?>">
                        <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" value="<?=(!empty($facultad["email"])? $facultad["email"] : '')?>">
                        <select name="localidad_id" id="localidad-id" class="form-control mb-4" placeholder="E-mail">
                            <?php if(!empty($localidades)): ?>
                                <?php foreach($localidades as $key => $value): ?>
                                    <?php $check = ((!empty($facultad["localidad_id"]) AND ($facultad["localidad_id"] = $key))? 'selected' : '')?>; ?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        <textarea name="descripcion" class="form-control mb-4" rows="3" placeholder="Descripción"><?php if(!empty($facultad["descripcion"])) echo $facultad["descripcion"]; ?></textarea>
                        
                        <button class="btn btn-info float-right my-4" type="submit">Agregar</button>
                    </form>
                </form>
            </div>
        </div>
        <!--/.Card-->
    </div>