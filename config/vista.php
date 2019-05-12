<?php 

class Vista
{
    public $layout = 'default';
    public $variables;

    public function __construct() {
        
    }

    public function render($laVariableQueNoSeRepita = 'index')
    {
        if (!empty($this->variables)) {
            if (is_array($this->variables)) {
                extract($this->variables);
            }
        }
        require 'vistas/'. $laVariableQueNoSeRepita . '.php';
    }
    
    
    public function plantilla()
    {
        if ($this->layout != false) {
            require 'vistas/plantillas/'. $this->layout . '.php';
        }
    }
}