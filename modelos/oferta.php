<?php 
// namespace Modelos;

class Oferta extends Modelo
{
    public function __construct() {
        parent::__construct();
    }


    public function getAll()
    {
        try {
            $resultados = null;
            if($query = $this->db->query("SELECT * FROM ofertas")){            
                // while ($row = $query->fetch_object()){
                while ($row = $query->fetch_array()){
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

    public function get($id)
    {
        try {
            if (empty($id)) { throw new \Exception("Falta un parametro"); }
            $resultados = null;
            $sql = "SELECT * FROM ofertas WHERE id = $id LIMIT 1";
            $query = $this->db->query($sql);
            if($query){
                $resultados = $query->fetch_array();
                $query->close();
            }
           
            return $resultados;
                    
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }

    
    public function alta($data)
    {
        try{
            
            $titulo = strtolower($data['titulo']);
            $descripcion = strtolower($data['descripcion']);
            $localidad_id = strtolower($data['localidad_id']);
            $carrera_id = strtolower($data['carrera_id']);
            $modalidad = strtolower($data['modalidad']);
            $horario_laboral = strtolower($data['horario_laboral']);
            $remuneracion = strtolower($data['remuneracion']);
            $creado = date('Y-m-d H:i:s');
            $usuario_id = $_SESSION['Usuario']['id'];
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO ofertas (titulo, descripcion, usuario_id, localidad_id, carrera_id, modalidad, horario_laboral, remuneracion, creado) 
                    VALUES ('$titulo', '$descripcion', '$usuario_id', '$localidad_id', '$carrera_id', '$modalidad', '$horario_laboral', '$remuneracion', '$creado')";
            
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
            $titulo = strtolower($data['titulo']);
            $descripcion = strtolower($data['descripcion']);
            $localidad_id = strtolower($data['localidad_id']);
            $carrera_id = strtolower($data['carrera_id']);
            $modalidad = strtolower($data['modalidad']);
            $horario_laboral = strtolower($data['horario_laboral']);
            $remuneracion = strtolower($data['remuneracion']);
            $creado = date('Y-m-d H:i:s');

            //Arma la instrucción SQL y luego la ejecuta
            $sql = "UPDATE curriculums SET titulo='$titulo', descripcion='$descripcion', localidad_id='$localidad_id', carrera_id='$carrera_id', modalidad='$modalidad', horario_laboral='$horario_laboral', remuneracion='$remuneracion', creado='$creado',  
                    WHERE id=$id";
                    
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
            $sql = "DELETE FROM ofertas WHERE id='$id'";
                    
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
            $sql = "SELECT * FROM ofertas WHERE 
                id = '$search' OR
                titulo LIKE '%$search%' OR
                descripcion LIKE '%$search%' ";

            $query = $this->db->query($sql);
            
            if($query){
                 while ($row = $query->fetch_array()){
                    $resultados[] = $row;
                }
                $query->close();
            }
           
            return $resultados;
        
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
