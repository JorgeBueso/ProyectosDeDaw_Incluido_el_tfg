<?php


namespace App\Model;

use App\Model\Usuario;

class Cesta
{
    var $id;
    var $usuario_id;
    var $id_accesorio;
    var $cantidad;


    function __construct($data=null){
        $this->id = ($data) ? $data->id : null;
        $this->usuario_id = ($data) ? $data->usuario_id : null;
        $this->id_accesorio = ($data) ? $data->id_accesorio : null;
        $this->cantidad = ($data) ? $data->cantidad : null;
    }
}