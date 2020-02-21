<?php
namespace App\Helper;

class ViewHelper
{
function composicion($carpeta,$archivo,$datos=null){
    //CABECERA
    require ("../view/$carpeta/partials/header.php");

    //CONTENIDO
    require ("../view/$carpeta/$archivo.php");

    //FOOTER
    require ("../view/$carpeta/partials/footer.php");
}
}