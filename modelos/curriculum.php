<?php
// namespace Modelos;

class Curriculum extends Modelo
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getAll($usuario_id)
    {
        try {
            $resultados = null;
            if ($query = $this->db->query("SELECT * FROM curriculums WHERE usuario_id = $usuario_id;")) {
                // while ($row = $query->fetch_object()){
                while ($row = $query->fetch_array()) {
                    $resultados[] = $row;
                }
                $query->close();
            }
            // print_r($resultados);
            // exit;
            return $resultados;
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }

    public function get($id)
    {
        try {
            if (empty($id)) {
                throw new \Exception("Falta un parametro");
            }
            $resultados = null;
            $sql = "SELECT * FROM curriculums WHERE id = $id LIMIT 1";
            $query = $this->db->query($sql);
            if ($query) {
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


    public function actualizar($id, $data)
    {
        try {
            /*
            $nombre = strtolower($data['nombre']);
            $apellido = strtolower($data['apellido']);
            $email = strtolower($data['email']);
            */
            //Arma la instrucción SQL y luego la ejecuta
            $sql = "UPDATE curriculums SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id=$id";

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
