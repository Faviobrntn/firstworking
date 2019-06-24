<div class="container">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <!-- Material form contact -->
<div class="card">

<h5 class="card-header info-color white-text text-center py-4">
    <strong>Nueva Oferta</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form action="<?=HOST?>ofertas/alta" method="post" class="text-left" style="color: #757575;">

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
            <label for="localidad-id"><strong>Localidad</strong></label></br>
            <select name="localidad_id" id="localidad-id" class="form-control">
                <?php if(!empty($localidades)): ?>
                    <?php foreach($localidades as $key => $value): ?>
                        <?php $check = ((!empty($_POST["localidad_id"]) AND ($_POST["localidad_id"] = $key))? 'selected' : '')?>; ?>
                        <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
            <p>&nbsp;</p>      
        </div>

        <!--Carrera-->
        <div class="md-form">
            <label for="carrera-id"><strong>Carrera</strong></label></br>
            <select name="carrera_id" id="carrera-id" class="form-control mb-4">
                <?php if(!empty($carreras)): ?>
                    <?php foreach($carreras as $key => $value): ?>
                        <?php $check = ((!empty($_POST["carrera_id"]) AND ($_POST["carrera_id"] = $key))? 'selected' : '')?>; ?>
                        <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
        </div>

        <!--Modalidad-->
        <div class="md-form">
            <label for="modalidad"><strong>Modalidad</strong></label></br>
            <input type="text" id="modalidad" class="form-control">    

        </div>

        <!--Horario Laboral-->
        <div class="md-form">
            <label for="horarioLaboral"><strong>Laboral</strong></label></br>
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
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Registrar</button>

    </form>
    <!-- Form -->

</div>
</body>

</html>