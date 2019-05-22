<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Añadir CV</title>
    <!--
    <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/css/floating-labels.css">-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.1/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.1/js/mdb.min.js"></script>
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
        <div class="tab-pane fade in show active" id="panel444" role="tabpanel">

            <!-- Nav tabs -->
            <div class="col-sm container-fluid border-primary rounded">
                <div id="divListar">Cargando...</div>
            </div>

        </div>
        <!-- Panel 1 -->

        <!-- Panel 1 -->
        <div class="tab-pane fade in show active" id="panel555" role="tabpanel">

            <!-- Nav tabs -->
            <div class="col-sm container-fluid border-primary rounded">
                <div id="divSubir">Cargando...</div>
            </div>

        </div>
        <!-- Panel 1 -->

        <!-- Panel 2 -->
        <div class="tab-pane fade" id="panel666" role="tabpanel">

            <div class="container-fluid border-primary rounded">
                <div id="divCrear">Cargando...</div>
            </div>
        </div>
        <!-- Panel 2 -->

    </div>
    <!-- Tab panels

    <?= HOST ?> -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?= HOST ?>/vendor/js/jquery.min.js"></script>
    <script src="<?= HOST ?>/firstWorking/vendor/js/bootstrap.bundle.min.js"></script>
</body>
<script type="text/JavaScript">
    $("#divListar").load( "listar.php");
</script>

<script type="text/JavaScript">
    $("#divSubir").load( "subir.php");
</script>

<script type="text/JavaScript">
    $("#divCrear").load( "crear.php");
</script>

</html>