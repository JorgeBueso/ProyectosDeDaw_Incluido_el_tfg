<?php

namespace App\Controller;

use App\Model\Accesorio;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;


class AccesorioController
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

    public function baberos(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Babero' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $baberos = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($baberos,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $baberos);

    }

    public function menaje(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Menaje' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $accesorios = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($accesorios,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $accesorios);
    }

    public function sillaDeRuedas(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Sillas de ruedas' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $accesorios = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($accesorios,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $accesorios);
    }

    public function bastones(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Baston' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $bastones = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($bastones,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $bastones);
    }


/////////////////////////////////////////////////////ADMIN//////////////////////////////////////////////////

    public function AdminBaberos(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Babero' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $baberos = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($baberos,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("admin", "accesorios/index", $baberos);

    }

    public function AdminMenaje(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Menaje' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $accesorios = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($accesorios,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("admin", "accesorios/index", $accesorios);
    }

    public function AdminSillaDeRuedas(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Sillas de ruedas' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $accesorios = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($accesorios,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("admin", "accesorios/index", $accesorios);
    }

    public function Adminbastones(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE tipo= 'Baston' ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $bastones = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($bastones,new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("admin", "accesorios/index", $bastones);
    }


    /*/************************************************************CREACIÓN DE UN NUEVO ACCESORIO***************************************/

    public function crear(){
//
//        //Permisos
//        $this->view->permisos("accesorios");
//
//        //Creo un nuevo usuario vacío
//        $accesorios = new Accesorio();

        $this->view->vista("admin","accesorios/Crear_Editar");
    }

//    public function modificar($id){
//        //Permisos
////        $this->view->permisos("accesorios");
//
//        $this->view->vista("admin","accesorios/Crear_Editar");
//
//    }

    public function modificar($id){

        //Permisos
//        $this->view->permisos("accesorios");

        //Si ha pulsado el botón de guardar
        if (isset($_POST["guardar"])){

            //Recupero los datos del formulario
            $grupo = filter_input(INPUT_POST, "grupo", FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
            $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_STRING);
            $stock= filter_input(INPUT_POST, "stock", FILTER_SANITIZE_STRING);
            $precio = filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING);
            $caracteristicas = filter_input(INPUT_POST, "texto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //Genero slug (url amigable)
            $slug = $this->view->getSlug($nombre);

            //Imagen
            $imagen_recibida = $_FILES['imagen'];
            $imagen = ($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "";
            $imagen_subida = ($_FILES['imagen']['name']) ? '/var/www/html'.$_SESSION['public']."img/".$_FILES['imagen']['name'] : "";
            $texto_img = ""; //Para el mensaje
            echo("' '.boton 4");

            if ($id == "nuevo"){
                echo("' '.boton 5");
                //Inserto en el móvil los datos
                $consulta = $this->db->exec("INSERT INTO accesorios
                    (nombre,tipo, grupo,stock, slug, precio, caracteristicas, imagen) VALUES
                    ('$nombre','$tipo','$grupo','$stock','$slug','$precio','$caracteristicas','$imagen')");
                echo("' '.boton 6");
                //Subo la imagen
                if ($imagen){
                    if (is_uploaded_file($imagen_recibida['tmp_name']) && move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)){
                        $texto_img = " La imagen se ha subido correctamente.";
                    }
                    else{
                        $texto_img = " Hubo un problema al subir la imagen.";
                    }
                }

                //Mensaje y redirección
                ($consulta > 0) ?
                    $this->view->redireccionConMensaje("admin/accesorios/index","black","El movil <strong>$nombre</strong> se creado correctamente.".$texto_img) :
                    $this->view->redireccionConMensaje("admin/accesorios/index","red","Hubo un error al guardar en la base de datos.");

            }
            else{

                //Actualizo el móvil
                $this->db->exec("UPDATE accesorios SET
                    nombre='$nombre',grupo='$grupo', tipo='$tipo',slug='$slug',
                    precio='$precio',caracteristicas='$caracteristicas' WHERE id='$id'");

                //Subo y actualizo la imagen
                if ($imagen){
                    if (is_uploaded_file($imagen_recibida['tmp_name']) && move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)){
                        $texto_img = " La imagen se ha subido correctamente.";
                        $this->db->exec("UPDATE accesorios SET imagen='$imagen' WHERE id='$id'");
                    }
                    else{
                        $texto_img = " Hubo un problema al subir la imagen.";
                    }
                }

                //Mensaje y redirección
                $this->view->redireccionConMensaje("admin/accesorios/index","black","<strong>$nombre</strong> se ha guardado correctamente.".$texto_img);

            }
        }

        //Si no he pulsado el botón de guardar, obtengo el móvil y muestro la ventana de edición
        else{

            //Obtengo el móvil
            $rowset = $this->db->query("SELECT * FROM accesorios WHERE id='$id' LIMIT 1");
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $accesorios = new Accesorio($row);

            //Llamo a la ventana de edición
            $this->view->vista("admin","accesorios/Crear_Editar", $accesorios);
        }

    }


}