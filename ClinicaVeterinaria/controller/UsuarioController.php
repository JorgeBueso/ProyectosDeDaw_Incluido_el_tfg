<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Usuario;


class UsuarioController
{
    var $db;
    var $view;

    function __construct()
    {
        //Conexión a la BBDD
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;

        //Instancio el ViewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }

    public function admin(){

        //LLamo a la vista
        $this->view->vista("app","index");

    }

    public function entrar(){
echo ("UserControllerEntrar1");
        //Si ya está autenticado, le llevo a la página de inicio del panel
        if (isset($_SESSION['usuario'])){
            echo ("UserControllerEntrar1");

            $this->admin();

        }
        //Si ha pulsado el botón de acceder, tramito el formulario
        else if (isset($_POST["acceder"])){
            echo ("UserControllerEntrar2");

            //Recupero los datos del formulario
            $usuarioMetido = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $claveMetida = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING);

            //Busco al usuario en la base de datos
            $rowset = $this->db->query("SELECT * FROM usuario WHERE usuario='$usuarioMetido'  LIMIT 1");

            //Asigno resultado a una instancia del modelo
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $usuario = new Usuario($row);

            //Si existe el usuario
            if ($usuario){
                //Compruebo la clave

                if (password_verify($claveMetida,$usuario->clave)) {

                    //Asigno el usuario y los permisos la sesión
                    $_SESSION["usuario"] = $usuario->usuario;

                    //Redirección con mensaje
                    $this->view->redireccionConMensaje("admin","green","Bienvenido al panel de administración.");
                }
                else{
                    //Redirección con mensaje
                    $this->view->redireccionConMensaje("admin","red","Contraseña incorrecta.");
                }
            }
            else{
                //Redirección con mensaje
                $this->view->redireccionConMensaje("admin","red","No existe ningún usuario con ese nombre.");
            }
        }
        //Le llevo a la página de acceso
        else{echo ("UserControllerEntrar3");

            $this->view->vista("admin","usuarios/entrar");
        }

    }

}