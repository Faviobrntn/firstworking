<?php 
// namespace Modelos;

class Usuario extends Modelo
{
    public function __construct() {
        parent::__construct();
    }


    public function getAll()
    {
        try {
            $resultados = null;
            if($query = $this->db->query("SELECT * FROM usuarios")){            
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
            $sql = "SELECT * FROM usuarios WHERE id = $id LIMIT 1";
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
            
            $nombre = strtolower($data['nombre']);
            $apellido = strtolower($data['apellido']);
            $email = strtolower($data['email']);
            $password = md5(strtolower($data['password']));
            $creado = date('Y-m-d H:i:s');
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO usuarios (nombre, apellido,  email,  password,  creado) 
                    VALUES ('$nombre', '$apellido',  '$email',  '$password',  '$creado')";
            
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
            $apellido = strtolower($data['apellido']);
            $email = strtolower($data['email']);
                
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id=$id";
                    
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
            $sql = "DELETE FROM usuarios WHERE id='$id'";
                    
            if ($this->db->query($sql) === TRUE) {
                return true;
            }
    
            return false;
        
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }



    public function login()
    {
        try{
            if (!empty($_POST)) {
                extract($_POST);

                $password = md5($password);
                
                $resultados = null;
                $sql = "SELECT * FROM usuarios WHERE email = '$email'  AND password = '$password' LIMIT 1";
                
                $query = $this->db->query($sql);
                
                if($query){
                    $resultados = $query->fetch_array();
                    $query->close();
                }
                
                return $resultados;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

}

?>