<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Usuarios extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Usuario');

        $this->Auth->permitir = ['usuarios/registro', 'usuarios/login', 'usuarios/logout'];

        $this->autorizacion();
    }

    public function index()
    {
        if (!empty($_GET['search'])) {
            $usuarios = $this->Usuario->buscar($_GET['search']);
        }else{
            $usuarios = $this->Usuario->getAll();
        }

        $this->set(compact('usuarios'));
        $this->render('usuarios/index');
    }

    public function alta()
    {
        try{
            // $this->plantilla('vacio');
    
            if (!empty($_POST)) {
                // $this->debug($_POST);exit;
                $usuario = $this->Usuario->alta($_POST);
                if($usuario){
                    $this->Auth->flash("Se guardo con éxito!");
                    $this->redireccionar("usuarios/index");
                }else{
                    $this->Auth->flash("Ocurrio un error al registrarse. Por favor, intente nuevamente.");
                }
            }
    
            $this->loadModel('Localidad');
            $localidades = $this->Localidad->listado();
            $roles = $this->Usuario->roles;
    
            $this->set(compact('localidades', 'roles'));

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }
        $this->render('usuarios/alta');
    }
    


    public function editar($id = null)
    {
        try {
            if (!empty($_POST)) {
                // $this->debug($_POST);exit;
                if($this->Usuario->actualizar($id, $_POST)){
                    $this->Auth->flash("Se guardo con éxito!");
                    $this->redireccionar("usuarios/index");
                }
            }
            
            $usuario = $this->Usuario->get($id);
            
            $this->loadModel('Localidad');
            $localidades = $this->Localidad->listado();
            $roles = $this->Usuario->roles;

            $this->set(compact('usuario', 'localidades', 'roles'));
        
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }    
        $this->render('usuarios/editar');
    }
    
    public function eliminar($id = null)
    {
        try {
            $mensaje = "";
            $usuario = $this->Usuario->get($id);
    
            if($usuario){
                if($this->Usuario->eliminar($usuario['id'])){
                    $mensaje = "Se elimino con éxito";
                }else{
                    $mensaje = "No se pudo eliminar";
                }
            }else{
                $mensaje = "No se encontro el usuario";
            }   
            
            $this->Auth->flash($mensaje);
        
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }            
        $this->redireccionar("usuarios/index");
    }



    public function registro()
    {
        try{
            $this->plantilla('vacio');
    
            if (!empty($_POST)) {
                // $this->debug($_POST);exit;
                $usuario = $this->Usuario->registro($_POST);
                if($usuario){
                    mail($usuario['email'], "Registro exitoso", "Bienvenido a FirstWorking!");
                    $this->Auth->flash("Se guardo con éxito!");
                    $this->redireccionar("usuarios/login");
                }else{
                    $this->Auth->flash("Ocurrio un error al registrarse. Por favor, intente nuevamente.");
                }
            }
            
            $this->loadModel('Localidad');
            $localidades = $this->Localidad->listado();
    
            $this->set(compact('localidades'));

        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }

        $this->render('usuarios/registro');
    }


    public function login()
    {
        try {
            $this->plantilla('vacio');

            if (!empty($_POST)) {
                
                if (empty($_POST['email'])) {
                    throw new \Exception("El email no puede ser vacio.");
                }
                if (empty($_POST['password'])) {
                    throw new \Exception("La contraseña no puede ser vacia.");
                }
                // $this->debug($_POST);exit;
                $usuario = $this->Usuario->login();
                if ($usuario) {
                    $this->Auth->setUsuario($usuario);
                    
                    $this->Auth->flash("Bienvenido ".$usuario['nombre']);

                    if ($usuario['rol'] == 'admin') {
                        $this->redireccionar("usuarios/index");
                    }
                    if ($usuario['rol'] == 'ofertante') {
                        $this->redireccionar("ofertas/index");
                    }
                    if ($usuario['rol'] == 'postulante') {
                        $this->redireccionar("paginas/index");
                    }
                }else {
                    $this->Auth->flash("Email ó contraseña incorrectos.");
                }
            }

            if ($this->Auth->check()) {
                if ($this->Auth->user('rol') == 'admin') {
                    $this->redireccionar("usuarios/index");
                }
                if ($this->Auth->user('rol') == 'ofertante') {
                    $this->redireccionar("ofertas/index");
                }
                if ($this->Auth->user('rol') == 'postulante') {
                    $this->redireccionar("curriculums/index");
                }
            }
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }

        $this->render('usuarios/login');
    }



    public function perfil()
    {
        try {
            $id = $this->Auth->user('id');

            if (!empty($_POST)) {
                // $this->debug($_POST);exit;
                if($this->Usuario->actualizar($id, $_POST)){
                    $this->Auth->flash("Se guardo con éxito!");
                    // $this->redireccionar("usuarios/perfil");
                }
            }
            
            $usuario = $this->Usuario->get($id);
            
            $this->loadModel('Localidad');
            $localidades = $this->Localidad->listado();

            $this->set(compact('usuario', 'localidades'));
        
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }    
        $this->render('usuarios/perfil');
    }


    public function logout()
    {
        $this->Auth->logout();

        $this->redireccionar("usuarios/login");
    }

}
