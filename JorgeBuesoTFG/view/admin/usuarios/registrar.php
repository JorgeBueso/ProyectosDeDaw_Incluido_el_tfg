<div class="RegistroUsuarios">
    <h3>
        <?php if ($datos->id){ ?>
            <strong class="nombreUsuarioEditar">Editar <?php echo $datos->usuario ?></strong>
        <?php } else { ?>
            <span>Nuevo usuario</span>
        <?php } ?>
    </h3>

    <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
    <form class="col m12 l3" method="POST" action="<?php echo $_SESSION['home'] ?>admin/usuarios/registrar/<?php echo $id ?>">
        <div class="form-group">
            <div class="input-field col s12">
                <input id="usuario" type="text" placeholder="Usuario" name="usuario" value="<?php echo $datos->usuario ?>">

            </div>
            <?php $clase = ($datos->id) ? "hide" : "" ?>
            <div class="input-field col s12 <?php echo $clase ?>" id="password">
                <input id="clave" type="password" placeholder="Contraseña" name="clave" value="">

            </div>

            <div class="input-field col s12">
                <a href="<?php echo $_SESSION['home'] ?>admin/entrar" title="Volver">
                    <button class="btn btn-outline-warning" type="button">Volver
                    </button>
                </a>

                <button class="btn btn-outline-light" type="submit" name="Boton_registrar">guardar</button>

            </div>

        </div>
    </form>
</div>