<!-- Card -->
<div class="row">
    <?php if (!empty($curriculums)) : ?>
        <?php foreach ($curriculums as $cv) : ?>
            <div class="col-sm">
                <div class="card mx-1 my-1">

                    <!-- Card image -->
                    <div class="view overlay">
                        <a href="<?= HOST ?>curriculums/editar/<?= $cv['id'] ?>">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body">

                        <!-- Title -->
                        <h4 class="card-title"><?= $cv['titulo'] ?></h4>
                        <!-- Text -->
                        <p class="card-text"><?= $cv['resumen'] ?></p>
                        <!-- Button -->
                        <div class="btn-group btn-block">
                            <a href="<?= HOST ?>curriculums/eliminar/<?= $cv['id'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="<?= HOST ?>curriculums/editar/<?= $cv['id'] ?>" class="btn btn-info">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-success" id="seleccionarCV" data-id="<?= $cv['id'] ?>">
                                <i class="far fa-check-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>

<div class="container">
    <form id="formSubirCV" action="<?= HOST ?>curriculums/subir" method="POST" enctype="multipart/form-data">
        <label for="files" class="float"><i class="fa fa-plus my-float waves-effect waves-light"></i></label>
        <input id="files" name="cv_pdf" style="visibility:hidden;" type="file" accept="application/pdf">
    </form>

    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 22px;
        }
    </style>
</div>