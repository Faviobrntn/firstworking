<?php 
class Busqueda extends Modelo
{
    public function __construct() {
        parent::__construct();
    }

    public function buscar($search)
    {
        try {
            $resultados = [];
            if($query = $this->db->query("SELECT id, titulo, descripcion, creado FROM ofertas WHERE titulo LIKE '%$search%' AND descripcion LIKE '%$search%' ORDER BY creado DESC")){   
        
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
}
?>
