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
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>
                <?php if ($datos->id) { ?>
                    <strong class="nombreUsuarioEditar">Editar <?php echo $datos->usuario ?></strong>
                <?php } else { ?>
                    <span>Nuevo usuario</span>
                <?php } ?>
            </h3>

            <form class="col m12 l6" method="POST"
                  action="<?php echo $_SESSION['home'] ?>admin/usuarios/editar/<?php echo $id ?>">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>

                        <input id="usuario" type="text" name="usuario" class="form-control input_user"                               placeholder="username""
                               value ="<?php echo $datos->usuario ?>">

                    </div>

                    <?php $clase = ($datos->id) ? "hide" : "" ?>
                    <div class="input-field col s12 <?php echo $clase ?>" id="password">

                        <input id="clave" type="password" placeholder="Contraseña" name="clave" value="">

                    </div>

                </div>

                <div class="row">


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
