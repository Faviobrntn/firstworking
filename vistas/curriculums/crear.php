<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear CV</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.1/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.1/js/mdb.min.js"></script>
    <!--<link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/css/floating-labels.css">-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">
                <div class="card">

                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Nuevo Curriculum Vitae</strong>
                    </h5>

                    <div class="card-body px-lg-5 pt-0">
                        <form>
                            <div class="form-group row">
                                <label for="idcarrera" class="col-4 col-form-label">Carrera</label>
                                <div class="col-8">
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
                                <label for="mataprob" class="col-4 col-form-label">Materias Aprobadas</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                        </div>
                                        <input id="mataprob" name="mataprob" placeholder="Ej.: 13" type="text" aria-describedby="mataprobHelpBlock" required="required" class="form-control">
                                    </div>
                                    <span id="mataprobHelpBlock" class="form-text text-muted">Ingresa un numero.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="promedio" class="col-4 col-form-label">Promedio</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <input id="promedio" name="promedio" placeholder="Ej.: 8,42" type="text" class="form-control" aria-describedby="promedioHelpBlock" required="required">
                                    </div>
                                    <span id="promedioHelpBlock" class="form-text text-muted">Solo calcula finales aprobados.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="conocimientos" class="col-4 col-form-label">Conocimientos</label>
                                <div class="col-8">
                                    <select id="conocimientos" name="conocimientos" class="custom-select" aria-describedby="conocimientosHelpBlock" multiple="multiple">
                                        <option value="php">PHP</option>
                                        <option value="csharp">C#</option>
                                        <option value="java">Java</option>
                                        <option value="redes">Redes</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                    <span id="conocimientosHelpBlock" class="form-text text-muted">Puedes seleccionar muchos.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="explab" class="col-4 col-form-label">Experiencia Laboral</label>
                                <div class="col-8">
                                    <textarea id="explab" name="explab" cols="40" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="intereses" class="col-4 col-form-label">Intereses / Objetivos</label>
                                <div class="col-8">
                                    <textarea id="intereses" name="intereses" cols="40" rows="5" class="form-control" aria-describedby="interesesHelpBlock"></textarea>
                                    <span id="interesesHelpBlock" class="form-text text-muted">Se conciso.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= HOST ?>vendor/js/jquery.min.js"></script>
    <script src="<?= HOST ?>vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>