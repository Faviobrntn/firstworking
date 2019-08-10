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
            $ofertas = $this->Oferta->getAll(['Carrera', 'Localidad']);
        }
        $this->set(compact('ofertas'));
        $this->render('ofertas/index');
    }


    public function alta()
    {
        if (!empty($_POST)) {
            if($this->Oferta->alta($_POST)){
                $this->Auth->flash("Se guardo con éxito!");
                $this->redireccionar("ofertas/index");
            }
        }

        $this->loadModel('Localidad');
        $localidades = $this->Localidad->listado();
        $this->loadModel('Carrera');
        $carreras = $this->Carrera->listado();

        $this->set(compact('localidades', 'carreras'));
        $this->render('ofertas/alta');
    }


    public function editar($id = null)
    {
        try{
            $oferta = $this->Oferta->get($id);

            if(!empty($_POST)){
                if($this->Oferta->actualizar($id, $_POST)){
                    $this->Auth->flash("Se guardo con éxito!");
                    $this->redireccionar("ofertas/index");
                }   
            }

            $this->loadModel('Localidad');
            $localidades = $this->Localidad->listado();
            $this->loadModel('Carrera');
            $carreras = $this->Carrera->listado();

            $this->set(compact('localidades', 'oferta', 'carreras'));
            $this->render('ofertas/editar');

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
            $this->redireccionar("ofertas/index");
        }
    }

    
    public function eliminar($id = null)
    {
        try{
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
        
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }
        $this->redireccionar("ofertas/index");
    }


    public function detalle($id = null)
    {
        try{
            $oferta = $this->Oferta->get($id);

            $this->loadModel('Postulacion');
            $postulaciones = $this->Postulacion->getFK($id, 'oferta_id', ['Usuario', 'Curriculum']);

            if (!empty($postulaciones)) {
                // foreach ($postulaciones as $post) {
                    
                // }
                $oferta['postulaciones'] = $postulaciones;
            }
            
            $this->set(compact('oferta'));
            $this->render('ofertas/detalle');

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
            $this->redireccionar("ofertas/index");
        }
    }
}




?>