<?php 

class Vista
{
    public $layout = 'default';
    public $variables;
    public $contenido;
    public $paginador = [
        'actual' => 1,
        'cantidad' => 0,
        'paginas' => 1,
        'cant_por_pagina' => 1
    ];

    public function __construct() {
        
    }

    /**
     * Render
     * Setea la vista que se va a utilizar y carga la plantilla
     * @param string $laVariableQueNoSeRepita
     * @return void
     */
    public function render($laVariableQueNoSeRepita = 'index')
    {
        $this->setContenido($laVariableQueNoSeRepita);

        if ($this->layout != false) {
            require 'vistas/plantillas/'. $this->layout . '.php';
        }
    }
    

    /**
     * SetContenido
     * carga la vista a utilizar
     * @param string $vista
     * @return void
     */
    private function setContenido($vista = null)
    {
        $this->contenido = 'vistas/'. $vista . '.php';
    }
    
    
    /**
     * GetContenido
     * renderiza el contenido junto con las variables enviadas 
     * desde los controladores
     * @return void
     */
    public function getContenido()
    {
        if (!empty($this->variables)) {
            if (is_array($this->variables)) {
                extract($this->variables);
            }
        }

        require $this->contenido;
    }


    /**
     * Paginador
     * carga el html del paginador
     * @return void
     */
    public function paginador()
    {
        require 'vistas/plantillas/paginador.php';
    }
    

    /**
     * Plantilla
     * carga la plantilla a utilizar
     * @param string $nombre
     * @return void
     */
    public function plantilla($nombre = "default")
    {
        $this->layout = $nombre;
    }
}