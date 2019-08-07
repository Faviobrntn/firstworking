<?php
// namespace Controladores;
// use  Modelos\Usuario;

class Curriculums extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Curriculum');

        $this->autorizacion();
    }

    public function index()
    {
        //Auth->user($id)!= null
        // if (isset($_SESSION['Usuario']['id'])) {
        $curriculums = $this->Curriculum->getAll($_SESSION['Usuario']['id']);
        $this->set(compact('curriculums'));
        $this->render('curriculums/index');
        // } else {
        //     $this->Auth->flash("Necesitas loguearte para ver tus CV");
        //     $this->redireccionar("usuarios/login");
        // }
    }

    public function api()
    {
        $curriculums = $this->Curriculum->getAll($_SESSION['Usuario']['id']);
        print_r($curriculums);
        exit;
        $this->set(compact('curriculums'));
        $this->render('curriculums/api');
    }


    public function crear()
    {
        if (!empty($_POST)) {

            // $this->debug($_POST);exit;
            $curriculum = $this->Curriculums->alta($_POST);

            // $this->set(compact('usuario'));

            $this->Auth->flash("Se guardo con éxito!");
        }
        $this->render('curriculums/index');
    }


    public function editar($id = null)
    {
        if (!empty($_POST)) {
            // $this->debug($_POST);exit;
            if ($this->Curriculums->actualizar($id, $_POST)) {
                $this->Auth->flash("Se guardo con éxito!");
                $this->redireccionar("curriculums/index");
            }
        }

        $curriculum = $this->Curriculums->get($id);

        $this->set(compact('curriculum'));
        $this->render('curriculums/editar');
    }

    public function eliminar($id = null)
    {
        $mensaje = "";
        $curriculum = $this->Curriculums->get($id);

        if ($curriculum) {
            if ($this->Curriculums->eliminar($curriculum['id'])) {
                $mensaje = "Se elimino con éxito";
            } else {
                $mensaje = "No se pudo eliminar";
            }
        } else {
            $mensaje = "No se encontro el usuario";
        }

        $this->Auth->flash($mensaje);
        $this->redireccionar("usuarios/index");
    }
}
