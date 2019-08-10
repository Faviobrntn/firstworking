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
               <h4>Detalle de la oferta #<?= $oferta['id'] ?></h4>
                </div>
                <!----------------------------------------TABLA DETALLES OFERTA--------------------------------------------------------------->
                <table class="table table-hover">
                    <caption></caption>
                    <thead class="blue-grey lighten-4">
                        <tr>
                            <td>#</td>
                            <td>Titulo</td>
                            <td>Modalidad</td>
                            <td>Horario Laboral</td>
                            <td>Remuneracion</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(!empty($oferta)): ?>
                                <tr>
                                    <td><?= $oferta['id'] ?></td>
                                    <td><?= ucwords($oferta['titulo']) ?></td>
                                    <td><?= ucwords($oferta['modalidad']) ?></td>
                                    <td><?= ucwords($oferta['horario_laboral']) ?></td>
                                    <td><?= $oferta['remuneracion'] ?></td>
                                </tr>
                        <?php endif ?>
                    </tbody>
                </table>
                 <!---------------------------------------END TABLA DETALLES OFERTA------------------------------------------------------------>
            

            <!--Card content-->
            <div class="card-body">
            <h4 align="center">Detalles de las postulaciones</h4>
                <!----------------------------------------TABLA DETALLES DE LAS POSTULACIONES--------------------------------------------------------------->
                <table class="table table-hover">
                    <thead class="blue-grey lighten-4">
                        <tr>
                            <td>#</td>
                            <td>NOMBRE POSTULANTE</td>
                            <td>APELLIDO POSTULANTE</td>
                            <td>TITULO CV</td>
                            <td>RESUMEN CV</td>
                        </tr>
                    </thead>

                    <tbody>
                            <?php if(!empty($oferta['postulaciones'])): ?>
                            <?php foreach($oferta['postulaciones'] as $postulacion): ?>
                                <tr>
                                    <td><?= $postulacion['id'] ?></td>
                                    <td><?= ucwords($postulacion['usuario']['nombre']) ?></td>
                                    <td><?= ucwords($postulacion['usuario']['apellido']) ?></td>
                                    <td><?= ucwords($postulacion['curriculum']['titulo']) ?></td>
                                    <td><?= ucwords($postulacion['curriculum']['resumen']) ?></td>
                                </tr>
                            <?php endforeach ?>
                            <?php endif; ?>
                    </tbody>
                </table>
                <!---------------------------------------END TABLA DETALLES DE LAS POSTULACIONES------------------------------------------------------------>
               <!-- <?= debug($oferta); exit; ?> -->
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>