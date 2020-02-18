<?php


namespace App\Controller;

use App\Model\Noticia;
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
        $rowset = $this->db->query("SELECT * FROM partidas ORDER BY puntuacion DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)) {
            array_push($noticias, new Noticia($row));
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
        $rowset = $this->db->query("SELECT * FROM partidas ORDER BY puntuacion DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)) {
            array_push($noticias, new Noticia($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "noticias", $noticias);

    }

    public function noticia($id_partida)
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidas WHERE id_partida='$id_partida' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $partida = new Noticia($row);

        //Llamo a la vista
        $this->view->vista("app", "noticia", $partida);

    }

    public function mostrar()
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidas ORDER BY puntuacion DESC");

        //Asigno resultados a un array de instancias del modelo
        $partidas = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)) {
            array_push($partidas, new Partida($row));
        }

        //Compongo el array con la info que necesita la API
        $array_partidas = array();
        foreach ($partidas as $row) {
            $array_partidas[] = [
                'id_partida'=> $row -> id_partida,
                'puntuacion' => $row -> puntuacion,
                'usuario_id' => $row -> usuario,
                ];
        }

        //muestro en formato json
        echo json_encode($array_partidas,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    //Accede a un JSON y lo muestro de otra forma
    public function leer(){
        $url="http://52.47.190.44/entregas/Pacman/public/index.php/mostrar";
        $partidas=json_decode(file_get_contents($url,true));

        foreach ($partidas as $row){
            echo"<a href='".$row->enlace."'>".$row->titulo."</a>";
            echo "<img src='".$row->imagen."'>";
        }
    }


//--------------------------------------------------------------------------------------------------------
    public function unityjson(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM noticias WHERE activo=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($noticias,new Noticia($row));
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