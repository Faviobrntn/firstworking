<?php 
require_once 'conexion.php';

class Modelo extends Conexion
{
    public $db;

    public function __construct() {
        
        try {
            $this->db = new \mysqli($this->host, $this->user, $this->pass, $this->db) or die('Error al conectar'. mysqli_errno($this->db));
            
            if ($this->db->connect_errno) {
                throw new \Exception("Falló la conexión: %s\n", $this->db->connect_error);
            }
        } catch (\Exception $th) {
            throw $th;
        }

        // $this->db = mysqli_connect("127.0.0.1", "root", "", "firstworking");
        // if (!$this->db) { 
            // throw new Exception("Error de depuración: " . mysqli_connect_error() . PHP_EOL); 
        // }
    }


    public function loadModel($model)
    {
        $archivo = strtolower($model) .'.php';

        if (file_exists($archivo)) {
            require_once $archivo;
            $model = ucwords(strtolower($model));
            // $this->modelo = new $model();
            $this->$model = new $model();
        }else {
            throw new \Exception("No se encontro el modelo");
        }
    }

    public function __destruct() {
        //print "Destruyendo " . $this->name . "\n";
        $this->db->close();
    }
}