<?php

namespace App;

//Inicializo sesión para poder traspasar variables entre páginas
session_start();

//Incluyo los controladores que voy a utilizar para que seran cargados por Autoload
use App\Controller\AppController;
use App\Controller\AccesorioController;
use App\Controller\UsuarioController;

/*
 * Asigno a sesión las rutas de las carpetas public y home, necesarias tanto para las rutas como para
 * poder enlazar imágenes y archivos css, js
 */
$_SESSION['public'] = '/JorgeBuesoTFG/public/';
$_SESSION['home'] = $_SESSION['public'] . 'index.php/';

//Defino y llamo a la función que autocargará las clases cuando se instancien
spl_autoload_register('App\autoload');

function autoload($clase, $dir = null)
{

    //Directorio raíz de mi proyecto
    if (is_null($dir)) {
        $dirname = str_replace('/public', '', dirname(__FILE__));
        $dir = realpath($dirname);
    }

    //Escaneo en busca de la clase de forma recursiva
    foreach (scandir($dir) as $file) {
        //Si es un directorio (y no es de sistema) accedo y
        //busco la clase dentro de él
        if (is_dir($dir . "/" . $file) AND substr($file, 0, 1) !== '.') {
            autoload($clase, $dir . "/" . $file);
        } //Si es un fichero y el nombre conicide con el de la clase
        else if (is_file($dir . "/" . $file) AND $file == substr(strrchr($clase, "\\"), 1) . ".php") {
            require($dir . "/" . $file);
        }
    }

}

//Para invocar al controlador en cada ruta
function controlador($nombre = null)
{

    switch ($nombre) {
        default:
            return new AppController;
        case "accesorios":
            return new AccesorioController;
        case "usuarios":
            return new UsuarioController;
    }

}

//Quito la ruta de la home por la que me están pidiendo
$ruta = str_replace($_SESSION['home'], '', $_SERVER['REQUEST_URI']);

//Encamino cada ruta al controlador y acción correspondientes
switch ($ruta) {

    //Front-end
    case "":
    case "/":
        controlador()->accesorios();
        break;

////////////////////////////PARTE USUARIO/////////////////////////////////////////////

    //página donde están todos los productos
    case "Menaje":
        controlador("accesorios")->menaje();
        break;
    case"sillaDeRuedas":
        controlador("accesorios")->sillaDeRuedas();
        break;
    case"Baberos":
        controlador("accesorios")->baberos();
        break;
    case"bastones":
        controlador("accesorios")->bastones();
        break;

    //página específica para un producto
    case (strpos($ruta, "accesorio/") === 0):
        controlador()->accesorio(str_replace("accesorio/", "", $ruta));
        break;


////////////////////////////////////// CARRITO Y regsitro/////////////////////////////////////////////
    case"":

    case"carrito":
        controlador()->carrito();
        break;

////////////////////////////////////// PARTE ADMIN/////////////////////////////////////////////

    case "admin":

    case"admin/entrar":
        controlador("usuarios")->entrar();
        break;

    case"admin/usuarios/registrar":
        controlador("usuarios")->crear();
        break;

    case"admin/entrar":
        controlador("usuarios")->registrar();
        break;

    case "admin/salir":
        controlador("usuarios")->salir();
        break;

    case"admin/accesorios/index":
        controlador()->admin();
    break;

    //Resto de rutas
    default:
        controlador()->accesorios();

}