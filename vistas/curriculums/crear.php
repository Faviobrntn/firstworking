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
                        <div class="form-group row">
                            <label for="titleCV" class="col-3 col-form-label">Titulo de CV</label>
                            <div class="col-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </div>
                                    </div>
                                    <input id="titleCV" name="titleCV" placeholder="Ej.: 13" type="text" aria-describedby="mataprobHelpBlock" required="required" class="form-control">
                                </div>
                                <span id="titleCVHelpBlock" class="form-text text-muted small">Para diferenciar tus CV, solo lo veras tu.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="idcarrera" class="col-3 col-form-label">Carrera</label>
                            <div class="col-9">
                                <select id="idcarrera" name="idcarrera" class="custom-select" required="required">
                                    <option value="0">ISI</option>
                                    <option value="1">Civil</option>
                                    <option value="2">Quimica</option>
                                    <option value="3">Electronica</option>
                                    <option value="4">Mecanica</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mataprob" class="col-3 col-form-label">Materias Aprobadas</label>
                            <div class="col-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-check-double"></i>
                                        </div>
                                    </div>
                                    <input id="mataprob" name="mataprob" placeholder="Ej.: 13" type="text" aria-describedby="mataprobHelpBlock" required="required" class="form-control">
                                </div>
                                <span id="mataprobHelpBlock" class="form-text text-muted small">Ingresa un numero.</span>
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
                                <select id="conocimientos" name="conocimientos" class="custom-select" aria-describedby="conocimientosHelpBlock" multiple="multiple">
                                    <option value="php">PHP</option>
                                    <option value="csharp">C#</option>
                                    <option value="java">Java</option>
                                    <option value="redes">Redes</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                <span id="conocimientosHelpBlock" class="form-text text-muted small">Puedes seleccionar muchos.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="explab" class="col-3 col-form-label">Experiencia Laboral</label>
                            <div class="col-9">
                                <textarea id="explab" name="explab" cols="40" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="intereses" class="col-3 col-form-label">Intereses / Objetivos</label>
                            <div class="col-9">
                                <textarea id="intereses" name="intereses" cols="40" rows="5" class="form-control" aria-describedby="interesesHelpBlock"></textarea>
                                <span id="interesesHelpBlock" class="form-text text-muted small">Se conciso.</span>
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