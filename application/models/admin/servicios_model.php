<?php

class Servicios_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function insert($nombre_tabla, $row = array())
    {
        $this->db->insert($nombre_tabla, $row);
        return $this->db->insert_id();
    }

    function update($id, $row = array())
    {
        $this->db->where('ID_Servicio', $id);
        $this->db->update('servicios', $row);
    }
    
    
    function servicios_list()
    {
        $query="select 
                *
                from
                servicios
                ";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function servicios_find($id_servicio)
    {
        $query=  sprintf("select * from servicios where ID_Servicio=%s",$id_servicio);
        $row = $this->db->query($query);
        return $row;
    }
    
    function delete($id_servicio)
    {
        $query=sprintf("delete from servicios where ID_Servicio=%s",$id_servicio);
        $this->db->query($query);
    }
    
}
?>
