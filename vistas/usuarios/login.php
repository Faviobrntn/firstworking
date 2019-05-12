<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="<?=HOST?>vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=HOST?>vendor/css/floating-labels.css">
</head>
<body>
    <form class="form-signin" action="" method="post">
        <div class="text-center mb-4">
            <!-- <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
            <h1 class="mb-3 font-weight-normal">Ingreso al sistema</h1>
            <p>Bienvenidos!</p>
        </div>

        <div class="form-label-group">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required="required" autofocus="">
            <label for="inputEmail">E-mail</label>
        </div>
            
        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required">
            <label for="inputPassword">Contraseña</label>
        </div>
            
        
        <button class="btn btn-lg btn-success btn-block" type="submit">Iniciar Sesión</button>
        <!-- <p class="mt-5 mb-3 text-muted text-center">© 2017-2019</p> -->
    </form>



    <!-- Bootstrap core JavaScript -->
    <script src="<?=HOST?>vendor/js/jquery.min.js"></script>
    <script src="<?=HOST?>vendor/js/bootstrap.bundle.min.js"></script>
</body>
</html>