<footer id="footer" class="page-footer font-small unique-color-dark">

    <div class="bg-primary">
        <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0">Deseas tus ofertas aqui? <a style="color:aliceblue;" href="<?= HOST ?>usuarios/registro">Crea una cuenta como Ofertante!</a></h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-7 text-center text-md-right">

                    <!-- Facebook -->
                    <a class="fb-ic">
                        <i class="fab fa-facebook-f white-text mr-4"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="tw-ic">
                        <i class="fab fa-twitter white-text mr-4"> </i>
                    </a>
                    <!-- Google +-->
                    <a class="gplus-ic">
                        <i class="fab fa-google-plus-g white-text mr-4"> </i>
                    </a>
                    <!--Linkedin -->
                    <a class="li-ic">
                        <i class="fab fa-linkedin-in white-text mr-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fab fa-instagram white-text"> </i>
                    </a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">Firstworking Co</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Firstworking surgió a raiz de la necesidad de acercarse a las empresas que requieran estudiantes
                    para insertarse en el mercado laboral.</p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Work Team</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="https://github.com/Faviobrntn">Favio Barnatan</a>
                </p>
                <p>
                    <a href="https://github.com/Pra3t0r5">Fernando Albertengo</a>
                </p>
                <p>
                    <a href="https://github.com/nawealvarez">Nahuel Alvarez</a>
                </p>
                <p>
                    <a href="https://github.com/LucasPavan04">Lucas PAvan</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <?php if (!empty($_SESSION["Usuario"])) : ?>
                            <?php if ($_SESSION["Usuario"]["rol"] == "postulante") : ?>
                                <p><a id="navCurriculums" class="nav-link ">Mis CV</a></p>
                            <?php elseif ($_SESSION["Usuario"]["rol"] == "ofertante") : ?>
                                <p><a href="<?= HOST ?>ofertas" class="nav-link">Mis Ofertas</a></p>
                            <?php endif ?>
                        <p>
                            <a href="<?= HOST ?>usuarios/perfil" class="nav-link">Mi perfil</a>
                        </p>
                        <p>
                            <a href="<?= HOST ?>usuarios/logout" class="nav-link">Salir</a>
                        </p>
                    <?php else: ?>
                        <p>
                            <a href="<?= HOST ?>usuarios/login" class="nav-link">Acceder</a>
                        </p>
                        <p>
                            <a href="<?= HOST ?>usuarios/registro" class="nav-link">Registrate</a>
                        </p>
                    <?php endif; ?>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-home mr-3"></i> Avenida Siempre Viva 742, Springfield, Oregon, US</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> admin@firstworking.com</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                    <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; firstworking.utn 2019</p>
    </div>
</footer>
<!-- Footer -->