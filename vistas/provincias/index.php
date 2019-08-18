<!-- Heading -->
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">Provincias</h4>
        <form class="d-flex justify-content-center">
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
                <form class="text-center p-3" action="<?=HOST?>provincias/alta" method="post">
                    <input type="text" name="nombre" id="nombreProv" class="form-control mb-4" placeholder="Nombre">
                    <textarea name="descripcion" id="descProv" class="form-control mb-4" rows="3" placeholder="Descripción"></textarea>
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
                                <td class="text-center" colspan="2">Acciones</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($provincias)): ?>
                                <?php foreach($provincias as $provincia): ?>
                                    <tr>
                                        <td><?= $provincia['id'] ?></td>
                                        <td><?= ucwords($provincia['nombre']) ?></td>
                                        <td><?= $provincia['descripcion'] ?></td>
                                        <!-- <td class="text-center"><a class="btn btn-sm btn-primary" href="<?=HOST?>provincias/editar/<?=$provincia['id']?>">Editar</a></td> -->
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-primary" 
                                                data-toggle="modal" 
                                                data-target="#modalEditarProvincia"
                                                data-id="<?=$provincia['id']?>"
                                                data-nombre="<?=$provincia['nombre']?>"
                                                data-desc="<?=$provincia['descripcion']?>"
                                            >Editar</button></td>
                                        <td class="text-center"><a class="btn btn-sm btn-danger" href="<?=HOST?>provincias/eliminar/<?=$provincia['id']?>">Eliminar</a></td>
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



<div class="modal fade right" id="modalEditarProvincia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true" aria-modal="true">
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
            <form class="text-center p-3" action="<?=HOST?>provincias/editar" method="post">
                <input type="hidden" name="id" id="modalEditarProvincia_id" value="0">
                <input type="nombre" name="nombre" id="modalEditarProvincia_nombreProv" class="form-control mb-4" placeholder="Nombre">
                <textarea name="descripcion" id="modalEditarProvincia_descProv" class="form-control mb-4" rows="3" placeholder="Descripción"></textarea>
                <button class="btn btn-info btn-block my-4" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>