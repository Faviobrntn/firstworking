<!-- Heading -->
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">Ofertas</h4>
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

    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary float-right" href="<?=HOST?>ofertas/alta">Nuevo</a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="blue-grey lighten-4">
                            <tr>
                                <td>#</td>
                                <td>Titulo</td>
                                <td>Modalidad</td>
                                <td>Horario Laboral</td>
                                <td>Localidad</td>
                                <td class="text-center" colspan="3">Acciones</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($ofertas)): ?>
                                <?php foreach($ofertas as $oferta): ?>
                                    <tr>
                                        <td><?= $oferta['id'] ?></td>
                                        <td><?= ucwords($oferta['titulo']) ?></td>
                                        <td><?= ucwords($oferta['modalidad']) ?></td>
                                        <td><?= ucwords($oferta['horario_laboral']) ?></td>
                                        <td><?= !empty($oferta['localidad'])? $oferta['localidad']['nombre'] : '' ?></td>
                                        <td class="text-center"><a class="btn btn-sm btn-primary" href="<?=HOST?>ofertas/editar/<?=$oferta['id']?>">Editar</a></td>
                                        <td class="text-center"><a class="btn btn-sm btn-danger" href="<?=HOST?>ofertas/eliminar/<?=$oferta['id']?>">Eliminar</a></td>
                                        <td class="text-center"><a class="btn btn-sm btn-success" href="<?=HOST?>ofertas/detalle/<?=$oferta['id']?>">Detalles</a></td>
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