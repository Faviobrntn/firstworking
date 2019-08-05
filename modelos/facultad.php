<?php 
// namespace Modelos;

class Facultad extends Modelo
{
    public function __construct() {
        parent::__construct();

        $this->tabla = "facultades";
        $this->pk = "id";

        $this->asociaciones = [
            'Localidad' => [
                'pk' => 'id',
                'fk' => 'localidad_id',
                'tabla' => 'localidades'
            ]
        ];
    }


    public function getAll($asociaciones = [])
    {
        try {
            $resultados = null;

            $sql = "SELECT * FROM {$this->tabla}";

            if ($query = $this->db->query($sql)) {
                while ($row = $query->fetch_assoc()) {
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
            // throw new Exception("Error: %s\n", $e->getMessage());
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
            $email = strtolower($data['email']);
            $direccion = strtolower($data['direccion']);
            $descripcion = strtolower($data['descripcion']);
            $localidad_id = strtolower($data['localidad_id']);
            $creado = date('Y-m-d H:i:s');
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO facultades (nombre, email, direccion, descripcion, localidad_id, creado) 
                    VALUES ('$nombre', '$email', '$direccion', '$descripcion', '$localidad_id', '$creado')";
            
            // mysqli_query($this->db, $sql) or die (mysqli_error($this->db));
            
            if ($this->db->query($sql) === TRUE) {
                return true;
            }else{
                throw new \Exception("Error: ". $this->db->error);
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
            $email = strtolower($data['email']);
            $direccion = strtolower($data['direccion']);
            $descripcion = strtolower($data['descripcion']);
            $localidad_id = strtolower($data['localidad_id']);
                
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "UPDATE facultades SET nombre='$nombre', email='$email', direccion='$direccion', descripcion='$descripcion', localidad_id='$localidad_id' WHERE id=$id";
                    
            if ($this->db->query($sql) === TRUE) {
                return true;
            }else{
                throw new \Exception("Error: ". $this->db->error);
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
            $sql = "DELETE FROM facultades WHERE id='$id'";
                    
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
            $sql = "SELECT * FROM facultades WHERE nombre LIKE '%$search%' LIMIT 1";
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