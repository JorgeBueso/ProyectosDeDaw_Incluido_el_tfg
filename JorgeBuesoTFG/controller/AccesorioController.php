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




}