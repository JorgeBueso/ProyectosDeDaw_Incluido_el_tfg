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

        //Permisos
        $this->view->permisos("accesorios");

        //Creo un nuevo usuario vacío
        $accesorio = new Accesorio();

        //Llamo a la ventana de edición
        $this->view->vista("admin","accesorios/editar", $accesorio);

    }

    public function editar($id){

        //Permisos
        $this->view->permisos("accesorios");

        //Si ha pulsado el botón de guardar
        if (isset($_POST["guardar"])){

            //Recupero los datos del formulario
            $grupo = filter_input(INPUT_POST, "grupo", FILTER_SANITIZE_STRING);
            $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
            $precio = filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING);
            $caracteristicas = filter_input(INPUT_POST, "texto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $entradilla = filter_input(INPUT_POST, "texto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            //Genero slug (url amigable)
            $slug = $this->view->getSlug($nombre);

            //Imagen
            $imagen_recibida = $_FILES['imagen'];
            $imagen = ($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "";
            $imagen_subida = ($_FILES['imagen']['name']) ? '/var/www/html'.$_SESSION['public']."img/".$_FILES['imagen']['name'] : "";
            $texto_img = ""; //Para el mensaje
            echo("' '.despues de crear la imagen");

            if ($id == "nuevo"){
                echo("' '.no llega a meter los datos");
                //Inserto en el móvil los datos
                $consulta = $this->db->exec("INSERT INTO accesorios 
                    (grupo, tipo, nombre,slug, precio, caracteristicas, imagen,entradilla) VALUES 
                    ('$grupo','$tipo','$nombre','$slug','$precio','$caracteristicas','$imagen','$entradilla')");
                echo("' . 'llega a meter los datos'");
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
                    $this->view->redireccionConMensaje("admin/accesorios","black","El accesorio <strong>$nombre</strong> se ha creado correctamente.".$texto_img) :
                    $this->view->redireccionConMensaje("admin/accesorios","red","Hubo un error al guardar en la base de datos.");
            }
            else{
                echo("' '.id no es nuevo");
                //Actualizo el acccesorio
                $this->db->exec("UPDATE accesorios SET 
                    grupo='$grupo', tipo='$tipo',nombre='$nombre',slug='$slug',
                    precio='$precio',caracteristicas='$caracteristicas',entradilla='$entradilla' WHERE id='$id'");
                echo("' '.despues de crear la imagen");
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
                $this->view->redireccionConMensaje("admin/accesorios","black","<strong>$nombre</strong> se ha guardado correctamente.".$texto_img);

            }
        }

        //Si no he pulsado el botón de guardar, obtengo el accesorio y muestro la ventana de edición
        else{

            //Obtengo el accesorio
            $rowset = $this->db->query("SELECT * FROM accesorios WHERE id='$id' LIMIT 1");
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $accesorio = new Accesorio($row);

            //Llamo a la ventana de edición
            $this->view->vista("admin","accesorios/editar", $accesorio);
        }

    }

    public function borrarAccesorio($id){

        //Borro el usuario
        $consulta = $this->db->exec("DELETE FROM accesorios WHERE id='$id'");

        //Mensaje y redirección
        ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
            $this->view->redireccionConMensaje("admin/accesorios/index","green","El usuario se ha borrado correctamente.") :
            $this->view->redireccionConMensaje("admin/blog","red","Hubo un error al guardar en la base de datos.");

    }



}