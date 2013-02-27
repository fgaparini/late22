<?php
class Reservas_det_model extends CI_Model
{
    const tabla="reservas_det";
    const id_tabla="Localizador";
    
    
    function insert($row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }
}
?>
