<?php
namespace App\Controller;

use App\Model\Movil;
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
//Muestra Todos los Moviles
    public function index(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM moviles WHERE activo=1 AND home=1 ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $moviles = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($moviles,new Movil($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $moviles);
    }

    public function acercade(){

        //Llamo a la vista
        $this->view->vista("app", "acerca-de");

    }

    public function moviles(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM moviles WHERE activo=1 ORDER BY precio DESC");

        //Asigno resultados a un array de instancias del modelo
        $moviles = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($moviles,new Movil($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "moviles", $moviles);

    }

    public function movil($slug){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM moviles WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $movil = new Movil($row);

        //Llamo a la vista
        $this->view->vista("app", "movil", $movil);

    }
}