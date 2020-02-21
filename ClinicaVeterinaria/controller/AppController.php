<?php

namespace App\Controller;

use App\Helper\ViewHelper;

class AppController
{

    var $view;

    function __construct()
    {

        //Instancio el ViewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

    }
    public function principal()
    {
        $this->view->composicion("app", "index");
    }
}