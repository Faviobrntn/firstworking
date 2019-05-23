
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
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
</head>

<body class="grey lighten-3">

<!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
            <strong class="blue-text">MDB</strong>
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
                    <a class="nav-link waves-effect" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About
                    MDB</a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                </li>
                <li class="nav-item">
                <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                </li>
                <li class="nav-item">
                <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                    target="_blank">
                    <i class="fab fa-github mr-2"></i>MDB GitHub
                </a>
                </li>
            </ul>

            </div>

        </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
            <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <a href="<?=HOST?>paginas/dashboard" class="list-group-item active waves-effect">
                <i class="fas fa-chart-pie mr-3"></i>Dashboard
            </a>
            <a href="<?=HOST?>usuarios" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-user mr-3"></i>Usuarios</a>
            <a href="<?=HOST?>provincias" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-table mr-3"></i>Provincias</a>
            <a href="<?=HOST?>curriculums" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-table mr-3"></i>Curriculums</a>
            <!-- <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-map mr-3"></i>Maps</a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
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
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <!--Call to action-->
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
        <!--/.Call to action-->

        <hr class="my-4">

        <!--Copyright-->
        <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
        </div>
        <!--/.Copyright-->

    </footer>
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
