<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Postulaciones extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Postulacion');

        $this->autorizacion();
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $postulaciones = $this->Postulacion->buscar($_GET['search']);
        }else{
            $postulaciones = $this->Postulacion->getAll(['Usuario', 'Oferta']);
        }
        $this->set(compact('postulaciones'));
        $this->render('postulaciones/index');
    }


    public function alta()
    {
        if (!empty($_POST)) {
            if($this->Postulacion->alta($_POST)){
                $this->Auth->flash("Se guardo con éxito!");
                $this->redireccionar("postulaciones/index");
            }
        }

        $this->loadModel('Oferta');
        $ofertas = $this->Oferta->listado();
        $this->loadModel('Usuario');
        $usuarios = $this->Usuario->listado();

        $this->set(compact('ofertas', 'usuarios'));
        $this->render('postulaciones/alta');
    }

    public function editar($id = null)
    {
        try{
            $postulacion = $this->Postulacion->get($id);

            if(!empty($_POST)){
                if($this->Postulacion->actualizar($id, $_POST)){
                    $this->Auth->flash("Se guardo con éxito!");
                    $this->redireccionar("postulaciones/index");
                }   
            }

            $this->loadModel('Oferta');
            $ofertas = $this->Oferta->listado();
            $this->loadModel('Usuario');
            $usuarios = $this->Usuario->listado();

            $this->set(compact('ofertas', 'postulacion', 'usuarios'));
            $this->render('postulaciones/editar');

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
            $this->redireccionar("postulaciones/index");
        }
    }

    
    
    public function eliminar($id = null)
    {
        try{
            $mensaje = "";
            $postulaciones = $this->Postulacion->get($id);

            if($postulaciones){
                if($this->Postulacion->eliminar($postulaciones['id'])){
                    $mensaje = "Se elimino con éxito";
                }else{
                    $mensaje = "No se pudo eliminar";
                }
            }else{
                $mensaje = "No se encontro la facultad";
            }   
            $this->Auth->flash($mensaje);
        
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }
        
        $this->redireccionar("postulaciones/index");
    }


    public function detalle($id = null)
    {
        try{
            $postulacion = $this->Postulacion->get($id, ['Oferta']);
            
            $this->set(compact('postulacion'));            
            $this->render('postulaciones/detalle');

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
            $this->redireccionar("postulaciones/index");
        }
    }
}




?>