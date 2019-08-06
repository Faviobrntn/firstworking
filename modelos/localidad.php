<?php 
// namespace Modelos;

class Localidad extends Modelo
{
    public function __construct() {
        parent::__construct();

        $this->tabla = "localidades";
        $this->pk = "id";

        $this->asociaciones = [
            'Provincia' => [
                'pk' => 'id',
                'fk' => 'provincia_id',
                'tabla' => 'provincias'
            ]
        ];
    }



    public function listado($campo = "nombre")
    {   
        try {
            $resultados = [];
            
            $query = $this->getAll();
            
            #print_r($query);
            #exit;
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
            $provincia_id = $data['provincia_id'];
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO localidades (nombre, descripcion,  creado, provincia_id) 
                    VALUES ('$nombre',  '$descripcion',  '$creado',  '$provincia_id')";
            
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
                
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "UPDATE localidades SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id";
                    
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
            $sql = "DELETE FROM localidades WHERE id='$id'";
                    
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
            $sql = "SELECT * FROM localidades WHERE nombre LIKE '%$search%' LIMIT 1";
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