<?php 
require_once 'conexion.php';

class Modelo extends Conexion
{
    public $db;
    public $limite = 20;
    public $paginacion = [
        'actual' => 1,
        'cantidad' => 0,
        'paginas' => 1,
        'cant_por_pagina' => 1
    ];

    public function __construct() {
        
        try {
            $this->db = new \mysqli($this->host, $this->user, $this->pass, $this->database) or die('Error al conectar'. mysqli_errno($this->db));
            
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


    public function cantidad($tabla){
        $sql = "SELECT COUNT(*) as total FROM $tabla";
        $cantidad = 0;

        $query = $this->db->query($sql);

        if($query){
            $cantidad = $query->fetch_array()['total'];
        }
        $query->close();
        return $cantidad;
    }

    public function paginar(&$sql){
        $this->paginacion['actual'] = 1;
        if (!empty($_GET['page'])){ $this->paginacion['actual'] = $_GET['page']; }

        $this->paginacion['cant_por_pagina'] = $this->limite;
        $this->paginacion['cantidad'] = $this->cantidad('ofertas');

        $this->paginacion['paginas'] = ceil(($this->paginacion['cantidad'] / $this->limite));

        $pagina = ($this->paginacion['actual'] * $this->limite);
        $sql .= " LIMIT ($pagina, {$this->limite})";


        if(($this->paginacion['actual'] - 1)){
            $this->paginacion['anterior'] = $this->paginacion['actual'] - 1;
        }else{
            $this->paginacion['anterior'] = false;
        }

        if (($this->paginacion['actual'] + 1) <=  $this->paginacion['paginas']){
            $this->paginacion['siguiente'] = $this->paginacion['actual'] + 1;
        }else{
            $this->paginacion['siguiente'] = false;
        }
    }
}