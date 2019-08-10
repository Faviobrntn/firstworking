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
    <script src="<?=HOST?>vendor/js/jquery.min.js"></script>
</head>

<body class="grey lighten-2">
<style>
        .searchDiv {
            position: relative;
        }

        input {
            width: 6.5em;
            color: white;
            font-size: inherit;
            font-family: inherit;
            background-color: transparent;
            border: 1px solid transparent;
            border-bottom-color: hsla(341, 97%, 59%, 0.2);
        }

        input:focus {
            outline: none;
        }

        input::placeholder {
            color: hsla(0, 0%, 100%, 0.6);
        }

        span {
            position: absolute;
            top: 98%;
            bottom: 0;
            left: 50%;
            width: 100%;
            height: 2px;
            opacity: 0;
            background-color: #4285F4;
            transform-origin: center;
            transform: translate(-50%, 0) scaleX(0);
            transition: all 0.3s ease;
        }

        input:focus~span {
            transform: translate(-50%, 0) scaleX(1);
            opacity: 1;
        }

        .bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        }

        button {
            z-index: 1;
            font-size: inherit;
            font-family: inherit;
            color: white;
            padding: 0.5em 1em;
            outline: none;
            border: none;
            background-color: hsl(236, 32%, 26%);
        }

        button:hover {
            cursor: pointer;
            animation: jelly 0.5s;
        }

        @keyframes jelly {

            0%,
            100% {
                transform: scale(1, 1);
            }

            25% {
                transform: scale(0.9, 1.1);
            }

            50% {
                transform: scale(1.1, 0.9);
            }

            75% {
                transform: scale(0.95, 1.05);
            }
        }

        ul li a {
            display: block;
            border-radius: 10px;
        }

        a:hover {
            background-color: #2196f3;
            color: white;
        }
    </style>

    <script>
        const HOST = '<?= HOST ?>';
    </script>

</head>

<!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect  rounded-sm" href="<?=HOST?>" target="_blank">
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
                        <a class="nav-link waves-effect  rounded-sm" href="<?=HOST?>">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect  rounded-sm" href="<?=HOST?>#about" target="_blank">Nosotros</a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <!-- <li class="nav-item">
                        <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect  rounded-sm" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li> -->
                    <li class="nav-item">
                    <a href="<?=HOST?>usuarios/perfil" class="nav-link border border-light rounded waves-effect  rounded-sm"
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
        <div class="sidebar-fixed navbar-dark bg-dark position-fixed">

        <a href="<?=HOST?>" class="logo-wrapper waves-effect  rounded-sm bg-dark mb-4">
            <img src="<?=HOST?>Untitled.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <?php if (!empty($_SESSION['Usuario'])): ?>
                <?php if ($_SESSION['Usuario']['rol'] == 'admin'): ?>
                    <a href="<?=HOST?>paginas/dashboard" class="list-group-item active waves-effect  rounded-sm">
                        <i class="fas fa-chart-pie mr-3"></i>Dashboard
                    </a>
                    <a href="<?=HOST?>usuarios" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-user mr-3"></i>Usuarios</a>
                    <a href="<?=HOST?>provincias" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Provincias</a>
                    <a href="<?=HOST?>localidades" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Localidades</a>
                    <a href="<?=HOST?>facultades" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Facultades</a>
                    <a href="<?=HOST?>carreras" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Carreras</a>
                    <a href="<?=HOST?>curriculums" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Curriculums</a>
                    <a href="<?=HOST?>ofertas" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Ofertas</a>
                <?php endif ?>

                <?php if ($_SESSION['Usuario']['rol'] == 'ofertante'): ?>
                    <a href="<?=HOST?>usuarios/perfil" class="list-group-item active waves-effect rounded-sm">
                        <i class="fas fa-user mr-3"></i>Mi perfil
                    </a>
                    <a href="<?=HOST?>ofertas" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Ofertas</a>
                <?php endif ?>

                <?php if ($_SESSION['Usuario']['rol'] == 'postulante'): ?>
                    <a href="<?=HOST?>usuarios/perfil" class="list-group-item active waves-effect rounded-sm">
                        <i class="fas fa-user mr-3"></i>Mi perfil
                    </a>
                    <a href="<?=HOST?>curriculums" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Mis Curriculums
                    </a>
                    <a href="<?=HOST?>postulaciones" class="list-group-item list-group-item-action waves-effect rounded-sm">
                        <i class="fas fa-table mr-3"></i>Mis Postulaciones
                    </a>
                <?php endif ?>


                
                <hr>

                <a href="<?=HOST?>usuarios/logout" class="list-group-item active waves-effect  rounded-sm"
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

  <!-- SCRIPTS -->
    <script src="<?=HOST?>vendor/js/bootstrap.bundle.min.js"></script>
    <script src="<?=HOST?>vendor/js/mdb.min.js"></script>
    <script src="<?=HOST?>vendor/js/admin.js"></script>
    <script>
        // Animations initialization
        new WOW().init();
    </script>

</body>

</html>
