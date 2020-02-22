<?php


namespace App\Model;

class Mascota
{

    //Variables o atributos
    var $id_mascota;
    var $nombre;
    var $nombre_propietario;
    var $apellido_propietario;
    var $dni_propietario;
    var $nacimiento;
    var $especie;
    var $imagen;


    function __construct($data=null){
        echo ("Model");
        $this->id_mascota = ($data) ? $data->id_mascota : null;
        $this->nombre = ($data) ? $data->nombre : null;
        $this->nombre_propietario = ($data) ? $data->nombre_propietario : null;
        $this->dni_propietario = ($data) ? $data->dni_propietario : null;
        $this->apellido_propietario = ($data) ? $data->apellido_propietario : null;
        $this->nacimiento = ($data) ? $data->nacimiento : null;
        $this->especie = ($data) ? $data->especie : null;
        $this->imagen = ($data) ? $data->imagen : null;
    }
}