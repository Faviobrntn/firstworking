<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Postulaciones/detalle/<?= $postulacion['id'] ?></span>
        </h4>

        <div class="d-flex justify-content-center">
            <a href="<?= HOST ?>postulaciones" class="btn btn-dark btn-sm my-0 p">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Codigo de Postulacion</th>
                            <td><?= $postulacion["id"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Fecha de Postulacion</th>
                            <td><?= $postulacion["creado"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Codigo de Oferta</th>
                            <td><?= $postulacion["oferta_id"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Titulo</th>
                            <td><?= $postulacion["oferta"]["titulo"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Descripcion</th>
                            <td><?= $postulacion["oferta"]["descripcion"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Modalidad</th>
                            <td><?= $postulacion["oferta"]["modalidad"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Horario Laboral</th>
                            <td><?= $postulacion["oferta"]["horario_laboral"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Remuneracion</th>
                            <td><?= $postulacion["oferta"]["remuneracion"] ?></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>