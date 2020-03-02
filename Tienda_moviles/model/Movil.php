<?php
namespace App\Model;

class Movil
{
    //Variables o atributos
    var $id;
    var $marca;
    var $slug;
    var $modelo;
    var $precio;
    var $caracteristicas;
    var $activo;
    var $home;
    var $imagen;

    function __construct($data=null){

        $this->id = ($data) ? $data->id : null;
        $this->marca = ($data) ? $data->marca : null;
        $this->slug = ($data) ? $data->slug : null;
        $this->modelo = ($data) ? $data->modelo : null;
        $this->precio = ($data) ? $data->precio : null;
        $this->caracteristicas = ($data) ? $data->caracteristicas : null;
        $this->home = ($data) ? $data->home : null;
        $this->activo = ($data) ? $data->activo : null;
        $this->imagen = ($data) ? $data->imagen : null;

    }

}