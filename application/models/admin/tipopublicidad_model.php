<?php

class Tipopublicidad_model extends CI_Model
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
        $this->db->where('ID_TipoPublicidad', $id);
        $this->db->update('tipopublicidad', $row);
    }
    
    
    function tipopublicidad_list()
    {
        $query="select 
                *
                from
                tipopublicidad
                ";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function tipopublicidad_find($id_tipopublicidad)
    {
        $query=  sprintf("select * from tipopublicidad where ID_TipoPublicidad=%s",$id_tipopublicidad);
        $row = $this->db->query($query);
        return $row;
    }
    
    function delete($id_tipopublicidad)
    {
        $query=sprintf("delete from tipopublicidad where ID_TipoPublicidad=%s",$id_tipopublicidad);
        $this->db->query($query);
    }
    
}
?>
