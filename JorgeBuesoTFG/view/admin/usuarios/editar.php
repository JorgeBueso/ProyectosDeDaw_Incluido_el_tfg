<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Inicio de sesión / Registro</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!--    CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['public'] ?>css/admin.css">

</head>

<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="col-md-6 RegistroUsuarios">
            <div class="d-flex justify-content-center">
                <div class="ContenedorImagenRegisto">
                    <img src="<?php $_SESSION['public']?>../img/logotipoModificado.png" class="brand_logo" alt="Logo">
                </div>
            </div>
            <h3>
                <?php if ($datos->id) { ?>
                    <strong class="nombreUsuarioEditar">Editar <?php echo $datos->usuario ?></strong>
                <?php } else { ?>
                    <span>Nuevo usuario</span>
                <?php } ?>
            </h3>
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

                <p>¿Puede modificar los accesorios? </p>

                <p>
                    <label for="accesorios">
                        <input id="accesorios" name="accesorios" type="checkbox" <?php echo ($datos->accesorios == 1) ? "checked" : "" ?>>
                        <span></span>
                    </label>
                </p>

                <p>¿Puede modificar los usuarios? </p>

                <p>
                    <label for="usuarios">
                        <input id="usuarios" name="usuarios" type="checkbox" <?php echo ($datos->usuarios == 1) ? "checked" : "" ?>>
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


    </div>
</div>

