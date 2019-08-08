<?php 
// namespace Modelos;

class Oferta extends Modelo
{
    public function __construct() {
        parent::__construct();

        $this->tabla = "ofertas";
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
            ],
            'Usuario' => [
                'pk' => 'id',
                'fk' => 'usuario_id',
                'tabla' => 'usuarios'
            ]
        ];
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
                (id = '$search' OR
                 titulo LIKE '%$search%' OR
                 descripcion LIKE '%$search%') ";

            if(!empty($_SESSION['Usuario']) AND $_SESSION['Usuario']['rol'] != 'admin'){
                $sql .= " AND usuario_id = ".$_SESSION['Usuario']['id'];
            }

            $query = $this->db->query($sql);
            
            if($query){
                 while ($row = $query->fetch_assoc()){
                    $resultados[] = $row;
                }
                $query->close();
            }
           
            return $resultados;
        
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function busqueda($asociaciones = [])
    {
        try {

            $resultados = null;
            $sql = "SELECT * FROM ofertas WHERE 1";

            if(!empty($_GET['search'])){
                $search = $_GET['search'];
                $sql .= " AND (titulo LIKE '%$search%' OR descripcion LIKE '%$search%')";
            }

            $this->paginar($sql);
            // debug($sql); exit;
            $query = $this->db->query($sql);
            // debug($query); exit;
            if($query){
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

            // debug($resultados); exit;
            return $resultados;

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
