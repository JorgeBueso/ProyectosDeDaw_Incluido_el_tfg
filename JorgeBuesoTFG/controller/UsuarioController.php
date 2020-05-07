<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Accesorio;
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


    public function entrar()
    {

        //Si ya está autenticado, le llevo a la página de inicio del panel
        if (isset($_SESSION['usuario'])) {

            $this->admin();

        } //Si ha pulsado el botón de acceder, tramito el formulario
        else if (isset($_POST["acceder"])) {

            //Recupero los datos del formulario
            $campo_usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $campo_clave = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING);

            //Busco al usuario en la base de datos
            $rowset = $this->db->query("SELECT * FROM usuarios WHERE usuario='$campo_usuario' AND activo=1 LIMIT 1");

            //Asigno resultado a una instancia del modelo
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $usuario = new Usuario($row);

            //Si existe el usuario
            if ($usuario) {
                //Compruebo la clave
                if (password_verify($campo_clave, $usuario->clave)) {

                    //Asigno el usuario y los permisos la sesión
                    $_SESSION["usuario"] = $usuario->usuario;
                    $_SESSION["usuarios"] = $usuario->usuarios;
                    $_SESSION["accesorios"] = $usuario->accesorios;


                    //Redirección con mensaje
                    $this->view->redireccionConMensaje("admin", "green", "Bienvenido al panel de administración.");
                } else {
                    //Redirección con mensaje
                    $this->view->redireccionConMensaje("admin", "red", "Contraseña incorrecta.");
                }
            } else {
                //Redirección con mensaje
                $this->view->redireccionConMensaje("admin", "red", "No existe ningún usuario con ese nombre.");
            }
        } //Le llevo a la página de acceso
        else {
            $this->view->vista("admin", "usuarios/entrar");
        }

    }

    public function admin()
    {

        //Compruebo permisos
        $this->view->permisos();
        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE activo=1 AND home=1 ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $accesorios = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($accesorios,new Accesorio($row));
        }

        //LLamo a la vista
        $this->view->vista("admin", "accesorios/index",$accesorios);

    }

    public function salir()
    {
        unset($_SESSION['usuario']);

        //Redirección con mensaje
        $this->view->redireccionConMensaje("admin", "black", "Te has desconectado con éxito.");
    }


    public function crear()
    {

        //Creo un nuevo usuario vacío
        $usuario = new Usuario();

        //Llamo a la ventana de edición
        $this->view->vista("admin","usuarios/registrar", $usuario);

    }

    public function registrar($id)
    {

        //Permisos
        $this->view->permisos("usuarios");

        //Si ha pulsado el botón de guardar
        if (isset($_POST["Boton_registrar"])){

            //Recupero los datos del formulario
            $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $clave = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING);
            $usuarios = (filter_input(INPUT_POST, 'usuarios', FILTER_SANITIZE_STRING) == 'on') ? 1 : 0;
            $accesorios = (filter_input(INPUT_POST, 'accesorios', FILTER_SANITIZE_STRING) == 'on') ? 1 : 0;

            //Encripto la clave
            $clave_encriptada = ($clave) ? password_hash($clave,  PASSWORD_BCRYPT, ['cost'=>12]) : "";

                if ($id == "nuevo"){

                //Creo un nuevo usuario
                $this->db->exec("INSERT INTO usuarios (usuario, clave, accesorios, usuarios) VALUES ('$usuario','$clave_encriptada',$accesorios,$usuarios)");

                //Mensaje y redirección
//                $this->view->redireccionConMensaje("admin/usuarios","black","El usuario <strong>$usuario</strong> se creado correctamente.");
      echo "el usuario se creado correctamente.";
        $this->view->vista("admin","usuarios/entrar");
            }else{
                echo"usuario ya existente";
            }

        }

        //Si no, obtengo usuario y muestro la ventana de edición
        else{

            //Obtengo el usuario
            $rowset = $this->db->query("SELECT * FROM usuarios WHERE id='$id' LIMIT 1");
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $usuario = new Usuario($row);

            //Llamo a la ventana de edición
            $this->view->vista("admin","usuarios/registrar", $usuario);
        }
    }
}


