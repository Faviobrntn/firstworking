<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Añadir CV</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?=HOST?>vendor/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?=HOST?>vendor/css/mdb.min.css" rel="stylesheet">

</head>

<body>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs nav-justified primary-color" role="tablist">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel444" role="tab">
                <i class="fas fa-file-invoice pr-2"></i>Mis CV</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel555" role="tab">
                <i class="fas fa-file-upload pr-2"></i>Cargar CV</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel666" role="tab">
                <i class="fas fa-plus-circle pr-2"></i>Crear CV</a>
        </li>
    </ul>
    <!-- Nav tabs -->

    <!-- Tab panels -->
    <div class="tab-content">

        <!-- Panel 1 -->
        <div class="tab-panel fade in" id="panel444" role="tabpanel">

            <!-- Nav tabs -->
            <div class="col-sm container-fluid border-primary rounded">
                <div id="divListar"><?php require_once 'listar.php'; ?></div>
            </div>

        </div>
        <!-- Panel 1 -->

        <!-- Panel 1 -->
        <div class="tab-panel fade in show active" id="panel555" role="tabpanel">

            <!-- Nav tabs -->
            <div class="col-sm container-fluid border-primary rounded">
                <div id="divSubir"><?php require_once 'subir.php'; ?></div>
            </div>

        </div>
        <!-- Panel 1 -->

        <!-- Panel 2 -->
        <div class="tab-panel fade" id="panel666" role="tabpanel">

            <div class="container-fluid border-primary rounded">
                <div id="divCrear"><?php require_once 'crear.php'; ?></div>
            </div>
        </div>
        <!-- Panel 2 -->

    </div>
    
    <script src="<?=HOST?>vendor/js/jquery.min.js"></script>
    <script src="<?=HOST?>vendor/js/bootstrap.bundle.min.js"></script>
    <script src="<?=HOST?>vendor/js/mdb.min.js"></script>
    
    <!-- <script type="text/javascript">
        $("#divListar").load( "<?= HOST ?>curriculums/listar.php");
    </script>

    <script type="text/javascript">
        $("#divSubir").load( "<?= HOST ?>curriculums/subir.php");
    </script>

    <script type="text/javascript">
        $("#divCrear").load( "<?= HOST ?>curriculums/crear.php");
    </script> -->
</body>

</html>