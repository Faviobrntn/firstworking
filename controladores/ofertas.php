<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Ofertas extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Oferta');

        $this->autorizacion();
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $ofertas = $this->Oferta->buscar($_GET['search']);
        }else{
            $ofertas = $this->Oferta->getAll();
        }
        $this->set(compact('ofertas'));
        $this->render('ofertas/index');
    }


    public function alta()
    {
        if($this->Oferta->alta($_POST)){
            $this->Auth->flash("Se guardo con éxito!");
            $this->redireccionar("ofertas/index");
            }            
    }

    public function editar($id = null)
    {

        if($this->Facultad->actualizar($id, $_POST)){
            $this->Auth->flash("Se guardo con éxito!");
            $this->redireccionar("ofertas/index");
                }   
        }

    
    
    public function eliminar($id = null)
    {
        $mensaje = "";
        $ofertas = $this->Oferta->get($id);

        if($ofertas){
            if($this->Oferta->eliminar($ofertas['id'])){
                $mensaje = "Se elimino con éxito";
            }else{
                $mensaje = "No se pudo eliminar";
            }
        }else{
            $mensaje = "No se encontro la facultad";
        }   
        
        $this->Auth->flash($mensaje);
        $this->redireccionar("ofertas/index");
    }
}




?>