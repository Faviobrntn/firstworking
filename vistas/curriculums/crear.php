<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear CV</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm col-sm-12">



                <div class="card-body mt-2 px-lg-5 pt-0">
                    <form>
                        <input type="hidden" name="usuario_id" value="<?php $_SESSION['usuario']['id'] ?>">

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
                                <select id="id_carrera" name="id_carrera" class="custom-select" required="required">
                                    <option value="">Seleccione una Carrera</option>
                                    <?php if (!empty($carreras)) : ?>
                                        <?php foreach ($carreras as $key => $value) : ?>
                                            <option value="<?= $key ?>"><?= ucfirst($value) ?></option>
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
                            <div class="offset-10 col-9">
                                <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= HOST ?>vendor/js/jquery.min.js"></script>
    <script src="<?= HOST ?>vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>