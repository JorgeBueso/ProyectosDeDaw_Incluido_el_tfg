<?php


namespace App\Model;

class Usuario
{
    //Variables o atributos
    var $id;
    var $usuario;
    var $clave;

    function __construct($data=null){

        $this->id = ($data) ? $data->id_usuario : null;
        $this->usuario = ($data) ? $data->usuario : null;
        $this->clave = ($data) ? $data->clave : null;


    }
}