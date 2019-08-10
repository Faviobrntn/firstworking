<?php
// namespace Modelos;

class Postulacion extends Modelo
{
    public function __construct()
    {
        parent::__construct();

        $this->tabla = "postulaciones";
        $this->pk = "id";

        $this->asociaciones = [
            'Curriculum' => [
                'pk' => 'id',
                'fk' => 'cv_id',
                'tabla' => 'cv'
            ],
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
            $cv = strtolower($data['cv']);

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

    #------------------------FIJATE FER, LAS DE ACA ABAJO AGREGUE RECIEN, NO SE SI ESTO ES LO QUE SE NECESITABA-------------------------

    public function buscar($search)
    {
        try {
            if (empty($search)) { throw new \Exception("Falta un parametro"); }
            $resultados = null;
            $sql = "SELECT * FROM postulaciones WHERE oferta_id = '$search') ";

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
            $sql = "SELECT * FROM postulaciones WHERE 1";

            if(!empty($_GET['search'])){
                $search = $_GET['search'];
                $sql .= " AND (usuario_id = '$search' AND oferta_id = '$search')";
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
