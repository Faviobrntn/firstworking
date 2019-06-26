<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scrolling Nav - Start Bootstrap Template</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= HOST ?>vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= HOST ?>vendor/css/scrolling-nav.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/css/mdb.min.css" rel="stylesheet">


</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="img-fluid" src="Untitled.png" style="height: 30px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= HOST ?>usuarios/login" class="nav-link js-scroll-trigger">Acceder</a>
                        <!--<a href="" class="nav-link js-scroll-trigger" data-toggle="modal"
                            data-target="#modalLRForm">Acceder</a>-->
                    </li>
                    <li class="nav-item">
                        <a href="<?= HOST ?>usuarios/registro" class="nav-link js-scroll-trigger">Registrate</a>
                        <!--<a href="" class="nav-link js-scroll-trigger" data-toggle="modal"
                            data-target="#modalLRForm">Acceder</a>-->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-primary text-white">
        <div class="container text-center" style="height: 300px;">
            <h1>Problemas buscando trabajo?</h1>
            <img class="img-fluid" src="Untitled3.png" style="height: 250px;">
            <p class="lead">La bolsa de trabajo diseñada para estudiantes de la UTN, por estudiantes.</p>
            <form action="" method="get">
                <div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend bg-secondary">
                        <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
                    </div>
                    <input class="form-control my-0 py-1" name="search" type="text" placeholder="Ingresa tu consulta aqui!" aria-label="Search">
                    <button type="submit" class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light">Buscar</button>
                </div>
            </form>
        </div>
    </header>
    <section class="my-5 mx-5">
        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">Ofertas Destacadas Recientes</h2>
        <!-- Section description -->
        <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Seleccionamos estas ofertas de acuerdo a tus
            preferencias!</p>

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-lg-5 col-xl-4">

                <!-- Featured image -->
                <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Sample image">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-7 col-xl-8">

                <!-- Post title -->
                <h3 class="font-weight-bold mb-3"><strong>Programador PHP</strong></h3>
                <!-- Excerpt -->
                <p class="dark-grey-text">Negroris busca programador PHP, condiciones de trabajo basicas, pago minimo,
                    12 horas, con disponibilidad para viajar a la frontera y no volver cuando decidamos no pagarte mas.
                </p>
                <!-- Post data -->
                <p>by <a class="font-weight-bold">Jessica Clark</a>, 19/04/2019</p>
                <!-- Read more button -->
                <a class="btn btn-primary btn-md">Ver Oferta</a>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <hr class="my-5">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-lg-5 col-xl-4">

                <!-- Featured image -->
                <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/31.jpg" alt="Sample image">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-7 col-xl-8">

                <!-- Post title -->
                <h3 class="font-weight-bold mb-3"><strong>Desarrollador Web Full-stack Java</strong></h3>
                <!-- Excerpt -->
                <p class="dark-grey-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                    praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                    occaecati
                    cupiditate non provident et accusamus iusto odio dignissimos et dolorum fuga.</p>
                <!-- Post data -->
                <p>by <a class="font-weight-bold">Jessica Clark (totally not the one at negroris)</a>, 16/04/2018</p>
                <!-- Read more button -->
                <a class="btn btn-primary btn-md">Ver Oferta</a>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <hr class="my-5">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-lg-5 col-xl-4">

                <!-- Featured image -->
                <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/52.jpg" alt="Sample image">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div id="ultima" class="col-lg-7 col-xl-8">

                <!-- Post title -->
                <h3 class="font-weight-bold mb-3"><strong>Analista de Procesos</strong></h3>
                <!-- Excerpt -->
                <p class="dark-grey-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                    sed
                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                    qui dolorem ipsum quia dolor sit amet, psam voluptatem quia consectetur.</p>
                <!-- Post data -->
                <p>by <a class="font-weight-bold">Jessica Clark (i swear, not me again)</a>, 12/04/2018</p>
                <!-- Read more button -->
                <a class="btn btn-primary btn-md">Ver en Computrabajo</a>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>


    <!---------------------------------------------------LOGIN------------------------------------------------->
    <!--     <section id="idFormLogin">
        

    </section> -->


    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Acerca de Firstworking</h2>
                    <p class="lead">“Firstworking”, tiene como finalidad impulsar a los estudiantes a una oportunidad laboral, de acuerdo a los requerimientos de las empresas públicas o privadas, para ocupar puestos vinculados con las carreras estudiadas.
                    </p>
                    <ul>
                        <li>Hacer conocer oportunidades de desarrollo profesional, para mejorar la calidad de vida de los estudiantes.</li>
                        <li>Motivar a los estudiantes a la participación en procesos de selección que les permitan ser activos en el mundo laboral.</li>
                        <li>Establecer convenios con empresas para que tengan a los estudiantes como primera opción en los procesos de selección.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Inicia tus contrataciones aqui!</h2>
                    <p class="lead">La gran ventaja de las bolsas de trabajo reside en la facilidad de acceso a las ofertas de trabajo, cada usuario puede acceder a una gran cantidad de ofertas de trabajo y presentar diferentes solicitudes desde un ordenador. Por otro lado, el hecho de que sea una herramienta gratuita, hace que cada persona interesada en encontrar empleo pueda postularse a los diversos puestos de su interés</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contactanos</h2>
                    <p class="lead">Comunicate directamente con nosotros</p>
                    <form action="<?= HOST ?>/paginas/consulta" method="post">
                        <label class="my-2" for="email">Tu Email: </label>
                        <input class="form-control " type="email" name="email" id="email" required>
                        <label class="my-2" for="nombre">Tu Nombre: </label>
                        <input class="form-control " type="text" name="nombre" id="nombre">
                        <label class="my-2" for="mensaje">Tu Mensaje: </label>
                        <textarea class="form-control " name="mensaje" id="mensaje" required> Ingresa tu mensaje aqui.
                        </textarea>
                        <button class="btn btn-primary float-right my-2" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->





    <!-- Bootstrap core JavaScript -->
    <script src="<?= HOST ?>vendor/js/jquery.min.js"></script>
    <script src="<?= HOST ?>vendor/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= HOST ?>vendor/js/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="<?= HOST ?>vendor/js/scrolling-nav.js"></script>



    <!--Modal: Login / Register Form-->
    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                                Acceder</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                                Registrarse</a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                            <!--Body-->
                            <div class="modal-body mb-1">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" id="modalLRInput10" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput10">Tu correo
                                        electronico</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput11" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput11">Tu
                                        contraseña</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button class="btn btn-info">Acceder<i class="fas fa-sign-in ml-1"></i></button>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-center text-md-right mt-1">
                                    <p>No eres miembro? <a href="#" class="blue-text">Registrate</a></p>
                                    <p>Olvidaste la <a href="#" class="blue-text">Contraseña?</a></p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                            </div>

                        </div>
                        <!--/.Panel 7-->

                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">

                            <!--Body-->
                            <div class="modal-body">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" id="modalLRInput12" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput12">Tu correo
                                        electronico</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput13" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput13">Tu
                                        contraseña</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput14" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput14">Repite la
                                        contraseña</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button class="btn btn-info">Registrate<i class="fas fa-sign-in ml-1"></i></button>
                                </div>

                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-right">
                                    <p class="pt-1">Ya tienes una cuenta? <a href="#" class="blue-text">Acceder</a>
                                    </p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        <!--/.Panel 8-->
                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login / Register Form-->
    <footer id="footer" class="bg-dark">
        <?php include("footer.php"); ?>
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; firstworking.utn 2019</p>
        </div>
        <!-- /.container -->
    </footer>
</body>

</html>