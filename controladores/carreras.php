<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Carreras extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Carrera');

        $this->autorizacion();
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $carreras = $this->Carrera->buscar($_GET['search']);
        }else{
            $carreras = $this->Carrera->getAll();
        }

        $this->loadModel('Facultad');
        $facultades = $this->Facultad->listado();

        $this->set(compact('carreras', 'facultades'));
        $this->render('carreras/index');
    }


    public function alta()
    {
        try {
            if (!empty($_POST)) {
                if (empty($_POST['nombre'])) {
                    throw new \Exception("El nombre no puede ser vacio.");
                }
                
                if($this->Carrera->alta($_POST)){
                    $this->Auth->flash("Se guardo con éxito!");
                }            
            }
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }

        $this->loadModel('Facultad');
        $facultades = $this->Facultad->listado();

        $this->set(compact('facultades'));
        $this->render("carreras/alta");
    }


    public function editar($id = null)
    {
        $carrera = $this->Carrera->get($id);
        if (!empty($_POST)) {
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
            }
            if($this->Carrera->actualizar($id, $_POST)){
                $this->Auth->flash("Se guardo con éxito!");
            }   
        }

        $this->loadModel('Facultad');
        $facultades = $this->Facultad->listado();

        $this->set(compact('carrera', 'facultades'));
        $this->render("carreras/editar");
    }
    
    public function eliminar($id = null)
    {
        $mensaje = "";
        $carrera = $this->Carrera->get($id);

        if($carrera){
            if($this->Carrera->eliminar($carrera['id'])){
                $mensaje = "Se elimino con éxito";
            }else{
                $mensaje = "No se pudo eliminar";
            }
        }else{
            $mensaje = "No se encontro el localidad";
        }   
        
        $this->Auth->flash($mensaje);
        $this->render("carreras/index");
    }
}




?>