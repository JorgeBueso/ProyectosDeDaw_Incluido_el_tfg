<?php


namespace App\helper;
class DbHelper
{
    var $db;

    function __construct(){
echo ("DbHelper");
        //Conexión mediante PDO
        $opciones = [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
        try {
            $this->db = new \PDO(
                'mysql:host=localhost;dbname=veterinaria',
                'usuario-veterinaria',
                '1234',
                $opciones);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo("Falló la conexión:");
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

}