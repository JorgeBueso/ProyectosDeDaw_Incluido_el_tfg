<?php

namespace App\Helper;

class ViewHelper
{
    function vista($carpeta, $archivo, $datos = null)
    {
        
        if ($carpeta == "admin" && $archivo == "usuarios/entrar" || $archivo=="usuarios/registrar") {
            require("../view/$carpeta/$archivo.php");

        } else {

            //CABECERA
            require("../view/$carpeta/partials/header.php");
//            echo $carpeta." "."archivo:".$archivo;
            //BODY
            require("../view/$carpeta/$archivo.php");

            //PIE
            require("../view/$carpeta/partials/footer.php");
        }

    }

    public function permisos($permiso=null){

        if (isset($_SESSION['usuario']) AND ($permiso == null OR $_SESSION[$permiso] == 1)){
            return true;

        }
        else{
            $this->redireccionConMensaje("admin","yellow", "No tienes permiso para realizar esta operación");
            echo"No tienes permiso para realizar esta operación";
        }

    }

    public function redireccionConMensaje($ruta, $tipo, $texto)
    {
echo $ruta;
        $_SESSION['mensaje'] = array("tipo" => $tipo, "texto" => $texto);
        header("Location:" . $_SESSION["home"] . $ruta);
        echo $ruta;

    }
}