<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Noticias de Moviles</title>

    <!--CSS-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['public'] ?>css/app.css">
</head>

<body>
<nav class="header">
    <div class="nav-wrapper">

        <!--Logo-->
        <a href="<?php echo $_SESSION['home'] ?>" class="brand-logo" title="Inicio">
            <img class="imagenHeader" src="<?php echo $_SESSION['public'] ?>img/movil.png" alt="Logo Movil">
        </a>

        <!--Botón menú móviles-->
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><span uk-icon="icon: menu"></span></a>

        <!--Menú de navegación-->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a>
            </li>
            <li>
                <a href="<?php echo $_SESSION['home'] ?>moviles" title="Moviles">Moviles</a>
            </li>

            <li>
                <a href="<?php echo $_SESSION['home'] ?>admin" title="Panel de administración"
                   target="_blank" >
                    Registrarse
                </a>
            </li>
        </ul>

    </div>
</nav>


<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<!--Menú de navegación móvil-->
<ul class="sidenav" id="mobile-demo">
    <li>
        <a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a>
    </li>
    <li>
        <a href="<?php echo $_SESSION['home'] ?>moviles" title="Moviles">moviles</a>
    </li>
    <li>
        <a href="<?php echo $_SESSION['home'] ?>acerca-de" title="Acerca de">Acerca de</a>
    </li>
    <li>
        <a href="<?php echo $_SESSION['home'] ?>admin" title="Panel de administración"
           target="_blank" class="grey-text">
            Registrarse
        </a>
    </li>
</ul>

<main>