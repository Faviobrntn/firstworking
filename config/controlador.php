<?php 
require_once "auth.php";

class Controlador
{
    public $vista;
    public $modelo;
    public $Auth;
    // public $variables;
    
    public function __construct() {
        $this->vista = new Vista();
        $this->Auth = new Auth();
    }

    public function autorizacion()
    {
        if (in_array($_GET['url'], $this->Auth->permitir)) {
            return true;
        }
        if ($this->Auth->check()) {
            if ($this->Auth->user('rol') == 'admin') {
                return true;
            }
            if ($this->Auth->user('rol') == 'postulante') {
                return true;
            }
            if ($this->Auth->user('rol') == 'ofertante') {
                return true;
            }
            // return false;
        }
        return $this->redireccionar('usuarios/login');
    }

    public function loadModel($model)
    {
        $archivo = 'modelos/'. strtolower($model) .'.php';

        if (file_exists($archivo)) {
            require_once $archivo;
            $model = ucwords(strtolower($model));
            // $this->modelo = new $model();
            $this->$model = new $model();
        }else {
            throw new \Exception("No se encontro el modelo");
        }
    }

    public function plantilla($nombre)
    {
        $this->vista->plantilla($nombre);
    }

    
    public function render($nombre)
    {
        $this->vista->render($nombre);
    }


    public function set($var = [])
    {
        if (is_array($var)) {
            if ($this->Auth->check()) {
                $var['current_user'] = $this->Auth->user();
            }
            $this->vista->variables = $var;
        }else{
            throw new \Exception("La función set solo recibe array");
            
        }
    }


    public function debug($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre><br />";
    }

    public function redireccionar($url)
    {
        header("Location: ".HOST.$url);
    }
    
}
