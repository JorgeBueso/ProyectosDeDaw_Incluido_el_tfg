<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TFG</title>

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['public'] ?>css/admin.css">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">


</head>

<body>
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Logo-->
            <a href="<?php echo $_SESSION['home'] ?>" class="navbar-brand" title="Inicio">
                <img src="<?php echo $_SESSION['public'] ?>img/" alt="Mayor Cuidado">
            </a>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] . "admin/accesorios/index" ?>">Inicio <span
                                class="sr-only">(current)</span></a>
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

                <!--            --><?php //if ($_SESSION['usuarios'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/usuarios">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/blog">Blog</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_SESSION['home'] ?>admin/accesorios/crear">Añadir un nuevo
                        accesorio</a>
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