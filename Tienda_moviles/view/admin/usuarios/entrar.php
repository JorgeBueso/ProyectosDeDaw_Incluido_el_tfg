<!DOCTYPE html>
<html>
<head>
    <title>My Awesome Login Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo $_SESSION["public"] . "css/admin.css" ?>">
    <!--    PARA LOS ICONOS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="<?php $_SESSION['public']?>../img/movil.png" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form  class="col m12 l6" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="usuario" type="text" name="usuario" class="form-control input_user" value=""
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

                </form>
            </div>

<!--            <div class="mt-4">-->
<!--                <div class="d-flex justify-content-center links">-->
<!--                    Don't have an account? <a href="#" class="ml-2">Sign Up</a>-->
<!--                </div>-->
<!--                <div class="d-flex justify-content-center links">-->
<!--                    <a href="#">Forgot your password?</a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>