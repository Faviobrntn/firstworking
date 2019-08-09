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
    }

    public function api()
    {
        $curriculums = $this->Curriculum->getAll(["Usuario"]);
        echo json_encode($curriculums);
        exit;        
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
        try{
            $curriculum = $this->Curriculum->get($id);

            if (!empty($_POST)) {
                if ($this->Curriculum->actualizar($id, $_POST)) {
                    $this->Auth->flash("Se guardo con éxito!");
                    $this->redireccionar("curriculums/index");
                }
            }

           
            $this->loadModel('Carrera');
            $carreras = $this->Carrera->listado();

            $this->set(compact('curriculum', 'carreras'));
            $this->render('curriculums/editar');

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
            $this->redireccionar("curriculums/index");
        }
    }

    public function eliminar($id = null)
    {
        try{
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

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }
        $this->redireccionar("curriculums/index");
    }


    public function seleccionar()
    {
        if (!empty($_POST)) {
            setcookie("cvseleccionado", $_POST['cv'], strtotime("+1 month"), HOST);
            $this->respuesta['estado'] = true;
        }           
        die(json_encode($this->respuesta));
    }
}
