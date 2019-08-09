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
            $postulaciones = $this->Postulacion->getAll(['Carrera', 'Localidad']);
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

        $this->loadModel('Localidad');
        $localidades = $this->Localidad->listado();
        $this->loadModel('Carrera');
        $carreras = $this->Carrera->listado();

        $this->set(compact('localidades', 'carreras'));
        $this->render('postulaciones/alta');
    }

    public function editar($id = null)
    {
        $Postulacion = $this->Postulacion->get($id);

        if(!empty($_POST)){
            if($this->Postulacion->actualizar($id, $_POST)){
                $this->Auth->flash("Se guardo con éxito!");
                $this->redireccionar("postulaciones/index");
            }   
        }

        $this->loadModel('Localidad');
        $localidades = $this->Localidad->listado();
        $this->loadModel('Carrera');
        $carreras = $this->Carrera->listado();

        $this->set(compact('localidades', 'Postulacion', 'carreras'));
        $this->render('postulaciones/editar');
    }

    
    
    public function eliminar($id = null)
    {
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
        $this->redireccionar("postulaciones/index");
    }
}




?>