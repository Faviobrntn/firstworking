<?php 
// namespace Modelos;

class Usuario extends Modelo
{

    public $roles = [
        'admin' => 'Administrador',
        'postulante' => 'Postulante',
        'ofertante' => 'Ofertante'
    ];
    
    public function __construct() {
        parent::__construct();

        $this->tabla = "usuarios";
        $this->pk = "id";

        $this->asociaciones = [
            'Carrera' => [
                'pk' => 'id',
                'fk' => 'carrera_id',
                'tabla' => 'carreras'
            ],
            'Localidad' => [
                'pk' => 'id',
                'fk' => 'localidad_id',
                'tabla' => 'localidades'
            ]
        ];
    }


    /*public function getAll($asociaciones = [])
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
    }*/

    
    public function alta($data)
    {
        try{
            
            $nombre = strtolower($data['nombre']);
            $apellido = strtolower($data['apellido']);
            $email = strtolower($data['email']);
            $password = md5(strtolower($data['password']));
            $local = strtolower($data['localidad_id']);
            $rol = strtolower($data['rol']);
            $creado = date('Y-m-d H:i:s');
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO usuarios (nombre, apellido,  email,  password, localidad_id, rol,  creado) 
                    VALUES ('$nombre', '$apellido',  '$email',  '$password', '$local', '$rol', '$creado')";
            
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
    
    
    public function registro($data)
    {
        try{
            
            $nombre = strtolower($data['nombre']);
            $apellido = strtolower($data['apellido']);
            $email = strtolower($data['email']);
            $password = md5(strtolower($data['password']));
            $local = strtolower($data['localidad_id']);
            // $rol = 'usuario';
            $rol = strtolower($data['rol']);
            $creado = date('Y-m-d H:i:s');
    
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO usuarios (nombre, apellido,  email,  password, localidad_id, rol,  creado) 
                    VALUES ('$nombre', '$apellido',  '$email',  '$password', '$local', '$rol', '$creado')";
            
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



    public function buscar($search)
    {
        try {
            if (empty($search)) { throw new \Exception("Falta un parametro"); }

            $resultados = null;
            $sql = "SELECT * FROM usuarios WHERE 
                id = '$search' OR
                nombre LIKE '%$search%' OR
                apellido LIKE '%$search%' OR
                email LIKE '%$search%'
                LIMIT 1";
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
                    $resultados = $query->fetch_assoc();
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