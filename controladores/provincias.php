<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Provincias extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Provincia');
    }

    public function index()
    {
        $provincias = $this->Provincia->getAll();
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
                
                // $this->debug($_POST);exit;
                if($this->Provincia->alta($_POST)){
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
            
            // $this->debug($_POST);exit;
            if($this->Provincia->actualizar($id, $_POST)){
                $this->Auth->flash("Se guardo con éxito!");
                $this->redireccionar("usuarios/index");
            }
            
        }
        
        $usuario = $this->Provincia->get($id);

        $this->set(compact('usuario'));
        $this->render('provincias/editar');
    }
    
    public function eliminar($id = null)
    {
        $mensaje = "";
        $usuario = $this->Provincia->get($id);

        if($usuario){
            if($this->Provincia->eliminar($usuario['id'])){
                $mensaje = "Se elimino con éxito";
            }else{
                $mensaje = "No se pudo eliminar";
            }
        }else{
            $mensaje = "No se encontro el usuario";
        }   
        
        $this->Auth->flash($mensaje);
        $this->redireccionar("usuarios/index");
    }
}




?>