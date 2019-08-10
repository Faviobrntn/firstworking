<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio | Firstworking</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= HOST ?>vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= HOST ?>vendor/css/scrolling-nav.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/css/mdb.min.css" rel="stylesheet">

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
                        <?php if (empty($_SESSION["Usuario"])) : ?>
                            <a href="<?= HOST ?>usuarios/login" class="nav-link">Acceder</a>
                        <?php elseif ($_SESSION["Usuario"]["rol"] == "postulante") : ?>
                            <a id="navCurriculums" class="nav-link ">Mis CV</a>
                        <?php elseif ($_SESSION["Usuario"]["rol"] == "ofertantes") : ?>
                            <a href="<?= HOST ?>ofertas" class="nav-link">Mis Ofertas</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a href="<?= HOST ?>usuarios/perfil" class="nav-link">Mi perfil</a>
                    </li>
                    <li class="nav-item">
                        <?php if (empty($_SESSION["Usuario"])) : ?>
                            <a href="<?= HOST ?>usuarios/registro" class="nav-link">Registrate</a>
                        <?php else : ?>
                            <a href="<?= HOST ?>usuarios/logout" class="nav-link">Salir</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <header class="bg-primary text-white">
        <div class="container text-center" style="height: 55vh;">
            <h1>Problemas buscando trabajo?</h1>
            <img class="img-fluid" src="Untitled3.png" style="height: 25vh;">
            <p class="lead">La bolsa de trabajo diseñada para estudiantes de la UTN, por estudiantes.</p>
        </div>
        <div class="bg-dark px-0 py-3">
            <form action="" method="get">
                <div class="row my-0 mx-0 py-1">
                    <div class="col-sm searchDiv input-group md-form form-sm form-1 offset-3 col-6">
                        <input class="form-control border-0 white-text text-center" name="search" type="text" placeholder="Ingresa tu consulta aqui!" aria-label="Search">
                        <span></span>
                    </div>
                    <div class="col-sm" style="display: flex; align-items: center;">
                        <button type="submit" id="btnBuscarOfertasCoincidentes" class="btn btn-rounded btn-primary"><i class="fas fa-search pr-2" aria-hidden="true"></i>Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class=" text-center py-5">
            <a class="js-scroll-trigger" href="#ofertasDestacadas">
                <i class="bounce fas fa-angle-double-down fa-3x white-text"></i>
            </a>
        </div>
    </header>
    <section id="ofertasDestacadas" class="my-5 mx-5">
        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">Ofertas Destacadas Recientes</h2>
        <!-- Section description -->
        <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Seleccionamos estas ofertas de acuerdo a tus
            preferencias!</p>


        <!-- Grid row -->
        <?php if (!empty($ofertas)) : ?>
            <?php foreach ($ofertas as $oferta) :
                $rand = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
                $color = $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];
                ?>

                <hr class="my-5">
                <div class="row">
                    <div class="offset-md-1 col-xl-2">
                        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                            <a>
                                <img class="img-fluid" src="https://dummyimage.com/300.png/<?= $color ?>/fff/&text=<?= $oferta["titulo"][0] ?>" alt="Sample image">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-8">
                        <h3 class="font-weight-bold mb-3"><strong><?= $oferta["titulo"] ?></strong></h3>
                        <p class="dark-grey-text" style="word-wrap: break-word;"><?= $oferta["descripcion"] ?>.</p>
                        <div style="display: flex;">
                            <div style="flex-grow: 1;">
                                <p class="dark-grey-text">Remuneracion:
                                    <?php
                                    if ($oferta["remuneracion"] == "0" or $oferta["remuneracion"] == "" or !isset($oferta["remuneracion"])) {
                                        echo ("A Convenir");
                                    } else {
                                        echo ("$" . $oferta["remuneracion"]);
                                    }
                                    ?></p>
                                <p class="dark-grey-text">Horario Laboral: <?= $oferta["horario_laboral"] ?>.</p>
                                <p class="dark-grey-text">Modalidad: <?= $oferta["modalidad"] ?>.</p>
                                <p class="dark-grey-text">Localidad: <?= $oferta["localidad"]["nombre"] ?>.</p>
                                <p>Hecha por <a class="font-weight-bold"><?= $oferta["usuario"]["nombre"] ?> <?= $oferta["usuario"]["apellido"] ?></a>, <?= $oferta["creado"] ?></p>
                            </div>
                            <div class="pt-5 mt-5 col-lg-6 text-right">
                                <button id="<?= $oferta["id"] ?>" class="postulacion btn btn-primary btn-lg">Postulame!</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            <?php $this->paginador() ?>
        <?php endif; ?>
    </section>


    <!---------------------------------------------------LOGIN------------------------------------------------->
    <!--     <section id="idFormLogin">


    php echo "<pre>";
    print_r($ofertas);
    echo "</pre>" ?>-->

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Acerca de Firstworking</h2>
                    <p class="lead">“Firstworking”, tiene como finalidad impulsar a los estudiantes a una oportunidad
                        laboral, de acuerdo a los requerimientos de las empresas públicas o privadas, para ocupar
                        puestos vinculados con las carreras estudiadas.
                    </p>
                    <ul>
                        <li>Hacer conocer oportunidades de desarrollo profesional, para mejorar la calidad de vida de
                            los estudiantes.</li>
                        <li>Motivar a los estudiantes a la participación en procesos de selección que les permitan ser
                            activos en el mundo laboral.</li>
                        <li>Establecer convenios con empresas para que tengan a los estudiantes como primera opción en
                            los procesos de selección.</li>
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
                    <p class="lead">La gran ventaja de las bolsas de trabajo reside en la facilidad de acceso a las
                        ofertas de trabajo, cada usuario puede acceder a una gran cantidad de ofertas de trabajo y
                        presentar diferentes solicitudes desde un ordenador. Por otro lado, el hecho de que sea una
                        herramienta gratuita, hace que cada persona interesada en encontrar empleo pueda postularse a
                        los diversos puestos de su interés</p>
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
    <!-- __________________________________________ MODALES __________________________________________ -->






    <div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Mis CV</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Selecciona uno de tus curriculum vitae para que sea automaticamente enviado en tu proxima postulacion</p>
                    </div>
                    <ul id="cvlist" class="list-group z-depth-0">
                    </ul>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" href="<?= HOST ?>curriculums" class="btn btn-primary float-right my-2">Modificar</a>
                    <a type="button" class="btn btn-danger float-right my-2" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</body>


