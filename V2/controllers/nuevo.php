<?php

class Nuevo extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    {
        $this->view->render('nuevo/index');
    }

    function registrarAlumno()
    {

        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        $insertAlumn = $this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido]);

        $mensaje = "";


        if ($insertAlumn) {
            $mensaje = "Alumno Insertado correctamente";
        } else {
            $mensaje = "La matrícula ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }
}
