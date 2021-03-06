<!DOCTYPE html>
<html xml:lang="es" lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta http-equiv="Content-Language" content="es"/> -->
    <!-- <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type"/> -->
    <meta name="title" content="Firstworking">
    <meta name="description" content="Nos encargamos de conectar gente que da trabajo con gente que lo necesita">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Firstworking">
    <meta name="application-name" content="Firstworking">
    <meta name="distribution" content="global"/>

    <title>Inicio | Firstworking</title>

    <link href="<?= HOST ?>vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= HOST ?>vendor/css/scrolling-nav.css" rel="stylesheet" type="text/css"/>
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/css/mdb.min.css" rel="stylesheet" type="text/css"/>

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

        /* Esto lo agrego aca para que no moleste en el validador del footer */
        h6 { color: white; }
    </style>

    <script>
        const HOST = '<?= HOST ?>';
    </script>

</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <img alt="Logo de la empresa" class="img-fluid" src="Untitled.png" style="height: 30px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
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
                    <?php if (!empty($_SESSION["Usuario"])) : ?>
                        <li class="nav-item">
                            <?php if ($_SESSION["Usuario"]["rol"] == "postulante") : ?>
                                <a id="navCurriculums" class="nav-link ">Mis CV</a>
                            <?php elseif ($_SESSION["Usuario"]["rol"] == "ofertante") : ?>
                                <a href="<?= HOST ?>ofertas" class="nav-link">Mis Ofertas</a>
                            <?php endif ?>
                        </li>
                        <li class="nav-item">
                            <a href="<?= HOST ?>usuarios/perfil" class="nav-link">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= HOST ?>usuarios/logout" class="nav-link">Salir</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?= HOST ?>usuarios/login" class="nav-link">Acceder</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= HOST ?>usuarios/registro" class="nav-link">Registrate</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>



    <header class="bg-primary text-white">
        <div class="container text-center" style="height: 55vh;">
            <h1>Problemas buscando trabajo?</h1>
            <img alt="Imagen de la empresa como presentación" class="img-fluid" src="Untitled3.png" style="height: 25vh;">
            <p class="lead">La bolsa de trabajo diseñada para estudiantes de la UTN, por estudiantes.</p>
        </div>
        <div class="bg-dark px-0 py-3">
            <form action="<?= HOST ?>" method="get">
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

        <div class="text-center py-5">
            <a class="js-scroll-trigger" href="#ofertasDestacadas">&nbsp;&nbsp;
                <i class="bounce fas fa-angle-double-down fa-3x white-text"></i>&nbsp;&nbsp;
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
                                <img alt="Ofertas de trabajo: <?= $oferta["titulo"] ?>" class="img-fluid" src="https://dummyimage.com/300.png/<?= $color ?>/fff/&text=<?= $oferta["titulo"][0] ?>">
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
                                <?php if (!empty($_SESSION["Usuario"])): ?>
                                    <?php if ($_SESSION["Usuario"]["rol"] == "postulante") : ?>
                                    <button id="<?= $oferta["id"] ?>" class="postulacion btn btn-primary btn-lg">Postulame!</button>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            <div class="my-4">
                <?php $this->paginador() ?>
            </div>
        <?php endif; ?>
    </section>


    <!-- ______LOGIN______ -->
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
                    <form action="<?= HOST ?>paginas/consulta" method="post">
                        <label class="my-2" for="email">Tu Email: </label>
                        <input class="form-control" type="email" name="email" id="email" required>
                        <label class="my-2" for="nombre">Tu Nombre: </label>
                        <input class="form-control" type="text" name="nombre" id="nombre">
                        <label class="my-2" for="mensaje">Tu Mensaje: </label>
                        <textarea class="form-control" name="mensaje" id="mensaje" placeholder="Ingresa tu mensaje aqui." required></textarea>
                        <button class="btn btn-primary float-right my-2" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("footer.php"); ?>




    <!-- __________________________________________ MODALES __________________________________________ -->
    <div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Mis CV</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Selecciona uno de tus curriculum vitae para que sea automaticamente enviado en tu proxima postulacion</p>
                    </div>
                    <ul id="cvlist" class="list-group z-depth-0">
                    </ul>
                </div>

                <div class="modal-footer justify-content-center">
                    <a href="<?= HOST ?>curriculums" class="btn btn-primary float-right my-2">Modificar</a>
                    <a href="#" class="btn btn-danger float-right my-2" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
    



    <script src="<?= HOST ?>vendor/js/jquery.min.js"></script>
    <script src="<?= HOST ?>vendor/js/bootstrap.bundle.min.js"></script>
    <script src="<?= HOST ?>vendor/js/jquery.easing.min.js"></script>
    <script src="<?= HOST ?>vendor/js/scrolling-nav.js"></script>
    <script>
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
                var oferta_postulacion = $(this).attr('id');
                
                if (isCVseleccionado()) {
                    console.log("cvseleccionado=" + cv_seleccionado);
                    console.log("postulado a=" + oferta_postulacion);

                    var _this = $(this);

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
                                _this.html('Postulado').prop('disabled', true).toggleClass('btn-primary btn-success');;
                            } else {
                                if (resp.mensaje) {
                                    alert(resp.mensaje);
                                    _this.html('Ya te postulaste :´(').toggleClass('btn-primary btn-danger');;
                                }else{
                                    _this.html('Error, Reintenta').toggleClass('btn-primary btn-danger');;
                                }
                                setTimeout(
                                    function() {
                                        _this.html('Postularme!').prop('disabled', false).toggleClass('btn-danger btn-primary');;
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


</body>
</html>
