<?php
// namespace Modelos;

class Postulacion extends Modelo
{
    public function __construct()
    {
        parent::__construct();

        $this->tabla = "postulaciones";
        $this->pk = "usuario_id";
        $this->pk = "oferta_id";

        $this->asociaciones = [
            'Oferta' => [
                'pk' => 'id',
                'fk' => 'oferta_id',
                'tabla' => 'ofertas'
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

            $usuario = strtolower($_SESSION['Usuario']['id']);
            $oferta = strtolower($data['oferta']);
            $cv = strtolower($data['cv_seleccionado']);

            //Arma la instrucción SQL y luego la ejecuta
            $sql = "INSERT INTO postulaciones (usuario_id, oferta_id, cv_id) 
                    VALUES ('$usuario', '$oferta', '$cv')";

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
            $usuario = strtolower($_SESSION['Usuario']['id']);
            $oferta = strtolower($data['oferta']);
            $cv = strtolower($data['cv_seleccionado']);

            //Arma la instrucción SQL y luego la ejecuta
            $sql = "UPDATE postulaciones SET cv_id='$cv' WHERE usuario_id='$usuario' AND oferta_id='$oferta'";

            if ($this->db->query($sql) === TRUE) {
                return true;
            }

            return false;
        } catch (\Exception $e) {
            // throw new Exception("Error: %s\n", $e->getMessage());
            throw $e;
        }
    }


    public function eliminar($id_oferta)
    {
        try {
            $usuario = strtolower($_SESSION['Usuario']['id']);
            $sql = "DELETE FROM postulaciones WHERE usuario_id='$usuario' AND oferta_id='$id_oferta'";

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
