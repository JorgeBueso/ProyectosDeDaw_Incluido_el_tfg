<?php
namespace App\Model;

class Usuario {

    //Variables o atributos
    var $id;
    var $usuario;
    var $clave;
    var $fecha_acceso;
    var $activo;
    var $usuarios;
    var $moviles;

    function __construct($data=null){

        $this->id = ($data) ? $data->id : null;
        $this->usuario = ($data) ? $data->usuario : null;
        $this->clave = ($data) ? $data->clave : null;
        $this->fecha_acceso = ($data) ? $data->fecha_acceso : null;
        $this->activo = ($data) ? $data->activo : null;
        $this->usuarios = ($data) ? $data->usuarios : null;
        $this->moviles = ($data) ? $data->moviles : null;

    }

}
