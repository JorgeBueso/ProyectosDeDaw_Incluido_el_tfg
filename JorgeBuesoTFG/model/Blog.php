<?php


namespace App\Model;


class Blog
{
    var $id;
    var $titulo;
    var $imagen;
    var $slug;
    var $grupo;
    var $texto;
    var $entradilla;
    var $fecha_de_subida;

    function __construct($data=null){

        $this->id = ($data) ? $data->id : null;
        $this->titulo = ($data) ? $data->titulo : null;
        $this->imagen = ($data) ? $data->imagen : null;
        $this->slug = ($data) ? $data->slug : null;
        $this->grupo =($data) ? $data->grupo:null;
        $this->texto =($data) ? $data->texto:null;
        $this->entradilla = ($data) ? $data->entradilla : null;
        $this->fecha_de_subida =($data) ? $data->fecha_de_subida : null;

    }


}