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
            $postulaciones = $this->Postulacion->getFK($this->Auth->user('id'), 'usuario_id');

            // Chequeo que no se postule 2 veces
            if(!empty($postulaciones)){
                foreach ($postulaciones as $post) {
                    if($post['oferta_id'] == $_POST['oferta']){
                        $this->respuesta['mensaje'] = "Ya se postulo antes.";
                        die(json_encode($this->respuesta));
                    }
                }
            }

            if($this->Postulacion->alta($_POST)){

                $this->respuesta['estado'] = true;
            }
        }

        die(json_encode($this->respuesta));
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