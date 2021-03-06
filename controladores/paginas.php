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

        $ofertas = $this->Oferta->busqueda(['Localidad', 'Usuario']);
        $this->paginador($this->Oferta->paginador);
        
        $this->set(compact('ofertas'));
        $this->render('paginas/index');
    }


    public function dashboard()
    {
        $this->loadModel('Usuario');

        $total = $this->Usuario->cantidad('usuarios');
        $postulantes = $this->Usuario->getFK('postulante', 'rol');
        $ofertantes = $this->Usuario->getFK('ofertante', 'rol');
        $admins = $this->Usuario->getFK('admin', 'rol');

        // debug($postulantes);exit;
        $this->set(compact('admins', 'postulantes', 'ofertantes', 'total'));
        $this->render('paginas/dashboard');
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

            $para  = 'faviobarnatan@gmail.com, ';
            $para .= 'nahuelalvarezutn@gmail.com, ';
            $para .= 'fernando.albertengo@gmail.com, ';
            $para .= 'lucaspavan.lp@gmail.com';
            mail($para, "Consulta en la pagina", $mensaje);
            $this->Auth->flash("Su consulta ha sido enviada! Gracias.");
        }

        $this->redireccionar("");
    }


}




?>