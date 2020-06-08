<?php


namespace App\Model;


class Personal
{
     var $id;
     var $nombre;
     var $cargo;

     function __construct($data=null)
     {
         $this->id = ($data) ? $data->id : null;
         $this->nombre = ($data) ? $data ->nombre : null;
         $this ->cargo = ($data) ? $data ->cargo : null;
     }
}