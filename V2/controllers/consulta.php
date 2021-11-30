<?php

class Consulta extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->alumnos = [];
    }

    function render()
    {
        $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }


    function verAlumno($param = null)
    {
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno);

        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula;
        $this->view->alumno = $alumno;
        $this->view->mensaje = "Ver/Editar Alumno";
        $this->view->render('consulta/detalle');
    }

    function actualizarAlumno()
    {

        session_start();
        $matricula = $_SESSION['id_verAlumno'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        unset($_SESSION['id_verAlumno']);

        $updateAulmn = $this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido]);


        if ($updateAulmn) {
            $alumno = new Alumno();
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;

            $this->view->alumno = $alumno;
            $this->view->mensaje = "Alumno Actualizado correctamente";
        } else {
            $this->view->mensaje = "No se ha podido actualizar";
        }

        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($param = null)
    {
        $matricula = $param[0];
        $deleteAlumn = $this->model->delete($matricula);


        if ($deleteAlumn) {

            $this->view->mensaje = "Alumno eliminado correctamente";
        } else {
            $this->view->mensaje = "No se ha podido eliminar";
        }
        $this->render();
    }
}
