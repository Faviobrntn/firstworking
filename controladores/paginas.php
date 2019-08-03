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

        $ofertas = $this->Oferta->busqueda();
        $paginacion = $this->Oferta->paginacion;

        $this->set(compact('ofertas', 'paginacion'));
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
    
    
    public function consulta()
    {
        if(!empty($_POST)){
            $mensaje = "";
            $mensaje .= "Nombre: ".$_POST['nombre']."\n";
            $mensaje .= "E-mail: ".$_POST['email']."\n";
            $mensaje .= "Mensaje: ".$_POST['mensaje']."\n";
            mail("soporte@firstworking.com", "Consulta en la pagina", $mensaje);
            $this->Auth->flash("Su consulta ha sido enviada! Gracias.");
        }

        $this->redireccionar("paginas");
    }


}




?>