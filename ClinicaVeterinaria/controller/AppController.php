<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Mascota;

class AppController
{
    var $db;
    var $view;

    function __construct()
    {
        //Conexión con la BBDD
        $dbHelper = new DbHelper();
        $this->db = $dbHelper ->db;

        //Instancio el ViewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

    }

    public function ListaMascotas()
    {

        //Recojo los usuarios de la base de datos
        $rowset = $this->db->query("SELECT * FROM mascota ORDER BY id_mascota ");
        echo ("ListaMascotas3333311");
        //Asigno resultados a un array de instancias del modelo
        $mascotas = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($mascotas,new mascota($row));
        }
        echo("appCONTROLAER3333333333333333");
        $this->view->composicion("app", "mascotas",$mascotas);
        echo("appCONTROLAERComposición");
    }

}