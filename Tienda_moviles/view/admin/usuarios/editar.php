<div class="RegistroUsuarios">
<h3>
    <?php if ($datos->id){ ?>
        <strong class="nombreUsuarioEditar">Editar <?php echo $datos->usuario ?></strong>
    <?php } else { ?>
        <span>Nuevo usuario</span>
    <?php } ?>
</h3>

    <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
    <form class="col m12 l3" method="POST" action="<?php echo $_SESSION['home'] ?>admin/usuarios/editar/<?php echo $id ?>">
        <div class="form-group">
            <div class="input-field col s12">
                <input id="usuario" type="text" placeholder="Usuario" name="usuario" value="<?php echo $datos->usuario ?>">

            </div>
            <?php $clase = ($datos->id) ? "hide" : "" ?>
            <div class="input-field col s12 <?php echo $clase ?>" id="password">
                <input id="clave" type="password" placeholder="Contraseña" name="clave" value="">

            </div>
            <?php $clase = ($datos->id) ? "" : "hide" ?>
            <p class="<?php echo $clase ?>">
                <label for="cambiar_clave">
                    <input id="cambiar_clave" name="cambiar_clave" type="checkbox">
                    <span>Pulsa para cambiar la clave</span>
                </label>
            </p>
        </div>

            <p>¿Puede modificar los móviles? </p>

            <p>
                <label for="moviles">
                    <input id="moviles" name="moviles" type="checkbox" <?php echo ($datos->moviles == 1) ? "checked" : "" ?>>
                    <span></span>
                </label>
            </p>
        <div class="row">

            <?php $clase = ($datos->id) ? "" : "hide" ?>
            <p class="<?php echo $clase ?>">
                Último acceso: <strong><?php echo date("d/m/Y H:i", strtotime($datos->fecha_acceso)) ?></strong>
            </p>

            <div class="input-field col s12">
                <a href="<?php echo $_SESSION['home'] ?>admin/usuarios" title="Volver">
                    <button class="btn btn-outline-warning" type="button">Volver
                        <span uk-icon="icon: reply ; color:yellow"></span>
                    </button>
                </a>
                <button class="btn btn-outline-light" type="submit" name="guardar">Guardar
                    <span uk-icon="icon: check "></span>
                </button>
            </div>

        </div>
    </form>
</div>