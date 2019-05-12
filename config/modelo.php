<?php 

class Modelo
{
    public $db;

    public function __construct() {
        
        try {
            $this->db = new \mysqli("127.0.0.1", "root", "", "entorno") or die('Error al conectar'. mysqli_errno($this->db));
            
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


    public function __destruct() {
        //print "Destruyendo " . $this->name . "\n";
        $this->db->close();
    }
}