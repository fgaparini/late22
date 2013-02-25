<?php

class Huesped_model extends CI_Model
{
    
    const tabla="husped";
    const id_tabla="ID_Huesped";
    
    function insert($nombre_tabla, $row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }
    
}


?>
