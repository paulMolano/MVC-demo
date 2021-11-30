<?php

class Errors extends Controller
{


    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la página";
        // $this->view->render('errors/index');
    }


    function renderMessage()
    {
        $this->view->render('errors/index');
    }


    public function setMensaje($mensaje)
    {
        $this->view->mensaje = $mensaje;
    }
}
