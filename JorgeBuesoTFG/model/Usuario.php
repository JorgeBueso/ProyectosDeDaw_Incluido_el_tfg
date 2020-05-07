<?php
namespace App\Model;

class Usuario
{
//Variables o atributos
    var $id;
    var $usuario;
    var $clave;
    var $activo;
    var $usuarios;
    var $accesorios;

    function __construct($data=null){

        $this->id = ($data) ? $data->id : null;
        $this->usuario = ($data) ? $data->usuario : null;
        $this->clave = ($data) ? $data->clave : null;
        $this->activo = ($data) ? $data->activo : null;
        $this->usuarios = ($data) ? $data->usuarios : null;
        $this->accesorios = ($data) ? $data->accesorios : null;

    }
}