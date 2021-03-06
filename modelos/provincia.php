<?php 
// namespace Modelos;

class Provincia extends Modelo
{
    public function __construct() {
        parent::__construct();

        $this->tabla = "provincias";
        $this->pk = "id";
    }



    public function listado($campo = "nombre")
    {
        try {
            $resultados = [];
            
            $query = $this->getAll();
            
            if(count($query)){
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
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO provincias (nombre, descripcion,  creado) 
                    VALUES ('$nombre',  '$descripcion',  '$creado')";
            
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
            $sql = "UPDATE provincias SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id";
                    
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
            $sql = "DELETE FROM provincias WHERE id='$id'";
                    
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
            $sql = "SELECT * FROM provincias WHERE nombre LIKE '%$search%' LIMIT 1";
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
