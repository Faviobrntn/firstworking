<?php 
// require 'autoload.php';

class App 
{
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

        list( 
            $controlador, 
            $accion, 
            $id 
        ) = array_pad( explode( '/', $request ), 3, '' );

        // Instanciamos el controlador
        if (empty($controlador)) {
            $controlador = 'paginas';
        }

        $archivo = "controladores/$controlador.php";
        if ( file_exists($archivo) ) {
            
            require_once $archivo;
            // $controller = 'Controladores\\'.ucwords($controlador);
            $controller = ucwords($controlador);

            $controller = new $controller;
            
            // Llama la accion
            if (empty($accion)) {
                $accion = 'index';
            }
            
            // call_user_func( array( $controller, $accion, $id ) );
            call_user_func_array([$controller, $accion], [$id]);
        }else {
            require_once 'controladores/errores.php';
            $controller = new Errores();
            
            // throw new \Exception("Error: no se encontro el archivo: $archivo");
        }
    }
}
