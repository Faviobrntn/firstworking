<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Carreras</span>
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

    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary float-right" href="<?=HOST?>carreras/alta">Nuevo</a>
                <table class="table table-hover">
                    <thead class="blue-grey lighten-4">
                        <tr>
                            <td>#</td>
                            <td>Nombre</td>
                            <td>Facultad</td>
                            <td>Descripción</td>
                            <td class="text-center" colspan="2">Acciones</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(!empty($carreras)): ?>
                            <?php foreach($carreras as $carrera): ?>
                                <tr>
                                    <td><?= $carrera['id'] ?></td>
                                    <td><?= ucwords($carrera['nombre']) ?></td>
                                    <td><?= !empty($carrera['facultad'])? $carrera['facultad']['nombre'] : '' ?></td>
                                    <td><?= $carrera['descripcion'] ?></td>
                                    <td class="text-center"><a class="btn btn-sm btn-primary" href="<?=HOST?>carreras/editar/<?=$carrera['id']?>">Editar</a></td>
                                    <td class="text-center"><a class="btn btn-sm btn-danger" href="<?=HOST?>carreras/eliminar/<?=$carrera['id']?>">Eliminar</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>