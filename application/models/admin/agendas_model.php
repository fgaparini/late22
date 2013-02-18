<?php

class Agendas_model extends CI_Model
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

    function update($id, $row = array(), $id_nombre, $nombre_tabla)
    {
        $this->db->where($id_nombre, $id);
        $this->db->update($nombre_tabla, $row);
    }

    function agendas_list()
    {
        $query = "select 
                *
                from
                agendas
                ";

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function agendas_find($id_agenda)
    {
        $query = sprintf("select * from agendas where ID_Agenda=%s", $id_agenda);
        $row = $this->db->query($query);
        return $row;
    }

    function delete($id_agenda)
    {
        $query = sprintf("delete from agendas where ID_Agenda=%s", $id_agenda);
        $this->db->query($query);
    }

    function agendas_imagenes_list($id)
    {
        $query = sprintf("  select *
                            from 
                            agendas_imagenesage ai
                            where 
                            ai.ID_Agenda=%s order by ImagenAgenda", $id);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function agendas_images_delete($id)
    {
        $query = sprintf("delete from agendas_imagenesage where ID_Agenda=%s", $id);
        $this->db->query($query);
    }

    function agendas_images_delete_nombre_imagen($id, $nombre_foto)
    {
        $query = sprintf("delete from agendas_imagenesage where ID_Agenda=%s and ImagenAgenda=%s", $id, $nombre_foto);
        $this->db->query($query);
    }

    function agendas_images_count($id)
    {
        $query = sprintf("select MAX(ImagenAgenda) as count from agendas_imagenesage where ID_Agenda=%s", $id);
        $rows = $this->db->query($query);
        $rows = $rows->row();
        return $rows->count;
    }

    function agendas_images_save($id, $nombre_imagen)
    {
        $query = sprintf("insert into agendas_imagenesage (ID_Agenda,ImagenAgenda) values (%s,%s)", $id, $nombre_imagen);
        $this->db->query($query);
    }

    function delete_agendas_imagenespag($id, $imagenpagina)
    {
        $query = sprintf("delete from agendas_imagenesage where ID_Agenda=%s and ImagenAgenda=%s", $id, $imagenpagina);
        $this->db->query($query);
    }

}

?>
