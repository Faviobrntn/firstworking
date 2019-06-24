<?php  
// namespace Controladores;


class Paginas extends Controlador
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->plantilla('publico');

        $this->loadModel('Oferta');
        if (!empty($_GET['search'])) {
            $ofertas = $this->Oferta->buscar($_GET['search']);
        }else{
            $ofertas = $this->Oferta->getAll();
        }

        $this->set(compact('ofertas'));
        $this->render('paginas/index');
        // Vista::render('paginas/index');
    }


    public function dashboard()
    {

        $this->render('paginas/dashboard');
        // Vista::render('paginas/index');
    }
    
    public function limpiarSesion()
    {
        $this->Auth->clearFlash(); exit;
    }


}




?>