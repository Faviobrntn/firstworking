<?php
// namespace Controladores;
// use  Modelos\Usuario;

class Provincias extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Provincia');
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $provincias = $this->Provincia->buscar($_GET['search']);
        } else {
            $provincias = $this->Provincia->getAll();
        }
        $this->set(compact('provincias'));
        $this->render('provincias/index');
    }


    public function alta()
    {
        try {
            if (!empty($_POST)) {
                if (empty($_POST['nombre'])) {
                    throw new \Exception("El nombre no puede ser vacio.");
                }

                if ($this->Provincia->alta($_POST)) {
                    $this->Auth->flash("Se guardo con éxito!");
                }
            }
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }
        $this->redireccionar("provincias/index");
    }


    public function editar($id = null)
    {
        if (!empty($_POST)) {
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
            }
            if ($this->Provincia->actualizar($id, $_POST)) {
                $this->Auth->flash("Se guardo con éxito!");
            }
        }
        $this->redireccionar("provincias/index");
    }

    public function eliminar($id = null)
    {
        $mensaje = "";
        $usuario = $this->Provincia->get($id);

        if ($usuario) {
            if ($this->Provincia->eliminar($usuario['id'])) {
                $mensaje = "Se elimino con éxito";
            } else {
                $mensaje = "No se pudo eliminar";
            }
        } else {
            $mensaje = "No se encontro el usuario";
        }

        $this->Auth->flash($mensaje);
        $this->redireccionar("provincias/index");
    }
}
