<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Localidades extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Localidad');

        $this->autorizacion();
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $localidades = $this->Localidad->buscar($_GET['search']);
        }else{
            $localidades = $this->Localidad->getAll(['Provincia']);
        }

        $this->loadModel('Provincia');
        $provincias = $this->Provincia->listado();

        $this->set(compact('localidades', 'provincias'));
        $this->render('localidades/index');
    }


    public function alta()
    {
        try {
            if (!empty($_POST)) {
                if (empty($_POST['nombre'])) {
                    throw new \Exception("El nombre no puede ser vacio.");
                }
                
                if($this->Localidad->alta($_POST)){
                    $this->Auth->flash("Se guardo con éxito!");
                }            
            }
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }
        $this->redireccionar("localidades/index");
    }


    public function editar($id = null)
    {
        if (!empty($_POST)) {
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
            }
            if($this->Localidad->actualizar($id, $_POST)){
                $this->Auth->flash("Se guardo con éxito!");
            }   
        }        
        $this->redireccionar("localidades/index");
    }
    
    public function eliminar($id = null)
    {
        $mensaje = "";
        $localidad = $this->Localidad->get($id);

        if($localidad){
            if($this->Localidad->eliminar($localidad['id'])){
                $mensaje = "Se elimino con éxito";
            }else{
                $mensaje = "No se pudo eliminar";
            }
        }else{
            $mensaje = "No se encontro el localidad";
        }   
        
        $this->Auth->flash($mensaje);
        $this->redireccionar("localidades/index");
    }
}




?>