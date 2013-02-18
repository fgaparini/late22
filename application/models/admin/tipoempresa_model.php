<?php

class Tipoempresa_model extends CI_Model
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
        $this->db->where('ID_TipoEmpresa', $id);
        $this->db->update('tipoempresa', $row);
    }
    
    
    function tipoempresa_list()
    {
        $query="select 
                *
                from
                tipoempresa
                ";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function tipoempresa_find($id_tipoempresa)
    {
        $query=  sprintf("select * from tipoempresa where ID_TipoEmpresa=%s",$id_tipoempresa);
        $row = $this->db->query($query);
        return $row;
    }
    
    function delete($id_tipoempresa)
    {
        $query=sprintf("delete from tipoempresa where ID_TipoEmpresa=%s",$id_tipoempresa);
        $this->db->query($query);
    }
    
}
?>
