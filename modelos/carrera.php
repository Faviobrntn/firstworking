<?php 
// namespace Modelos;

class Carrera extends Modelo
{
    public function __construct() {
        parent::__construct();

        $this->tabla = "carreras";
        $this->pk = "id";

        $this->asociaciones = [
            'Facultad' => [
                'pk' => 'id',
                'fk' => 'facultad_id',
                'tabla' => 'facultades'
            ]
        ];
    }


    public function getAll($asociaciones = [])
    {
        try {
            $resultados = [];
            if($query = $this->db->query("SELECT * FROM carreras")){   
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


    public function listado($campo = "nombre")
    {
        try {
            $resultados = [];
            
            $query = $this->getAll();
            
            if(\count($query)){
                foreach ($query as $v) {
                    $resultados[$v['id']] = $v[$campo];
                }
            }

            return $resultados;
                    
        } catch (\Exception $e) {
            throw $e;
        }
    }

    
    public function alta($data)
    {
        try{
            
            $nombre = strtolower($data['nombre']);
            $descripcion = strtolower($data['descripcion']);
            $creado = date('Y-m-d H:i:s');
            $facultad_id = $data['facultad_id'];
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO carreras (nombre, descripcion,  creado, facultad_id) 
                    VALUES ('$nombre',  '$descripcion',  '$creado',  '$facultad_id')";
            
            // mysqli_query($this->db, $sql) or die (mysqli_error($this->db));
            
            if ($this->db->query($sql) === TRUE) {
                return true;
            }
    
            return false;
        
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }


    public function actualizar($id, $data)
    {
        try{
            
            $nombre = strtolower($data['nombre']);
            $descripcion = strtolower($data['descripcion']);
            $facultad_id = $data['facultad_id'];
                
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "UPDATE carreras SET nombre='$nombre', descripcion='$descripcion', facultad_id='$facultad_id' WHERE id=$id";
                    
            if ($this->db->query($sql) === TRUE) {
                return true;
            }
    
            return false;
        
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }
    
    
    public function eliminar($id)
    {
        try{
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "DELETE FROM carreras WHERE id='$id'";
                    
            if ($this->db->query($sql) === TRUE) {
                return true;
            }
    
            return false;
        
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }


    public function buscar($search)
    {
        try {
            if (empty($search)) { throw new \Exception("Falta un parametro"); }

            $resultados = null;
            $sql = "SELECT * FROM carreras WHERE nombre LIKE '%$search%' LIMIT 1";
            $query = $this->db->query($sql);
            if($query){
                 while ($row = $query->fetch_assoc()){
                    $resultados[] = $row;
                }
                $query->close();
            }
           
            return $resultados;
        
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }
}

?>