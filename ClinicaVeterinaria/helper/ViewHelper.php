<?php
namespace App\Helper;

class ViewHelper
{

function composicion($carpeta,$archivo,$datos=null){

echo("ViewHelper");
    //CABECERA
    require ("../view/$carpeta/partials/header.php");
    echo("ViewHelper CABEZA");
    echo($carpeta);
    echo($archivo);

    //CONTENIDO
    require ("/view/$carpeta/$archivo.php");
    echo("ViewHelper CUERPO ");
    //FOOTER
    require ("../view/$carpeta/partials/footer.php");
    echo("ViewHelper PIE");
}

}