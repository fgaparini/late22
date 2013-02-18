<?php

class Paginas_model extends CI_Model
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

    function tipo_pagina_list()
    {
        $query = "select * from tipopagina";
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function paginas_list()
    {
        $query = "select 
                ID_Pagina,
                TituloContenido,
                Url,
                Keywords,
                TipoPagina
                from
                paginas
                inner join
                tipopagina ON tipopagina.ID_TipoPagina = paginas.ID_TipoPagina";

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function paginas_find($id_pagina)
    {
        $query = sprintf("select * from paginas where ID_Pagina=%s", $id_pagina);
        $row = $this->db->query($query);
        return $row;
    }

    function paginas_imagenes_list($id_pagina)
    {
        $query = sprintf("  select *
                            from 
                            paginas_imagenespag pi
                            where 
                            pi.ID_Pagina=%s order by ImagenPagina", $id_pagina);

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function paginas_images_delete($id_pagina)
    {
        $query = sprintf("delete from paginas_imagenespag where ID_Pagina=%s", $id_pagina);
        $this->db->query($query);
    }

    function paginas_images_delete_nombre_imagen($id_pagina, $nombre_foto)
    {
        $query = sprintf("delete from paginas_imagenespag where ID_Pagina=%s and ImagenPagina=%s", $id_pagina, $nombre_foto);
        $this->db->query($query);
    }

    function paginas_images_count($id_pagina)
    {
        $query = sprintf("select MAX(ImagenPagina) as count from paginas_imagenespag where ID_Pagina=%s", $id_pagina);
        $rows = $this->db->query($query);
        $rows = $rows->row();
        return $rows->count;
    }

    function paginas_images_save($id_pagina, $nombre_imagen)
    {
        $query = sprintf("insert into paginas_imagenespag (ID_Pagina,ImagenPagina) values (%s,%s)", $id_pagina, $nombre_imagen);
        $this->db->query($query);
    }
    
    function delete_paginas_imagenespag($id_pagina,$imagenpagina)
    {
        $query = sprintf("delete from paginas_imagenespag where ID_Pagina=%s and ImagenPagina=%s",$id_pagina,$imagenpagina);
        $this->db->query($query);
    }

}

?>
