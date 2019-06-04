<?php 

    class Auth
    {
        public $permitir = [];

        public function __construct() {

        }


        public function flash($var = null)
        {
            if (isset($var)) {
                if (is_string($var)) {
                    $_SESSION['mensajes'] = $var;
                }else{
                    throw new \Exception("La función flash solo recibe string");            
                }
            }
        }

        public function clearFlash()
        {
            if (!empty($_SESSION['mensajes'])) {
                unset($_SESSION['mensajes']);
            }
        }


        public function setUsuario($usuario)
        {
            if (!empty($usuario)) {
                $_SESSION['Usuario'] = $usuario;
            }
        }


        public function user($celda = null)
        {
            if (!empty($celda)) {
                return $_SESSION['Usuario'][$celda];
            }
            return $_SESSION['Usuario'];
        }
        
        public function check()
        {
            if (!empty($_SESSION['Usuario'])) {
                return true;
            }
            return false;
        }

        public function logout()
        {
            if (!empty($_SESSION['Usuario'])) {
                unset($_SESSION['Usuario']);
            }
        }
    }
    

?>