<?php 
require_once 'conexion.php';

class Modelo extends Conexion
{
    public $db;
    public $limite = 20;
    public $tabla = '';
    public $pk = '';
    public $asociaciones = [];
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
        $archivo = MODELOS . strtolower($model) .'.php';
        if (file_exists($archivo)) {
            require_once $archivo;
            $model = ucwords(strtolower($model));
            $this->$model = new $model();
        }else {
            throw new \Exception("No se encontro el modelo");
        }
    }

    
    public function get($id, $asociaciones = [])
    {
        try {
            if (empty($id)) { throw new \Exception("Falta un parametro"); }
            $resultados = null;
            $sql = "SELECT * FROM {$this->tabla} WHERE id = $id LIMIT 1";

            $query = $this->db->query($sql);
            if($query){
                $resultados = $query->fetch_assoc();
                $query->close();
            }

            if (!empty($asociaciones)) {
                foreach ($asociaciones as $asoc) {
                    if (array_key_exists($asoc, $this->asociaciones)) {
                        $this->loadModel($asoc);
                    }
                }
                $adjunto = [];
                foreach ($asociaciones as $asoc) {
                    if (array_key_exists($asoc, $this->asociaciones)) {
                        $fk = $this->asociaciones[$asoc]['fk'];
                        $adjunto[strtolower($asoc)] = $this->{$asoc}->get($resultados[$fk]);
                    }
                }

                array_push($resultados, $adjuntos);
            }
           
            return $resultados;
                    
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }


    public function cantidad($tabla){
        $sql = "SELECT COUNT(*) as total FROM $tabla";
        $cantidad = 0;

        $query = $this->db->query($sql);

        if($query){
            $cantidad = $query->fetch_assoc()['total'];
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



    public function __destruct() {
        //print "Destruyendo " . $this->name . "\n";
        $this->db->close();
    }

}