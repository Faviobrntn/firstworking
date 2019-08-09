<?php
// namespace Modelos;

class Curriculum extends Modelo
{
    public function __construct()
    {
        parent::__construct();

        $this->tabla = "cv";
        $this->pk = "id";

        $this->asociaciones = [
            'Carrera' => [
                'pk' => 'id',
                'fk' => 'idcarrera',
                'tabla' => 'carreras'
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
        try {
            $usuario_id = $_SESSION['Usuario']['id']; //$data['usuario_id'];

            $titulo = $data['title'];
            $resumen = $data['resumen'];

            $id_carrera = $data['id_carrera'];
            $materias_aprobadas = $data['materias_aprobadas'];
            $promedio = $data['promedio'];
            $experiencia_laboral = $data['experiencia_laboral'];
            $conocimientos = $data['conocimientos'];
            $objetivos = $data['objetivos'];

            $creado = date('Y-m-d H:i:s');

            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO cv (usuario_id, titulo, resumen, idcarrera, materias_aprobadas, promedio, experiencia_laboral, conocimientos, objetivos, archivo, creado) 
                    VALUES ('$usuario_id', '$titulo', '$resumen', '$id_carrera', '$materias_aprobadas', '$promedio', '$experiencia_laboral', '$conocimientos', '$objetivos', null, '$creado')";
            //debug($sql);
            //exit();
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


    public function actualizar($id_cv, $data)
    {
        //$usuario_id = $data['usuario_id'];
        $usuario_id = $_SESSION['Usuario']['id']; //$data['usuario_id'];
        $titulo = $data['title'];
        $resumen = $data['resumen'];
        $id_carrera = $data['id_carrera'];
        $materias_aprobadas = $data['materias_aprobadas'];
        $promedio = $data['promedio'];
        $experiencia_laboral = $data['experiencia_laboral'];
        $conocimientos = $data['conocimientos'];
        $objetivos = $data['objetivos'];
        $creado = date('Y-m-d H:i:s');
        try {
            $sql = "UPDATE cv SET 
                usuario_id=$usuario_id,
                titulo = $titulo,
                resumen = $resumen,
                idcarrera = $id_carrera,
                materias_aprobadas = $materias_aprobadas,
                promedio = $promedio,
                experiencia_laboral = $experiencia_laboral,
                conocimientos = $conocimientos,
                objetivos = $objetivos,
                archivo = null,
                creado = $creado
            WHERE id=$id_cv";

            if ($this->db->query($sql) === TRUE) {
                return true;
            }
            print_r($sql);
            exit();

            return false;
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }


    public function eliminar($id)
    {
        try {
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "DELETE FROM cv WHERE id='$id'";

            if ($this->db->query($sql) === TRUE) {
                return true;
            }
            return false;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function buscar($search)
    {
        try {
            if (empty($search)) { throw new \Exception("Falta un parametro"); }
            $resultados = null;
            $sql = "SELECT * FROM cv WHERE 
                (id = '$search' OR
                 titulo LIKE '%$search%') ";

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
            $sql = "SELECT * FROM cv";

            if(!empty($_GET['search'])){
                $search = $_GET['search'];
                $sql .= " AND (id = '$search' OR titulo LIKE '%$search%')";
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
