<?php 

class Errores extends Controlador
{
    public function __construct() {
        parent::__construct();
        $this->vista->render('errores/index');
    }
}
