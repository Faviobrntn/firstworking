<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/css/floating-labels.css">
</head>
<body>
    <form class="form-signin" action="" method="post">
        <div class="text-center mb-4">
            <!-- <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
            <h1 class="mb-3 font-weight-normal">Registro</h1>
            <p>Bienvenidos!</p>
        </div>
            
        <div class="form-label-group">
            <input type="text" name="nombre" id="inputNombre" class="form-control" placeholder="Nombre" required="required" autofocus="">
            <label for="inputNombre">Nombre</label>
        </div>

        <div class="form-label-group">
            <input type="text" name="apellido" id="inputApellido" class="form-control" placeholder="Apellido" required="required" autofocus="">
            <label for="inputApellido">Apellido</label>
        </div>

        <div class="form-label-group">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required="required" autofocus="">
            <label for="inputEmail">E-mail</label>
        </div>
            
        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required">
            <label for="inputPassword">Contraseña</label>
        </div>

        <div class="form-label-group">
            <select name="rol" id="rol" class="form-control mb-4" required="required">
                <option value="">Seleccione su rol</option>
                <option value="postulante">Postulante</option>
                <option value="ofertante">Ofertante</option>
            </select>
            <!-- <label for="localidad-id">Localidad</label> -->
        </div>
        
        <div class="form-label-group">
            <select name="localidad_id" id="localidad-id" class="form-control mb-4" required="required">
                <option value="">Seleccione su localidad</option>
                <?php if(!empty($localidades)): ?>
                    <?php foreach($localidades as $key => $value): ?>
                        <?php $check = ((!empty($_POST["localidad_id"]) AND ($_POST["localidad_id"] = $key))? 'selected' : '')?>; ?>
                        <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
            <!-- <label for="localidad-id">Localidad</label> -->
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme!</button>
        <a href="<?=HOST?>usuarios/login" class="btn btn-lg btn-success btn-block">Ya tengo cuenta</a>
        <a href="<?=HOST?>" class="btn btn-lg btn-secondary btn-block">Volver</a>
        <p class="mt-5 mb-3 text-muted text-center">© 2017-2019</p>
    </form>



    <!-- Bootstrap core JavaScript -->
    <script src="<?=HOST?>vendor/js/jquery.min.js"></script>
    <script src="<?=HOST?>vendor/js/bootstrap.bundle.min.js"></script>
</body>
</html>