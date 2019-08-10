<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Postulaciones/detalle/<?= $postulacion['id'] ?></span>
        </h4>

        <div class="d-flex justify-content-center">
            <a href="<?=HOST?>postulaciones" class="btn btn-dark btn-sm my-0 p">
                Volver
            </a>
        </div>

    </div>

</div>
<!-- Heading -->

<div class="row wow fadeIn">

    <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
            <div class="card-header text-center">
                Detalle de la postulacion
            </div>

            <!--Card content-->
            <div class="card-body">
                <?= debug($postulacion); exit; ?>
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>