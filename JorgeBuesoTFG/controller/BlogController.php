<?php


namespace App\Controller;

use App\Model\Blog;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;

class BlogController
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

    public function irAlBlog(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM blog");

        //Asigno resultados a un array de instancias del modelo
        $asesoramiento = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){


            array_push($asesoramiento,new Blog($row));


        }

        //Llamo a la vista
        $this->view->vista("admin","blog", $asesoramiento);

    }
}