<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Localidades</span>
        </h4>

        <form class="d-flex justify-content-center">
            <!-- Default input -->
            <input type="search" name="search" placeholder="Buscar" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
                <i class="fas fa-search"></i>
            </button>

        </form>

    </div>

</div>
<!-- Heading -->

<div class="row wow fadeIn">

    <div class="col-md-3 mb-4">
        <!--Card-->
        <div class="card">
            <div class="card-header text-center">
                Alta
            </div>

            <!--Card content-->
            <div class="card-body">
                <form class="text-center p-3" action="<?=HOST?>localidades/alta" method="post">
                    <input type="text" name="nombre" id="nombreLocali" class="form-control mb-4" placeholder="Nombre" required="required">
                    <select name="provincia_id" id="provincia" class="form-control mb-4" required="required">
                        <option value="">Seleccione la Provincia</option>
                        <?php if(!empty($provincias)): ?>
                            <?php foreach($provincias as $key => $value): ?>
                                <option value="<?=$key?>"><?=ucfirst($value)?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <textarea name="descripcion" id="descLocali" class="form-control mb-4" rows="3" placeholder="Descripción"></textarea>
                    <button class="btn btn-info btn-block my-4" type="submit">Agregar</button>
                </form>
            </div>
        </div>
        <!--/.Card-->
    </div>

    <div class="col-md-9 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="blue-grey lighten-4">
                            <tr>
                                <td>#</td>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Provincia</td>
                                <td class="text-center" colspan="2">Acciones</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($localidades)): ?>
                                <?php foreach($localidades as $localidad): ?>
                                    <tr>
                                        <td><?= $localidad['id'] ?></td>
                                        <td><?= ucwords($localidad['nombre']) ?></td>
                                        <td><?= $localidad['descripcion'] ?></td>
                                        <td><?= (!empty($localidad['provincia'])) ? ucwords($localidad['provincia']['nombre']) : '' ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-primary" 
                                                data-toggle="modal" 
                                                data-target="#modalEditarLocalidad"
                                                data-id="<?=$localidad['id']?>"
                                                data-nombre="<?=$localidad['nombre']?>"
                                                data-provincia="<?=$localidad['provincia_id']?>"
                                                data-desc="<?=$localidad['descripcion']?>"
                                            >Editar</button></td>
                                        <td class="text-center"><a class="btn btn-sm btn-danger" href="<?=HOST?>localidades/eliminar/<?=$localidad['id']?>">Eliminar</a></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade right" id="modalEditarLocalidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true" aria-modal="true">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-primary" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Editar</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
            <form class="text-center p-3" action="<?=HOST?>localidades/editar" method="post">
                <input type="hidden" name="id" id="modalEditarLocalidad_id" value="0">
                <input type="nombre" name="nombre" id="modalEditarLocalidad_nombreLocali" class="form-control mb-4" placeholder="Nombre" required="required">
                <select name="provincia_id" id="provincia" class="form-control mb-4" required="required">
                    <option value="">Seleccione la Provincia</option>
                    <?php if(!empty($provincias)): ?>
                        <?php foreach($provincias as $key => $value): ?>
                            <?php $check = ((!empty($_POST["provincia_id"]) AND ($_POST["provincia_id"] = $key))? 'selected' : '')?>; ?>
                            <option value="<?=$key?>" <?=$check?> ><?= ucwords($value) ?></option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
                <textarea name="descripcion" id="modalEditarLocalidad_descLocali" class="form-control mb-4" rows="3" placeholder="Descripción"></textarea>
                <button class="btn btn-info btn-block my-4" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>