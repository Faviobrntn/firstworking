<?php 
// require 'autoload.php';

class App 
{
    public $request = [];
    public function __construct() {
        $this->start();
    }


    public function start()
    {
        
        // $request = strtolower($_SERVER['REDIRECT_URL']);
        $request = "";
        if (!empty($_GET['url'])) {
            $request = strtolower($_GET['url']);
        }

        $params = explode("/", $request);

        $controlador = $accion = "";

        if (!empty($params[0])) {
            $controlador = $params[0];
            unset($params[0]);
        }
        if (!empty($params[1])) {
            $accion = $params[1];
            unset($params[1]);
        }

        // Instanciamos el controlador
        if (empty($controlador)) {
            $controlador = 'paginas';
        }

        // Llama la accion
        if (empty($accion)) {
            $accion = 'index';
        }

        $this->request = [
            'controlador' => $controlador,
            'accion' => $accion,
            'parametros' => $params,
            'url' => $controlador.'/'.$accion
        ];
        // var_dump($this->request);exit;
        $archivo = "controladores/$controlador.php";
        if ( file_exists($archivo) ) {
            
            require_once $archivo;
            // $controller = 'Controladores\\'.ucwords($controlador);
            $controller = ucwords($controlador);

            $controller = new $controller;
            
            
            // call_user_func( array( $controller, $accion, $id ) );
            // call_user_func_array([$controller, $accion], [$id]);

            if (is_callable([$controller, $accion])) {
                call_user_func_array([$controller, $accion], $params);
                // $controller->{$accion}($params);
            }else{
                require_once 'controladores/errores.php';
                $controller = new Errores();
            }
        }else {
            require_once 'controladores/errores.php';
            $controller = new Errores();
            
            // throw new \Exception("Error: no se encontro el archivo: $archivo");
        }
    }
}
