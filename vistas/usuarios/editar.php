<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Usuarios/editar/<?= $usuario['id']; ?></span>
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
                Editar #<?= $usuario['id']; ?>
            </div>
            
            <div class="card-body">
                
                <form class="form-signin" action="" method="post">                        

                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control mb-4" placeholder="Nombre" value="<?=(!empty($usuario["nombre"])? $usuario["nombre"] : '')?>">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control mb-4" placeholder="Apellido" value="<?=(!empty($usuario["apellido"])? $usuario["apellido"] : '')?>">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control mb-4" placeholder="E-mail" value="<?=(!empty($usuario["email"])? $usuario["email"] : '')?>">
                    <label for="localidad-id">Localidad</label>
                    <select name="localidad_id" id="localidad-id" class="form-control mb-4">
                        <option value="">Seleccione una localidad</option>
                        <?php if(!empty($localidades)): ?>
                            <?php foreach($localidades as $localidad_id => $local): $checkloc = ''; ?>
                                <?php if (!empty($usuario["localidad_id"])): ?>
                                <?php $checkloc = ($usuario["localidad_id"] == $localidad_id)? 'selected' : ''; ?>
                                <?php endif ?>
                                <option value="<?=$localidad_id?>" <?=$checkloc?> ><?= ucfirst($local) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <label for="rol">Rol</label>
                    <select name="rol" id="rol" class="form-control mb-4">
                        <option value="">Seleccione un rol</option>
                        <?php if(!empty($roles)): ?>
                            <?php foreach($roles as $rol_id => $rol): $checkrol = '';?>
                                <?php if (!empty($usuario["rol"])): ?>
                                <?php $checkrol = ($usuario["rol"] == $rol_id)? 'selected' : ''; ?>
                                <?php endif ?>
                                <option value="<?=$rol_id?>" <?=$checkrol?> ><?= ucfirst($rol) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    
                    <button class="btn btn-success float-right" type="submit">Guardar!</button>
                </form>
            </div>
        </div>
    </div>
    
</div>