<?php

class Empresas_model extends CI_Model
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
    
    function empresas_list()
    {
        $query="
                select empresas.ID_Empresa,Empresa,Direccion,Telefono,TipoEmpresa from empresas
                inner join
                tipoempresa
                on 
                empresas.ID_TipoEmpresa = tipoempresa.ID_TipoEmpresa
                ";
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function empresas_find($id_empresa)
    {
        $query=  sprintf("select * from empresas where ID_Empresa=%s",$id_empresa);
        $row = $this->db->query($query);
        return $row;
    }
    
    function find_precio_tipo_publicidad($id_tipopublicidad)
    {
        $query=  sprintf("select Precio from tipopublicidad where ID_TipoPublicidad=%s",$id_tipopublicidad);
        $row = $this->db->query($query);
        $row = $row->row();
        return $row->Precio;
    }
    
    function publicidad_select()
    {
        $query = "select * from tipopublicidad";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function info_publicidad($id_alojamiento)
    {
        $query = sprintf("
                            select
                            ep.ID_Empresa,
                            p.ID_Publicidad,
                            TipoPublicidad,
                            p.Precio,
                            FechaPublicidad,
                            Activo,
                            DetallePublicidad,
                            PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM NOW()), EXTRACT(YEAR_MONTH FROM FechaPublicidad)) AS Meses
                            from 
                            empresas_publicidad as ep
                            inner join
                            publicidad as p
                            on 
                            p.ID_Publicidad = ep.ID_Publicidad
                            inner join
                            tipopublicidad as tp
                            on
                            p.ID_TipoPublicidad = tp.ID_TipoPublicidad            
                            where ID_Empresa=%s order by activo desc", $id_alojamiento);
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function tipo_empresas_list()
    {
        $query="select * from tipoempresa";
        $rows= $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function find_precio_publicidad($id_publicidad)
    {
        $query=  sprintf("select Precio, ID_TipoPublicidad from publicidad where ID_Publicidad=%s ",$id_publicidad);
        $row = $this->db->query($query);
        $row = $row->row();
        return $row;
    }
    
    function update_estado_publicidad_simple($id_publicidad,$estado)
    {
        $query=  sprintf("update publicidad set Activo=%s where ID_Publicidad=%s",$estado,$id_publicidad);
        $this->db->query($query);
    }
    
    function update_estado_publicidad($id_publicidad)
    {
        $query=sprintf("select Activo from publicidad where ID_Publicidad=%s",$id_publicidad);
        $row = $this->db->query($query);
        $row = $row->row();
        $activo = $row->Activo;
        $valor=1;
        if($activo==1)
            $valor=0;
        else
            $valor=1;
        
        $query=sprintf("update publicidad set activo=%s where ID_Publicidad=%s",$valor,$id_publicidad);
        $this->db->query($query);
    }
    
    function empresas_imagenes_list($id_empresa)
    {
        $query = sprintf("  select *
                            from 
                            empresas_imagenesemp ei 
                            where 
                            ei.ID_Empresa=%s order by ImagenEmpresa", $id_empresa);
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function empresas_images_delete($id_empresa)
    {
        $query = sprintf("delete from empresas_imagenesemp where ID_Empresa=%s", $id_empresa);
        $this->db->query($query);
    }

    function empresas_images_delete_nombre_imagen($id_empresa, $nombre_foto)
    {
        $query = sprintf("delete from empresas_imagenesemp where ID_Empresa=%s and ImagenEmpresa=%s", $id_empresa, $nombre_foto);
        $this->db->query($query);
    }
    
    function empresas_images_count($id_empresa)
    {
        $query = sprintf("select MAX(ImagenEmpresa) as count from empresas_imagenesemp where ID_Empresa=%s", $id_empresa);
        $rows = $this->db->query($query);
        $rows = $rows->row();
        return $rows->count;
    }
    
    function empresas_images_save($id_empresa, $nombre_imagen)
    {
        $query = sprintf("insert into empresas_imagenesemp (ID_Empresa,ImagenEmpresa) values (%s,%s)", $id_empresa, $nombre_imagen);
        $this->db->query($query);
    }
    
    function delete_empresas_imagenesemp($id_empresa,$imagenempresa)
    {
        $query = sprintf("delete from empresas_imagenesemp where ID_Empresa=%s and ImagenEmpresa=%s",$id_empresa,$imagenempresa);
        $this->db->query($query);
    }
}
?>