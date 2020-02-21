<?php
namespace App\Helper;

class ViewHelper
{
function composicion($carpeta,$archivo,$datos=null){
    //CABECERA
    require ("../view/app/partials/header.php");
    //CONTENIDO
    require ("../view/app/$archivo.php");

    //FOOTER
    require ("../view/app/partials/footer.php");
}
}