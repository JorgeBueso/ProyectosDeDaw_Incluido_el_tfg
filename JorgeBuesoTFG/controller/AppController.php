<?php

namespace App\Controller;

use App\Model\Accesorio;
use App\Model\Usuario;
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

    //Muestra Todos los accesorios
    public function accesorios()
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE activo=1 AND home=1 ORDER BY id DESC");

        //Asigno resultados a un array de instancias del modelo
        $accesorios = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)) {
            array_push($accesorios, new Accesorio($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $accesorios);
    }


    //pido el accesorio específico
    public function accesorio($slug)
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $accesorio = new Accesorio($row);


        //Llamo a la vista
        $this->view->vista("app", "accesorio", $accesorio);

    }

    public function accesorioAdmin($slug)
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $accesorio = new Accesorio($row);


        //Llamo a la vista
        $this->view->vista("admin", "accesorios/accesorioAdmin", $accesorio);

    }

    public function tipo($tipo)
    {

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM accesorios AND tipo='$tipo' ");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $accesorio = new Accesorio($row);

        //Llamo a la vista
        $this->view->vista("admin", "accesorios/index", $accesorio);

    }


}