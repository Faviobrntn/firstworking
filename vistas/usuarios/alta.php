<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Usuarios/alta</span>
        </h4>

        <div class="d-flex justify-content-center">
            <a href="<?=HOST?>usuarios" class="btn btn-dark btn-sm my-0 p">
                Volver
            </a>
        </div>

    </div>

</div>
<!-- Heading -->

<div class="row wow fadeIn">

    <div class="col-md-6 mb-4">
        <!--Card-->
        <div class="card">
            <div class="card-header text-center">
                Alta
            </div>

            <!--Card content-->
            <div class="card-body">
                <!-- <div class="text-center p-3"> -->
                    <form action="<?=HOST?>usuarios/alta" method="post">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control mb-4" placeholder="Nombre" value="<?=(!empty($_POST["nombre"])? $_POST["nombre"] : '')?>">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" class="form-control mb-4" placeholder="Apellido" value="<?=(!empty($_POST["apellido"])? $_POST["apellido"] : '')?>">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" value="<?=(!empty($_POST["email"])? $_POST["email"] : '')?>">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mb-4" placeholder="Contraseña" value="<?=(!empty($_POST["password"])? $_POST["password"] : '')?>">
                        <label for="localidad-id">Localidad</label>
                        <select name="localidad_id" id="localidad-id" class="form-control mb-4">
                            <option value="">Seleccione una localidad</option>
                            <?php if(!empty($localidades)): ?>
                                <?php foreach($localidades as $key => $value): ?>
                                    <?php $check = ((!empty($_POST["localidad_id"]) AND ($_POST["localidad_id"] = $key))? 'selected' : '')?>; ?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        <label for="rol">Rol</label>
                        <select name="rol" id="rol" class="form-control mb-4">
                            <option value="">Seleccione un rol</option>
                            <?php if(!empty($roles)): ?>
                                <?php foreach($roles as $key => $value): ?>
                                    <?php $check = ((!empty($_POST["rol"]) AND ($_POST["rol"] = $key))? 'selected' : '')?>; ?>
                                    <option value="<?=$key?>" <?=$check?> ><?= ucfirst($value) ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        
                        <button class="btn btn-info float-right my-4" type="submit">Agregar</button>
                    </form>
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>
