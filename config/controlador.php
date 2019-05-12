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

    public function render($nombre)
    {
        $this->vista->render($nombre);
    }


    public function set($var = [])
    {
        if (is_array($var)) {
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
