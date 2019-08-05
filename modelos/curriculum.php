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


    public function getAll($asociaciones = [])
    {
        try {
            $resultados = null;

            $sql = "SELECT * FROM {$this->tabla}";

            if(!empty($_SESSION['Usuario']) AND $_SESSION['Usuario']['rol'] != 'admin'){
                $sql .= " WHERE usuario_id = ".$_SESSION['Usuario']['id'];
            }
            if ($query = $this->db->query($sql)) {
                // while ($row = $query->fetch_object()){
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



    public function alta($data)
    {
        try {
            $usuario_id = $data['usuario_id'];

            $titulo = $data['titulo'];
            $resumen = $data['resumen'];

            $id_carrera = $data['id_carrera'];
            $materias_aprobadas = $data['materias_aprobadas'];
            $promedio = $data['promedio'];
            $experiencia_laboral = $data['experiencia_laboral'];
            $conocimientos = $data['conocimientos'];
            $objetivos = $data['objetivos'];

            $creado = date('Y-m-d H:i:s');

            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO curriculums (usuario_id, titulo, resumen, id_carrera, materias_aprobadas, promedio, experiencia_laboral, conocimientos, objetivos, creado) 
                    VALUES ('$usuario_id', '$titulo', '$resumen', '$id_carrera', '$materias_aprobadas', '$promedio', '$experiencia_laboral', '$conocimientos', '$objetivos', '$creado')";

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
        $usuario_id = $data['usuario_id'];
        $titulo = $data['titulo'];
        $resumen = $data['resumen'];
        $id_carrera = $data['id_carrera'];
        $materias_aprobadas = $data['materias_aprobadas'];
        $promedio = $data['promedio'];
        $experiencia_laboral = $data['experiencia_laboral'];
        $conocimientos = $data['conocimientos'];
        $objetivos = $data['objetivos'];
        $creado = date('Y-m-d H:i:s');
        try {
            $sql = "UPDATE curriculums SET 
                usuario_id=$usuario_id,
                titulo = $titulo,
                resumen = $resumen,
                id_carrera = $id_carrera,
                materias_aprobadas = $materias_aprobadas,
                promedio = $promedio,
                experiencia_laboral = $experiencia_laboral,
                conocimientos = $conocimientos,
                objetivos = $objetivos,
                creado = $creado
            WHERE id=$id_cv";

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
        try {
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "DELETE FROM curriculums WHERE id='$id'";

            if ($this->db->query($sql) === TRUE) {
                return true;
            }

            return false;
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }
}
