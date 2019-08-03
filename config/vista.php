<?php 

class Vista
{
    public $layout = 'default';
    public $variables;
    public $contenido;
    public $paginacion = [
        'actual' => 1,
        'cantidad' => 0,
        'paginas' => 1
    ];

    public function __construct() {
        
    }

    public function render($laVariableQueNoSeRepita = 'index')
    {
        $this->setContenido($laVariableQueNoSeRepita);

        if ($this->layout != false) {
            require 'vistas/plantillas/'. $this->layout . '.php';
        }
        // require 'vistas/'. $laVariableQueNoSeRepita . '.php';
    }
    

    private function setContenido($vista = null)
    {
        $this->contenido = 'vistas/'. $vista . '.php';
    }
    
    
    public function getContenido()
    {
        if (!empty($this->variables)) {
            if (is_array($this->variables)) {
                extract($this->variables);
            }
        }

        require $this->contenido;
    }
    
    public function plantilla($nombre = "default")
    {
        // if ($this->layout != false) {
        //     require 'vistas/plantillas/'. $this->layout . '.php';
        // }
        $this->layout = $nombre;
    }
}