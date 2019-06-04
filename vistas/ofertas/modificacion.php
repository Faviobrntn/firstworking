<!DOCTYPE html>
<head>
<title>Modificar Oferta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <!-- Material form contact -->
<div class="card">

<h5 class="card-header info-color white-text text-center py-4">
    <strong>Editar Oferta</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-left" style="color: #757575;">

        <!-- Titulo -->
        <div class="md-form mt-3">
            <label for="titulo"><strong>Titulo</strong></label></br>
            <input type="text" id="titulo" class="form-control" autofocus>
            <p>&nbsp;</p>
        </div>  

        <!-- Descripcion -->
        <div class="md-form">
            <label for="descripcion"><strong>Descripcion</strong></label></br>
            <textarea id="descripcion" class="form-control md-textarea" rows="3"></textarea>  
            <p>&nbsp;</p>          
        </div>

        <!--Localidad-->
        <div class="md-form">
            <label for="localidad"><strong>Localidad</strong></label></br>
            <input type="text" id="localidad" class="form-control">      
            <p>&nbsp;</p>      
        </div>

        <!--Carrera-->
        <div class="md-form">
            <label for="carrera"><strong>Carrera</strong></label></br>
            <input type="text" id="carrera" class="form-control">      

        </div>

        <!--Modalidad-->
        <div class="md-form">
            <label for="modalidad"><strong>Modalidad</strong></label></br>
            <input type="text" id="modalidad" class="form-control">    

        </div>

        <!--Horario Laboral-->
        <div class="md-form">
            <label for="horarioLaboral"><strong>Horario Laboral</strong></label></br>
            <input type="text" id="horarioLaboral" class="form-control"> 
            <p>&nbsp;</p>          
        </div>

        <!--Remuneracion-->
        <div class="md-form">
            <label for="remuneracion"><strong>Remuneracion</strong></label></br></br>
            <input type="float" id="remuneracion" class="form-control">     
            <p>&nbsp;</p>
        </div>

        <!--Fecha Creacion-->
        <div class="md-form">
            <label for="creado"><strong>Fecha Creacion</strong></label></br></br>
            <input type="datetime" id="creado" class="form-control">      
            <p>&nbsp;</p>      
        </div>

        <!-- Send button -->
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Actualizar</button>

    </form>
    <!-- Form -->

</div>
</body>
</html>