<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Crear CV</title>

    <!--
    <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/css/floating-labels.css">-->
    <!-- Font Awesome -->
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

</head>

<body>
    <section class="flex-container my-4">


        <!-- Card -->
        <div class="row ">
            <?php if (!empty($curriculums)) : ?>
                <?php foreach ($curriculums as $cv) : ?>
                    <div class="col-sm">
                        <div class="card mx-1 my-1">

                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src="<?= $cv['url_imagen'] ?>" alt="Card image cap">
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
                                    <a onclick="seleccionar($(cv.id))" class="btn btn-success">
                                        <i class="far fa-check-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

    </section>

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
    <!-- Bootstrap core JavaScript 
    <script src="<?= HOST ?>vendor/js/jquery.min.js"></script>
    <script src="<?= HOST ?>vendor/js/bootstrap.bundle.min.js"></script>-->
</body>

<script type="text/JavaScript">
    $("#files").change(function() {
        if(files!=null){
            if(this.files[0] != null){
                filename = this.files[0].name;
                console.log(filename);  
                $("#formSubirCV").submit();          
            }
        }
    });

var id = null;
   
   function seleccionar(){
       
    }

   function borrar(){
       
    }
</script>

</html>