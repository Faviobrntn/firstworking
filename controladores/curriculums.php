<?php  
// namespace Controladores;
// use  Modelos\Usuario;

class Curriculums extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->loadModel('Curriculum');
        $this->plantilla('publico');
    }

    public function index()
    {
        $curriculums = $this->Curriculum->getAll();
        // echo json_encode($usuarios);exit;
        $this->set(compact('curriculums'));
        $this->render('curriculums/index');
    }


    public function crear()
    {
        if (!empty($_POST)) {
            
            // $this->debug($_POST);exit;
            $curriculum = $this->Curriculums->alta($_POST);
            
            // $this->set(compact('usuario'));

            $this->Auth->flash("Se guardo con éxito!");
        }

        $this->render('curriculums/crear');
    }


    public function editar($id = null)
    {
        if (!empty($_POST)) {
            
            // $this->debug($_POST);exit;
            if($this->Usuario->actualizar($id, $_POST)){
                $this->Auth->flash("Se guardo con éxito!");
                $this->redireccionar("usuarios/index");
            }
            
        }
        
        $usuario = $this->Usuario->get($id);

        $this->set(compact('usuario'));
        $this->render('usuarios/editar');
    }
    
    public function eliminar($id = null)
    {
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
        $this->redireccionar("usuarios/index");
    }



    public function login()
    {
        try {
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

                    $this->redireccionar("usuarios/index");
                }else {
                    $this->Auth->flash("Email ó contraseña incorrectos.");
                }
            }
        } catch (\Exception $e) {
            $this->Auth->flash($e->getMessage());
        }

        $this->render('usuarios/login');
    }


    public function logout()
    {
        $this->Auth->logout();

        $this->redireccionar("usuarios/login");
    }

}




?>