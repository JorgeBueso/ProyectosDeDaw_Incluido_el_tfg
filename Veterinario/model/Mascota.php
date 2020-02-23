<?php


namespace App\Model;

class Mascota
{

    //Variables o atributos
    var $id_mascota;
    var $nombre;
    var $nombre_propietario;
    var $edad;
    var $especie;
    var $imagen;
    var $telefono;


    function __construct($data=null){
        echo ("Model");
        $this->id_mascota = ($data) ? $data->id_mascota : null;
        $this->nombre = ($data) ? $data->nombre : null;
        $this->nombre_propietario = ($data) ? $data->nombre_propietario : null;
        $this->edad = ($data) ? $data->edad : null;
        $this->especie = ($data) ? $data->especie : null;
        $this->imagen = ($data) ? $data->imagen : null;
        $this->telefono = ($data) ? $data->telefono : null;
    }
}