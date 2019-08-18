<!-- Heading -->
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">Facultades</h4>
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
                <a class="btn btn-primary float-right" href="<?=HOST?>facultades/alta">Nuevo</a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="blue-grey lighten-4">
                            <tr>
                                <td>#</td>
                                <td>Nombre</td>
                                <td>Dirección</td>
                                <td>Email</td>
                                <td>Descripción</td>
                                <td>Localidad</td>
                                <td class="text-center" colspan="2">Acciones</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($facultades)): ?>
                                <?php foreach($facultades as $facu): ?>
                                    <tr>
                                        <td><?= $facu['id'] ?></td>
                                        <td><?= ucwords($facu['nombre']) ?></td>
                                        <td><?= ucwords($facu['direccion']) ?></td>
                                        <td><?= ucwords($facu['email']) ?></td>
                                        <td><?= !empty($facu['localidad'])? $facu['localidad']['nombre'] : '' ?></td>
                                        <td><?= $facu['descripcion'] ?></td>
                                        <td class="text-center"><a class="btn btn-sm btn-primary" href="<?=HOST?>facultades/editar/<?=$facu['id']?>">Editar</a></td>
                                        <td class="text-center"><a class="btn btn-sm btn-danger" href="<?=HOST?>facultades/eliminar/<?=$facu['id']?>">Eliminar</a></td>
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