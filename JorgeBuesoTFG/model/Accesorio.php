<?php

namespace App\Model;

class Accesorio
{
//Variables o atributos
    var $id;
    var $nombre;
    var $slug;
    var $entradilla;
    var $caracteristicas;
    var $activo;
    var $home;
    var $precio;
    var $imagen;
    var $tipo;
    var $stock;
    var $fecha_adquisicion;
    var $grupo;

    function __construct($data=null){

        $this->id = ($data) ? $data->id : null;
        $this->nombre = ($data) ? $data->nombre : null;
        $this->slug = ($data) ? $data->slug : null;
        $this->precio = ($data) ? $data->precio : null;
        $this->entradilla = ($data) ? $data->entradilla : null;
        $this->caracteristicas =($data)? $data->caracteristicas : null;
        $this->activo = ($data) ? $data->activo : null;
        $this->home = ($data) ? $data->home : null;
        $this->imagen = ($data) ? $data->imagen : null;
        $this->tipo = ($data) ? $data->tipo : null;
        $this->stock = ($data) ? $data->stock : null;
        $this->fecha_adquisicion =($data) ? $data->fecha_adquisicion : null;
        $this->grupo =($data) ? $data->grupo:null;
    }
}