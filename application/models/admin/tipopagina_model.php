<?php

class Tipopagina_model extends CI_Model
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
        $this->db->where('ID_TipoPagina', $id);
        $this->db->update('tipopagina', $row);
    }
    
    
    function tipopagina_list()
    {
        $query="select 
                *
                from
                tipopagina
                ";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function tipopagina_find($id_tipopagina)
    {
        $query=  sprintf("select * from tipopagina where ID_TipoPagina=%s",$id_tipopagina);
        $row = $this->db->query($query);
        return $row;
    }
    
    function delete($id_tipopagina)
    {
        $query=sprintf("delete from tipopagina where ID_TipoPagina=%s",$id_tipopagina);
        $this->db->query($query);
    }
    
}
?>
