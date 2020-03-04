<?php
namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Movil;


class MovilController
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

    //Listado de noticias
    public function index(){

        //Permisos
        $this->view->permisos("moviles");

        //Recojo las noticias de la base de datos
        $rowset = $this->db->query("SELECT * FROM moviles ORDER BY precio DESC");

        //Asigno resultados a un array de instancias del modelo
        $moviles = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($moviles,new Movil($row));
        }

        $this->view->vista("admin","moviles/index", $moviles);

    }

    //Para activar o desactivar
    public function activar($id){

        //Permisos
        $this->view->permisos("moviles");

        //Obtengo la noticia
        $rowset = $this->db->query("SELECT * FROM moviles WHERE id='$id' LIMIT 1");
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $movil = new Movil($row);

        if ($movil->activo == 1){

            //Desactivo la noticia
            $consulta = $this->db->exec("UPDATE moviles SET activo=0 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/moviles","green","La noticia <strong>$movil->modelo</strong> se ha desactivado correctamente.") :
                $this->view->redireccionConMensaje("admin/moviles","red","Hubo un error al guardar en la base de datos.");
        }

        else{

            //Activo la noticia
            $consulta = $this->db->exec("UPDATE moviles SET activo=1 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/moviles","green","El movil <strong>$movil->modelo</strong> se ha activado correctamente.") :
                $this->view->redireccionConMensaje("admin/moviles","red","Hubo un error al guardar en la base de datos.");
        }

    }

    //Para mostrar o no en la home
    public function home($id){

        //Permisos
        $this->view->permisos("moviles");

        //Obtengo la noticia
        $rowset = $this->db->query("SELECT * FROM moviles WHERE id='$id' LIMIT 1");
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $movil = new Movil($row);

        if ($movil->home == 1){

            //Quito el movil de la home
            $consulta = $this->db->exec("UPDATE moviles SET home=0 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/moviles","green","El movil <strong>$movil->modelo</strong> ya no se muestra en la home.") :
                $this->view->redireccionConMensaje("admin/moviles","red","Hubo un error al guardar en la base de datos.");
        }

        else{

            //Muestro el movil en la home
            $consulta = $this->db->exec("UPDATE moviles SET home=1 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/moviles","green","El movil <strong>$movil->modelo</strong> ahora se muestra en la home.") :
                $this->view->redireccionConMensaje("admin/moviles","red","Hubo un error al guardar en la base de datos.");
        }

    }

    public function borrar($id){

        //Permisos
        $this->view->permisos("moviles");

        //Obtengo la noticia
        $rowset = $this->db->query("SELECT * FROM moviles WHERE id=' $id' LIMIT 1");
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $movil = new Movil($row);

        //Borro la noticia
        $consulta = $this->db->exec("DELETE FROM moviles WHERE id='$id'");

        //Borro la imagen asociada
        $archivo = $_SESSION['public']."img/".$movil->imagen;
        $texto_imagen = "";
        if (is_file($archivo)){
            unlink($archivo);
            $texto_imagen = " y se ha borrado la imagen asociada";
        }

        //Mensaje y redirección
        ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
            $this->view->redireccionConMensaje("admin/moviles","green","La noticia se ha borrado correctamente$texto_imagen.") :
            $this->view->redireccionConMensaje("admin/moviles","red","Hubo un error al guardar en la base de datos.");

    }

    public function crear(){

        //Permisos
        $this->view->permisos("moviles");

        //Creo un nuevo usuario vacío
        $movil = new Movil();

        //Llamo a la ventana de edición
        $this->view->vista("admin","moviles/editar", $movil);

    }

    public function editar($id){

        //Permisos
        $this->view->permisos("moviles");

        //Si ha pulsado el botón de guardar
        if (isset($_POST["guardar"])){
echo("boton 1");
            //Recupero los datos del formulario
            $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_STRING);
            $modelo = filter_input(INPUT_POST, "modelo", FILTER_SANITIZE_STRING);
            $precio = filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING);
            $caracteristicas = filter_input(INPUT_POST, "texto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            echo("' '.boton 2");

            //Genero slug (url amigable)
            $slug = $this->view->getSlug($modelo);
            echo("' '.boton 3");

            //Imagen
            $imagen_recibida = $_FILES['imagen'];
            $imagen = ($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "";
            $imagen_subida = ($_FILES['imagen']['name']) ? '/var/www/html'.$_SESSION['public']."img/".$_FILES['imagen']['name'] : "";
            $texto_img = ""; //Para el mensaje
            echo("' '.boton 4");

            if ($id == "nuevo"){
                echo("' '.boton 5");
                //Creo una nueva noticia
                $consulta = $this->db->exec("INSERT INTO moviles 
                    (marca, modelo, slug, precio, caracteristicas, imagen) VALUES 
                    ('$marca','$modelo','$slug','$precio','$caracteristicas','$imagen')");
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
                    $this->view->redireccionConMensaje("admin/moviles","green","El movil <strong>$modelo</strong> se creado correctamente.".$texto_img) :
                    $this->view->redireccionConMensaje("admin/moviles","red","Hubo un error al guardar en la base de datos.");
            }
            else{

                //Actualizo la noticia
                $this->db->exec("UPDATE moviles SET 
                    marca='$marca', modelo='$modelo',slug='$slug',
                    precio='$precio',caracteristicas='$caracteristicas' WHERE id='$id'");

                //Subo y actualizo la imagen
                if ($imagen){
                    if (is_uploaded_file($imagen_recibida['tmp_name']) && move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)){
                        $texto_img = " La imagen se ha subido correctamente.";
                        $this->db->exec("UPDATE moviles SET imagen='$imagen' WHERE id='$id'");
                    }
                    else{
                        $texto_img = " Hubo un problema al subir la imagen.";
                    }
                }

                //Mensaje y redirección
                $this->view->redireccionConMensaje("admin/moviles","green","El movil <strong>$modelo</strong> se guardado correctamente.".$texto_img);

            }
        }

        //Si no, obtengo noticia y muestro la ventana de edición
        else{

            //Obtengo la noticia
            $rowset = $this->db->query("SELECT * FROM moviles WHERE id='$id' LIMIT 1");
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $movil = new Movil($row);

            //Llamo a la ventana de edición
            $this->view->vista("admin","moviles/editar", $movil);
        }

    }

}