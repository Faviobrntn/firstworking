<div class="row">
    <div class="col-sm col-sm-12">

        <div class="card">
            <div class="card-header text-center">
                Alta
            </div>

            <div class="card-body">
                <form method="POST" action="<?=HOST?>curriculums/alta">
                    <input type="hidden" name="usuario_id" value="<?php $_SESSION['Usuario']['id'] ?>">

                    <div class="form-group row">
                        <label for="title" class="col-3 col-form-label">Titulo de CV</label>
                        <div class="col-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen"></i>
                                    </div>
                                </div>
                                <input id="title" name="title" placeholder="Ej.: 13" type="text" aria-describedby="materias_aprobadasHelpBlock" required="required" class="form-control">
                            </div>
                            <span id="titleHelpBlock" class="form-text text-muted small">Para diferenciar tus CV, solo lo veras tu.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_carrera" class="col-3 col-form-label">Carrera</label>
                        <div class="col-9">
                            <select id="id_carrera" name="id_carrera" class="form-control mb-4" required="required">
                                <option value="">Seleccione una Carrera</option>
                                <?php if (!empty($carreras)) : ?>
                                    <?php foreach ($carreras as $key => $value) : ?>
                                    <?php $check = ((!empty($_POST["carrera_id"]) AND ($_POST["carrera_id"] = $key))? 'selected' : '')?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="materias_aprobadas" class="col-3 col-form-label">Materias Aprobadas</label>
                        <div class="col-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                </div>
                                <input id="materias_aprobadas" name="materias_aprobadas" placeholder="Ej.: 13" type="text" aria-describedby="materias_aprobadasHelpBlock" required="required" class="form-control">
                            </div>
                            <span id="materias_aprobadasHelpBlock" class="form-text text-muted small">Ingresa un numero.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="promedio" class="col-3 col-form-label">Promedio</label>
                        <div class="col-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                                <input id="promedio" name="promedio" placeholder="Ej.: 8,42" type="text" class="form-control" aria-describedby="promedioHelpBlock" required="required">
                            </div>
                            <span id="promedioHelpBlock" class="form-text text-muted small">Solo calcula finales aprobados.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="conocimientos" class="col-3 col-form-label">Conocimientos</label>
                        <div class="col-9">
                            <textarea id="conocimientos" name="conocimientos" cols="40" rows="10" class="form-control"></textarea>
                            <span id="conocimientossHelpBlock" class="form-text text-muted small">Te recomendamos listarlos con SHIFT+ENTER</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="experiencia_laboral" class="col-3 col-form-label">Experiencia Laboral</label>
                        <div class="col-9">
                            <textarea id="experiencia_laboral" name="experiencia_laboral" cols="40" rows="10" class="form-control"></textarea>
                            <span id="experiencia_laboralHelpBlock" class="form-text text-muted small">Ejemplo: Nombre empresa, (Fecha desde/hasta), Puesto, Funciones que realizaste.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="objetivos" class="col-3 col-form-label">Intereses / Objetivos</label>
                        <div class="col-9">
                            <textarea id="objetivos" name="objetivos" cols="40" rows="5" class="form-control" aria-describedby="objetivosHelpBlock"></textarea>
                            <span id="objetivosHelpBlock" class="form-text text-muted small">Se conciso.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="resumen" class="col-3 col-form-label">Resumen</label>
                        <div class="col-9">
                            <textarea id="resumen" name="resumen" cols="40" rows="10" class="form-control"></textarea>
                            <span id="conocimientossHelpBlock" class="form-text text-muted small"></span>
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-12">
                            <button name="submit" type="submit" class="btn btn-primary float-right">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
