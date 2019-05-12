<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar</title>

    <link rel="stylesheet" href="<?=HOST?>vendor/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?=HOST?>vendor/css/floating-labels.css"> -->
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar usuario
            </div>
            <div class="card-body">
                
                <form class="form-signin" action="" method="post">                        
                    <div class="form-group">
                        <label for="inputNombre">Nombre</label>
                        <input type="text" name="nombre" id="inputNombre" class="form-control" placeholder="Nombre" required="required" value="<?=$usuario['nombre']?>">
                    </div>

                    <div class="form-group">
                        <label for="inputApellido">Apellido</label>
                        <input type="text" name="apellido" id="inputApellido" class="form-control" placeholder="Apellido" required="required" value="<?=$usuario['apellido']?>">
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required="required" value="<?=$usuario['email']?>">
                    </div>            
                    
                    <button class="btn btn-success float-right" type="submit">Guardar!</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="<?=HOST?>vendor/js/jquery.min.js"></script>
    <script src="<?=HOST?>vendor/js/bootstrap.bundle.min.js"></script>
</body>
</html>