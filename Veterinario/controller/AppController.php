<?php

namespace App\Controller;

//use App\Model\Usuario;
use App\Model\Mascota;
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

    //Pantalla principal, viendo todas las mascotas
    public function listaMascotas(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM mascota ORDER BY id_mascota DESC");

        //Asigno resultados a un array de instancias del modelo
        $mascotas = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($mascotas,new Mascota($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "mascotas");
    }


    //Mascota en específico
    public function mascota($id_mascota){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM mascota WHERE id_mascota='$id_mascota' ");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $mascota = new Mascota($row);

        //Llamo a la vista
        $this->view->vista("app", "mascota", $mascota);

    }
}