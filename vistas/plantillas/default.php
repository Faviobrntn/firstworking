<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Firstworking</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?=HOST?>vendor/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?=HOST?>vendor/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?=HOST?>vendor/css/style.min.css" rel="stylesheet">
  <style>

    .map-container{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
    }
    .map-container iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
    }
  </style>

    <script>
        const HOST = '<?=HOST?>';
    </script>
</head>

<body class="grey lighten-3">

<!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="<?=HOST?>" target="_blank">
                <strong class="blue-text">Firstworking</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect" href="<?=HOST?>">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="<?=HOST?>#about" target="_blank">Nosotros</a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <!-- <li class="nav-item">
                        <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li> -->
                    <li class="nav-item">
                    <a href="<?=HOST?>usuarios/perfil" class="nav-link border border-light rounded waves-effect"
                        target="_blank">
                        <i class="fas fa-user mr-2"></i>Mi Perfil
                    </a>
                    </li>
                </ul>

            </div>

        </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

        <a href="<?=HOST?>" class="logo-wrapper waves-effect bg-dark mb-4">
            <img src="<?=HOST?>Untitled.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <?php if (!empty($_SESSION['Usuario'])): ?>
                <?php if ($_SESSION['Usuario']['rol'] == 'admin'): ?>
                    <a href="<?=HOST?>paginas/dashboard" class="list-group-item active waves-effect">
                        <i class="fas fa-chart-pie mr-3"></i>Dashboard
                    </a>
                    <a href="<?=HOST?>usuarios" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-user mr-3"></i>Usuarios</a>
                    <a href="<?=HOST?>provincias" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Provincias</a>
                    <a href="<?=HOST?>localidades" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Localidades</a>
                    <a href="<?=HOST?>facultades" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Facultades</a>
                    <a href="<?=HOST?>carreras" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Carreras</a>
                    <a href="<?=HOST?>curriculums" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Curriculums</a>
                    <a href="<?=HOST?>ofertas" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Ofertas</a>
                <?php endif ?>

                <?php if ($_SESSION['Usuario']['rol'] == 'ofertante'): ?>
                    <a href="<?=HOST?>usuarios/perfil" class="list-group-item active waves-effect">
                        <i class="fas fa-user mr-3"></i>Mi perfil
                    </a>
                    <a href="<?=HOST?>ofertas" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Ofertas</a>
                <?php endif ?>

                <?php if ($_SESSION['Usuario']['rol'] == 'postulante'): ?>
                    <a href="<?=HOST?>usuarios/perfil" class="list-group-item active waves-effect">
                        <i class="fas fa-user mr-3"></i>Mi perfil
                    </a>
                    <a href="<?=HOST?>curriculums" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Curriculums</a>
                <?php endif ?>


                
                <hr>

                <a href="<?=HOST?>usuarios/logout" class="list-group-item active waves-effect"
                    onclick="return confirm('Se va a cerrar sesión. ¿Desea continuar?');">
                    <i class="fas fa-sign-out-alt mr-3"></i>Cerrar Sesión
                </a>


                
            <?php endif ?>
        </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <?php $this->getContenido(); ?>
        
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <!-- <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <div class="pt-4">
        <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
            role="button">Download
            MDB
            <i class="fas fa-download ml-2"></i>
        </a>
        <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
            free tutorial
            <i class="fas fa-graduation-cap ml-2"></i>
        </a>
        </div>

        <hr class="my-4">

        <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
        </div>

    </footer> -->
    <!--/.Footer-->

  <!-- SCRIPTS -->
    <script src="<?=HOST?>vendor/js/jquery.min.js"></script>
    <script src="<?=HOST?>vendor/js/bootstrap.bundle.min.js"></script>
    <script src="<?=HOST?>vendor/js/mdb.min.js"></script>
    <script src="<?=HOST?>vendor/js/admin.js"></script>
    <script>
        // Animations initialization
        new WOW().init();
    </script>

</body>

</html>
