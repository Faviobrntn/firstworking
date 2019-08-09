<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Curriculums/editar/<?=$curriculum['id']?></span>
        </h4>

        <div class="d-flex justify-content-center">
            <a href="<?=HOST?>curriculums" class="btn btn-dark btn-sm my-0 p">
                Volver
            </a>
        </div>

    </div>

</div>
<!-- Heading -->

<body>
<div class="container">
        <div class="row">
            <div class="col-sm col-sm-12">



                <div class="card-body mt-2 px-lg-5 pt-0">
                <form action="<?=HOST?>curriculums/editar/<?=$curriculum['id']?>" method="post">
                <input type="hidden" name="usuario_id" value="<?php $_SESSION['Usuario']['id'] ?>">

                        <label for="title" class="col-3 col-form-label">Titulo</label>
                        <input type="text" name="title" class="form-control mb-4" placeholder="Titulo" value="<?=(!empty($curriculum["title"])? $curriculum["title"] : '')?>">
                        
                        <label for="materias_aprobadas" class="col-3 col-form-label">Materias Aprobadas</label>    
                        <input type="text" name="materias_aprobadas" class="form-control mb-4" placeholder="Materias Aprobadas" value="<?=(!empty($curriculum["materias_aprobadas"])? $curriculum["materias_aprobadas"] : '')?>">
                        
                        <label for="promedio" class="col-3 col-form-label">Promedio</label>
                        <input type="text" name="promedio" class="form-control mb-4" placeholder="Promedio" value="<?=(!empty($curriculum["promedio"])? $curriculum["promedio"] : '')?>">
                        
                        <label for="carrera_id" class="col-3 col-form-label">Carrera</label>
                        <select name="carrera_id" id="carrera-id" class="form-control mb-4">
                            <option value="">Seleccione Carrera</option>
                            <?php if(!empty($carreras)): ?>
                                <?php foreach($carreras as $key => $value): ?>
                                    <?php $check = ((!empty($curriculum["carrera_id"]) AND ($curriculum["carrera_id"] = $key))? 'selected' : '')?>; ?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        
                        <label for="conocimientos" class="col-3 col-form-label">Conocimientos</label>
                        <textarea id="conocimientos" name="conocimientos" cols="40" rows="10" class="form-control mb-4" placeholder="Conocimientos"><?=(!empty($curriculum["conocimientos"])? $curriculum["conocimientos"] : '')?></textarea>
                        
                        <label for="experiencia_laboral" class="col-3 col-form-label">Experiencia Laboral</label>
                        <textarea id="experiencia_laboral" name="experiencia_laboral" cols="40" rows="10" class="form-control mb-4" placeholder="Experiencia Laboral"><?=(!empty($curriculum["experiencia_laboral"])? $curriculum["experiencia_laboral"] : '')?></textarea>
                        
                        <label for="objetivos" class="col-3 col-form-label">Intereses/Objetivos</label>
                        <textarea name="objetivos" class="form-control mb-4" rows="3" placeholder="Objetivos"><?php if(!empty($curriculum["objetivos"])) echo $curriculum["objetivos"]; ?></textarea>
                        
                        <label for="resumen" class="col-3 col-form-label">Resumen</label>
                        <textarea name="resumen" class="form-control mb-4" rows="3" placeholder="Resumen"><?php if(!empty($curriculum["resumen"])) echo $curriculum["resumen"]; ?></textarea>
                        
                        <button class="btn btn-info float-right my-4" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= HOST ?>vendor/js/jquery.min.js"></script>
    <script src="<?= HOST ?>vendor/js/bootstrap.bundle.min.js"></script>
</body>