<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>

    <link rel="stylesheet" href="<?=HOST?>vendor/css/bootstrap.min.css">

</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="<?=HOST?>usuarios/registro" class="btn btn-primary float-right">Registrar nuevo</a>
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
                            <td colspan="2">Acciones</td>
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
                                    <td><a href="<?=HOST?>usuarios/editar/<?=$usuario['id']?>">Editar</a></td>
                                    <td><a href="<?=HOST?>usuarios/eliminar/<?=$usuario['id']?>">Eliminar</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=HOST?>vendor/js/jquery.min.js"></script>
    <script src="<?=HOST?>vendor/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>

