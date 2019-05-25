<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Facultades extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Facultad');
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $facultadess = $this->Facultad->buscar($_GET['search']);
        }else{
            $facultadess = $this->Facultad->getAll();
        }
        $this->set(compact('facultades'));
        $this->render('facultades/index');
    }


    public function alta()
    {
        try {
            if (!empty($_POST)) {
                if (empty($_POST['nombre'])) {
                    throw new \Exception("El nombre no puede ser vacio.");
                }
                
                if($this->Facultad->alta($_POST)){
                    $this->Auth->flash("Se guardo con éxito!");
                    $this->redireccionar("facultades/index");
                }            
            }
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }

        // $this->loadModel('Localidad');
        // $localidades = $this->Localidad->listado();

        // $this->set(compact('localidades'));
        $this->render('facultades/alta');
    }


    public function editar($id = null)
    {
        if (!empty($_POST)) {
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
            }
            if($this->Facultad->actualizar($id, $_POST)){
                $this->Auth->flash("Se guardo con éxito!");
            }   
        }        
        $this->redireccionar("facultades/index");
    }
    
    public function eliminar($id = null)
    {
        $mensaje = "";
        $usuario = $this->Facultad->get($id);

        if($usuario){
            if($this->Facultad->eliminar($usuario['id'])){
                $mensaje = "Se elimino con éxito";
            }else{
                $mensaje = "No se pudo eliminar";
            }
        }else{
            $mensaje = "No se encontro el usuario";
        }   
        
        $this->Auth->flash($mensaje);
        $this->redireccionar("facultades/index");
    }
}




?>