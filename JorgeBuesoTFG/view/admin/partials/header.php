<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>El colmado del mayor</title>

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['public'] ?>css/admin.css">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">


</head>

<body>

<header>
<!--    IAGEN LOGOTIPO-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Logo-->
            <a href="<?php echo $_SESSION['home'] ?>" class="navbar-brand" title="Inicio">
                <img class="logotipo" src="<?php echo $_SESSION['public'] ?>img/logotipoModificado.png" alt="El colmado del mayor">
                <h4>El colmado del mayor</h4>
            </a>
        </div>
    </nav>

<!--    MENÚ DEL HEADER-->
    <nav class="navbar navbar-expand-lg navbar-light menuHeader ">

        <div class="collapse navbar-collapse " >
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] . "admin/accesorios/index" ?>">Inicio </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        ALIMENTACION
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="<?php echo $_SESSION['home'] . "AdminBaberos" ?>"
                           title="Baberos">Baberos</a>
                        <a class="dropdown-item" href="<?php echo $_SESSION['home'] . "AdminMenaje" ?>"
                           title="Menaje">Menaje</a>

                    </div>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        MOVILIDAD
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="<?php echo $_SESSION['home'] ?>Adminbastones">Bastones</a>
                        <a class="dropdown-item" href="<?php echo $_SESSION['home'] ?>AdminSillaDeRuedas"
                           title="Silla de ruedas">Silla De ruedas</a>
                    </div>
                </li>

                <?php if (isset($_SESSION['usuario'])) { ?>
                <?php if ($_SESSION['usuarios'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/usuarios">Usuarios</a>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/personal">Personal</a>
                </li>

                <?php if ($_SESSION['accesorios'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/accesorios/crear">Añadir un nuevo
                        accesorio</a>
                </li>
                <?php } ?>
                <li class="nav-item">

                        <a class="nav-link" name="nombre_usuario"><?php echo $_SESSION['usuario'] ?></a>

                    <?php } ?>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/salir" title="Salir">Salir</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>cesta" title="verCesta">Cesta</a>
                </li>

            </ul>

        </div>
    </nav>
</header>
<main>



    <section class="container-fluid">