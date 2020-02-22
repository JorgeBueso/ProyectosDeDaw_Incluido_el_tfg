<?php
namespace App\Model;

class Usuario {

    //Variables o atributos
    var $id_usuario;
    var $usuario;
    var $clave;
    var $activo;
    var $usuarios;
    var $mascotas;

    function __construct($data=null){

        $this->id_usuario = ($data) ? $data->id_usuario : null;
        $this->usuario = ($data) ? $data->usuario : null;
        $this->clave = ($data) ? $data->clave : null;
        $this->activo = ($data) ? $data->activo : null;
        $this->usuarios = ($data) ? $data->usuarios : null;
        $this->mascotas = ($data) ? $data->mascotas : null;

    }

}