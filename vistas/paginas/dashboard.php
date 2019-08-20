<!-- Heading -->
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="<?=HOST?>paginas/dashboard">Dashboard</a>
        </h4>
        <!-- <form class="d-flex justify-content-center">
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
            </button>
        </form> -->
    </div>
</div>
<!-- Heading -->


<div class="row wow fadeIn">
    <!--Grid column-->
    <!-- <div class="col-md-9 mb-4">
        <div class="card">
            <div class="card-body">

            <canvas id="myChart"></canvas>

            </div>
        </div>
    </div> -->
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-3 mb-4">

        <!--Card-->
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header text-center">
                Cantidad de usuarios
            </div>
            
            <!--Card content-->
            <div class="card-body">
                <ul>
                    <li><b>Administradores: </b> <?= (!empty($admins))? count($admins) : '0' ?></li>
                    <li><b>Ofertantes: </b> <?= (!empty($ofertantes))? count($ofertantes) : '0' ?></li>
                    <li><b>Postulantes: </b> <?= (!empty($postulantes))? count($postulantes) : '0' ?></li>
                    <hr>
                    <li><b>Total: </b> <?= (!empty($total))? ($total) : '0' ?></li>
                </ul>
            </div>
        </div>
        <!--/.Card-->
    </div>
    <!--Grid column-->

</div>
<!--Grid row