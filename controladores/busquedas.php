<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Carreras extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Busqueda');

        $this->autorizacion();
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $ofertas = $this->Busqueda->buscar($_GET['search']);
        }

        #$this->set(compact('carreras', 'facultades'));
        $this->render('ofertas/index');
    }

}

?>