</html>

<script type="text/javascript">
    $(document).ready(function() {
        var cv_seleccionado;
        var isModalLleno = false;



        $("#navCurriculums").click(function() {
            fillandShowModalCV();
        });

        function fillandShowModalCV() {
            if (!isModalLleno) {

                $.ajax({
                    url: HOST + "curriculums/api",
                    type: "get",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        for (let key in data) {
                            $('#myModal').find("#cvlist").append('<a id="' + data[key].id + '" class="cv list-group-item list-group-item-action flex-column align-items-start"><div class="d-flex w-100 justify-content-between"><h5 class="mb-2 h5">' + data[key].titulo + '</h5></div><p class="mb-2">' + data[key].resumen + '</p></a>');
                        };
                        isModalLleno = true;
                    }
                });
            }
            $("#myModal").modal("show");
        }


        $(document).on("click", ".cv", function() {
            cv_seleccionado = $(this).attr('id');
            $.ajax({
                url: HOST + "curriculums/seleccionar",
                data: {
                    cv: cv_seleccionado
                },
                type: "post",
                dataType: "json",
                success: function(resp) {
                    console.log(resp);
                    console.log("cvseleccionado=" + cv_seleccionado);
                    if (resp.estado) {
                        document.cookie = "cv_seleccionado=" + cv_seleccionado;
                        $("#myModal").modal("hide");
                    }
                }
            });
        });

        $(document).on("click", ".postulacion", function() {
            oferta_postulacion = $(this).attr('id');
            if (isCVseleccionado()) {
                console.log("cvseleccionado=" + cv_seleccionado);
                console.log("postulado a=" + oferta_postulacion);
                $.ajax({
                    url: HOST + "postulaciones/alta",
                    data: {
                        oferta: oferta_postulacion,
                        cv: cv_seleccionado
                    },
                    type: "post",
                    dataType: "json",
                    success: function(resp) {
                        if (resp.estado) {
                            $(this).html('Postulado').toggleClass('btn-primary btn-success');;
                        } else {
                            $(this).html('Error, Reintenta').toggleClass('btn-primary btn-danger');;
                            setTimeout(
                                function() {
                                    $(this).html('Postularme!').toggleClass('btn-danger btn-primary');;
                                }, 2500
                            );
                        }
                    }
                });
            } else {
                fillandShowModalCV();
            }
        });

        function isCVseleccionado() {
            if (cv_seleccionado == null) {
                return false;
            } else {
                return true;
            }
        }
    });
</script>