<?php


namespace App\Model;

class Cesta
{
    var $id_cesta;
    var $usuario_id;
    var $id_accesorio;
    var $cantidad;


    function __construct($data=null){
        $this->id_cesta = ($data) ? $data->id_cesta : null;
        $this->usuario_id = ($data) ? $data->usuario_id : null;
        $this->id_accesorio = ($data) ? $data->id_accesorio : null;
        $this->cantidad = ($data) ? $data->cantidad : null;
    }


}