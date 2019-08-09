<?php 
session_start();

function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre><br />";
}

require_once 'config/constantes.php';
require_once 'config/app.php';
require_once 'config/controlador.php';
require_once 'config/vista.php';
require_once 'config/modelo.php';


$app = new App();

// echo "<script> const HOST = '".HOST."';</script>";

if (!empty($_SESSION['mensajes'])) {
    require_once 'vistas/mensajes.php';
}