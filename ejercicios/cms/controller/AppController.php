<?php

namespace App\Controller;

use App\Model\Partida;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;


class AppController
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

    public function index()
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidas WHERE activo=1 AND home=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)) {
            array_push($noticias, new Partida($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $noticias);
    }

    public function acercade()
    {

        //Llamo a la vista
        $this->view->vista("app", "acerca-de");

    }

    public function noticias()
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidas WHERE activo=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)) {
            array_push($noticias, new Partida($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "partidas", $noticias);

    }

    public function noticia($slug)
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidas WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $noticia = new Partida($row);

        //Llamo a la vista
        $this->view->vista("app", "noticia", $noticia);

    }

    public function mostrar()
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidas WHERE activo=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)) {
            array_push($noticias, new Partida($row));
        }

        //Compongo el array con la info que necesita la API
        $array_noticias = array();
        foreach ($noticias as $row) {
            $array_noticias[] = [
                'titulo' => $row -> titulo,
                'entradilla' => $row -> entradilla,
                'texto'=> $row -> texto,
                'autor' => $row -> autor,
                'fecha' => date("d/m/Y", strtotime($row -> fecha)),
                'enlace'=> $_SESSION['home']."noticia/".$row -> slug,
                'imagen'=> $_SESSION['public']."img/".$row -> imagen
            ];
        }

        //muestro en formato json
        echo json_encode($array_noticias,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    }

    //Accede a un JSON y lo muestro d eotra forma
    public function leer(){
        $url="http://52.47.190.44/ejercicios/cms/public/index.php/mostrar";
        $noticias=json_decode(file_get_contents($url,true));

        foreach ($noticias as $row){
            echo"<a href='".$row->enlace."'>".$row->titulo."</a>";
            echo "<img src='".$row->imagen."'>";
        }
    }

//--------------------------------------------------------------------------------------------------------//
    public function unityjson(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidas WHERE activo=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($noticias,new Partida($row));
        }

        //Compongo el array con la info que necesita la API
        $array_noticias = array();
        foreach ($noticias as $row){
            $array_noticias[] = [
                'titulo' => $row->titulo,
                'entradilla' => $row->entradilla,
                'texto' => $row->texto,
                'autor' => $row->autor,
                'fecha' => date("d/m/Y", strtotime($row->fecha)),
                'enlace' => $_SESSION['home']."noticia/".$row->slug,
                'imagen' => $_SESSION['public']."img/".$row->imagen
            ];
        }

        //Muestro en formato JSON con opciones para tildes y caracteres de escape
        echo json_encode($array_noticias,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    }

    public function unitypost(){

        $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_SPECIAL_CHARS);
        $clave = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_SPECIAL_CHARS);
        echo "POST: El usuario es $usuario y la clave es $clave";

    }

    public function unityget(){

        $usuario = filter_input(INPUT_GET, "usuario", FILTER_SANITIZE_SPECIAL_CHARS);
        $clave = filter_input(INPUT_GET, "clave", FILTER_SANITIZE_SPECIAL_CHARS);
        echo "GET: El usuario es $usuario y la clave es $clave";

    }
}