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
            <h3>Inicio de sesión</h3>

            <form class="col m12 l6" method="POST">

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="usuario" class="form-control input_user" value=""
                           placeholder="username">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>

                    <input id="clave" type="password" name="clave" class="form-control input_pass" value=""
                           placeholder="password">
                </div>

                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="acceder" class="btn login_btn">Login</button>
                </div>

                <a href="<?php echo $_SESSION['home'] ?>admin/usuarios/registrar">registrarse</a>

            </form>
        </div>


    </div>
</div>