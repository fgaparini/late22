<?php

class Categorias_model extends CI_Model
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
        $this->db->where('ID_Categorias', $id);
        $this->db->update('categorias', $row);
    }
    
    
    function categorias_list()
    {
        $query="select 
                *
                from
                categorias
                ";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function categorias_find($id_categoria)
    {
        $query=  sprintf("select * from categorias where ID_Categorias=%s",$id_categoria);
        $row = $this->db->query($query);
        return $row;
    }
    
    function delete($id_categoria)
    {
        $query=sprintf("delete from categorias where ID_Categorias=%s",$id_categoria);
        $this->db->query($query);
    }
    
}
?>
