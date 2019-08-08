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

    /**
     * Autorizacion
     * Verifica la sesion y checkea si las url tienen permiso
     * @return bool
     * @throws Exception Si no se encuentra
     */
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


    /**
     * LoadModel
     * carga el modelo que recibe como parametro
     * @param string $model
     * @return void
     * @throws Exception Si no se encuentra
     */
    public function loadModel($model)
    {
        $archivo = 'modelos/'. strtolower($model) .'.php';

        if (file_exists($archivo)) {
            require_once $archivo;
            $model = ucwords(strtolower($model));
            $this->$model = new $model();
        }else {
            throw new \Exception("No se encontro el modelo");
        }
    }

    /**
     * Plantilla
     * carga en el objeto vista la plantilla a utilizar
     * @param string $nombre
     * @return void
     */
    public function plantilla($nombre)
    {
        $this->vista->plantilla($nombre);
    }

    
    /**
     * Render
     * carga en el objeto vista la vista que se va a renderizar
     * @param string $nombre
     * @return void
     */
    public function render($nombre)
    {
        $this->vista->render($nombre);
    }


    /**
     * Set
     * carga en el objeto vista las variables
     * que se enviaran a la vista
     * @param array $var
     * @return void
     */
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

    /**
     * Redireccionar
     * redireccion PHP a una ruta dada
     * @param string $url
     * @return void
     */
    public function redireccionar($url)
    {
        header("Location: ".HOST.$url);
    }


    public function paginador($pagina)
    {
        $this->vista->paginador = $pagina;
    }
    
}
