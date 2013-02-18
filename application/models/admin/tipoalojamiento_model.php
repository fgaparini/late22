<?php

class Tipoalojamiento_model extends CI_Model
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
        $this->db->where('ID_TipoAlojamiento', $id);
        $this->db->update('tipoalojamiento', $row);
    }
    
    
    function tipoalojamiento_list()
    {
        $query="select 
                *
                from
                tipoalojamiento
                ";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function tipoalojamiento_find($id_tipoalojamiento)
    {
        $query=  sprintf("select * from tipoalojamiento where ID_TipoAlojamiento=%s",$id_tipoalojamiento);
        $row = $this->db->query($query);
        return $row;
    }
    
    function delete($id_tipoalojamiento)
    {
        $query=sprintf("delete from tipoalojamiento where ID_TipoAlojamiento=%s",$id_tipoalojamiento);
        $this->db->query($query);
    }
    
}
?>
