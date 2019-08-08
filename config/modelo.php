<?php 
require_once 'conexion.php';

class Modelo extends Conexion
{
    public $db;
    public $limite = 3;
    public $tabla = '';
    public $pk = '';
    public $asociaciones = [];
    public $paginador = [
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

    /**
     * LoadModel
     * carga el modelo que recibe como parametro
     * @param string $model
     * @return void
     * @throws Exception Si no se encuentra
     */
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

    
    /**
     * Get
     * Obtiene un registro del modelo que lo usa,
     * con sus asociaciones
     * @param string $id
     * @param array $asociaciones
     * @return array $resultados
     * @throws Exception
     */
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

                $resultados = $resultados + $adjuntos;
            }
           
            return $resultados;
                    
        } catch (\Exception $e) {
            throw $e;
        }
    }


    /**
     * GetAll
     * Obtiene todos los registros del modelo que lo usa,
     * con sus asociaciones
     * @param array $asociaciones
     * @return array $resultados
     * @throws Exception
     */
    public function getAll($asociaciones = [])
    {
        try {
            $resultados = null;

            $sql = "SELECT * FROM {$this->tabla}";

            if((!empty($_SESSION['Usuario']) AND $_SESSION['Usuario']['rol'] != 'admin')){
                if (!empty($this->asociaciones['Usuario'])) {
                    $sql .= " WHERE usuario_id = ".$_SESSION['Usuario']['id'];
                }
            }
            if($query = $this->db->query($sql)){            
                while ($row = $query->fetch_assoc()){
                    $resultados[] = $row;
                }
                $query->close();
            }

            if ((!empty($resultados) AND !empty($asociaciones))) {
                foreach ($asociaciones as $asoc) {
                    if (array_key_exists($asoc, $this->asociaciones)) {
                        $this->loadModel($asoc);
                    }
                }
                foreach ($resultados as $k => $r) {
                    $adjunto = [];
                    foreach ($asociaciones as $asoc) {
                        if (array_key_exists($asoc, $this->asociaciones)) {
                            $fk = $this->asociaciones[$asoc]['fk'];
                            $adjunto[strtolower($asoc)] = $this->{$asoc}->get($r[$fk]);
                        }
                    }
                    $resultados[$k] = $resultados[$k] + $adjunto;
                }
            }

            return $resultados;
        
        } catch (\Exception $e) {
            throw $e;
        }
    }


    /**
     * Cantidad
     * Obtiene la cantidad de registros del modelo que lo usa,
     * @param string $tabla
     * @return int $cantidad
     */
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


    /**
     * Paginar
     * Añade sentencia SQL para poder paginar,
     * ademas construye la variable de clase de tipo array
     * @param string &$slq
     * @return void
     */
    public function paginar(&$sql){
        $this->paginador['actual'] = 1;
        if (!empty($_GET['page'])){ $this->paginador['actual'] = $_GET['page']; }
        if (!empty($_GET['search'])){ $this->paginador['actual'] = 1; unset($_GET['page']); }

        $this->paginador['cant_por_pagina'] = $this->limite;
        $this->paginador['cantidad'] = $this->cantidad('ofertas');

        $this->paginador['paginas'] = ceil(($this->paginador['cantidad'] / $this->limite));

        $pagina = (($this->paginador['actual']-1) * $this->limite);
        $sql .= " LIMIT {$this->limite} OFFSET $pagina";


        if(($this->paginador['actual'] - 1)){
            $this->paginador['anterior'] = $this->paginador['actual'] - 1;
        }else{
            $this->paginador['anterior'] = false;
        }

        if (($this->paginador['actual'] + 1) <=  $this->paginador['paginas']){
            $this->paginador['siguiente'] = $this->paginador['actual'] + 1;
        }else{
            $this->paginador['siguiente'] = false;
        }

    }



    public function __destruct() {
        //print "Destruyendo " . $this->name . "\n";
        $this->db->close();
    }

}