<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Usuarios</span>
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
        <!--Card-->
        <div class="card">
            <div class="card-body">
                <a href="<?=HOST?>usuarios/alta" class="btn btn-primary float-right">Registrar nuevo</a>
                <h5 class="card-title">Usuarios</h5>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Email</td>
                            <td>Creado</td>
                            <td colspan="2" class="text-center">Acciones</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(!empty($usuarios)): ?>
                            <?php foreach($usuarios as $key => $usuario): ?>
                                <tr>
                                    <td><?= $usuario['id'] ?></td>
                                    <td><?= $usuario['nombre'] ?></td>
                                    <td><?= $usuario['apellido'] ?></td>
                                    <td><?= $usuario['email'] ?></td>
                                    <td><?= $usuario['creado'] ?></td>
                                    <td class="text-center">
                                        <a href="<?=HOST?>usuarios/editar/<?=$usuario['id']?>" class="btn btn-sm btn-success">Editar</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?=HOST?>usuarios/eliminar/<?=$usuario['id']?>" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Se va a eliminar el usuario. ¿Desea continuar?');">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

