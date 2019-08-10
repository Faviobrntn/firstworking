<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Ofertas/detalle/<?= $oferta['id'] ?></span>
        </h4>

        <div class="d-flex justify-content-center">
            <a href="<?=HOST?>ofertas" class="btn btn-dark btn-sm my-0 p">
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
                Detalle de la oferta #<?= $oferta['id'] ?>
            </div>

            <!--Card content-->
            <div class="card-body">
                <?= debug($oferta); exit; ?>
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>