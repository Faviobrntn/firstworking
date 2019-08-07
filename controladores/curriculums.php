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
        if (!empty($_GET['search'])) {
            $curriculums = $this->Curriculum->buscar($_GET['search']);
        }else{
            $curriculums = $this->Curriculum->getAll(['Carrera']);
        }
        $this->loadModel('Carrera');
        $carreras = $this->Carrera->listado();

        $this->set(compact('curriculums', 'carreras'));
        $this->render('curriculums/index');



        //Auth->user($id)!= null
        // if (isset($_SESSION['Usuario']['id'])) {
         //   $curriculums = $this->Curriculum->getAll($_SESSION['Usuario']['id']);
         //   $this->set(compact('curriculums'));
          //  $this->render('curriculums/index');
        // } else {
        //     $this->Auth->flash("Necesitas loguearte para ver tus CV");
        //     $this->redireccionar("usuarios/login");
        // }
    }


    public function alta()
    {
        if (!empty($_POST)) {

            // $this->debug($_POST);exit;
            $curriculum = $this->Curriculum->alta($_POST);

            // $this->set(compact('usuario'));
            if ($curriculum) {
                $this->Auth->flash("Se guardo con éxito!");

            }
        }
        $this->redireccionar("curriculums/index");
    }


    public function editar($id = null)
    {
        if (!empty($_POST)) {
            // $this->debug($_POST);exit;
            if ($this->Curriculum->actualizar($id, $_POST)) {
                $this->Auth->flash("Se guardo con éxito!");
                $this->redireccionar("curriculums/index");
            }
        }

        $curriculum = $this->Curriculum->get($id);

        $this->set(compact('curriculum'));
        $this->render('curriculums/editar');
    }

    public function eliminar($id = null)
    {
        $mensaje = "";
        $curriculum = $this->Curriculum->get($id);

        if ($curriculum) {
            if ($this->Curriculum->eliminar($curriculum['id'])) {
                $mensaje = "Se elimino con éxito";
            } else {
                $mensaje = "No se pudo eliminar";
            }
        } else {
            $mensaje = "No se encontro el usuario";
        }

        $this->Auth->flash($mensaje);
        $this->redireccionar("curriculums/index");
    }
}
