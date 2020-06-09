<?php


namespace App\Controller;

use App\Model\Cesta;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;

class CestaController
{
    var $db;
    var $view;

    function __construct()
    {
        //Conexión a la BBDD
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;

        //Instancio el ViewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }

    public function cesta()
    {
        $nombreUsuario = $_SESSION['usuario'];

        //Consulta a la bbdd

        $rowset = $this->db->query("SELECT * FROM cesta c INNER JOIN accesorios a ON c.id_accesorio = a.id
            JOIN usuarios u ON c.usuario_id = (SELECT u2.id FROM usuarios u2 WHERE u2.usuario='$nombreUsuario') WHERE u.usuario='$nombreUsuario';");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $cesta = new Cesta($row);


        $this->view->vista("admin", "cesta", $cesta);
    }

    public function borrar($id_cesta){

        //Borro el usuario
        $consulta = $this->db->exec("DELETE FROM cesta WHERE id_cesta='$id_cesta'");

        //Mensaje y redirección
        ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
            $this->view->redireccionConMensaje("admin/accesorios/index","green","El usuario se ha borrado correctamente.") :
            $this->view->redireccionConMensaje("admin/accesorios/index","red","Hubo un error al guardar en la base de datos.");
    }

    public function AnadirAlaCesta($id_accesorio)
    {
        $nombreUsuario = $_SESSION['usuario'];

       $consulta = $this->db->query("INSERT INTO cesta (usuario_id,id_accesorio,cantidad) VALUES((SELECT id FROM usuarios WHERE usuario='$nombreUsuario'),
'$id_accesorio','123')");

        $this->view->vista("admin", "cesta",$consulta);

    }


}