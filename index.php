<?php 
session_start();

require_once 'config/constantes.php';
require_once 'config/controlador.php';
require_once 'config/modelo.php';
require_once 'config/vista.php';
require_once 'config/app.php';

echo "<script>const HOST = '".HOST."';</script>";

$app = new App();


if (!empty($_SESSION['mensajes'])) {
    require_once 'vistas/mensajes.php';
}