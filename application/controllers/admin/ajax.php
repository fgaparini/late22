<?php

class Ajax extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function alojamientos_form_select()
    {

        $pais = $this->input->get('pais');
        $provincia = $this->input->get('provincia');
        $ciudad = $this->input->get('ciudad');
        $tipo = $this->input->get('tipo');
        $array_mostrar = "";

        switch ($tipo)
        {
            case 'pais':
                $query = sprintf("select * from provincias where SUCountry='%s'", $pais);
                $array = $this->db->query($query);
                $array = $array->result_array();

                foreach ($array as $var)
                {
                    $array_codes = $var['SUCode'] . "," . $var['SUName'] . "-";
                    $array_mostrar = $array_mostrar . $array_codes;
                }
                //echo $array_mostrar;


                break;
            case 'provincia':
                $query = sprintf("select * from ciudades where Country='%s' and Subdivision='%s'", $pais, $provincia);
                $array = $this->db->query($query);
                $array = $array->result_array();

                foreach ($array as $var)
                {
                    $array_codes = $var['Location'] . "," . $var['Name'] . "-";
                    $array_mostrar = $array_mostrar . $array_codes;
                }

                break;
            case 'ciudad':
                $query = sprintf("select * from localidades where Country='%s' and Subdivision='%s' and Location='%s' ", $pais, $provincia, $ciudad);
                $array = $this->db->query($query);
                $array = $array->result_array();

                foreach ($array as $var)
                {
                    $array_codes = $var['ID_Localidades'] . "," . $var['Localidad'] . "-";
                    $array_mostrar = $array_mostrar . $array_codes;
                }
                break;
        }
        $array_mostrar = substr($array_mostrar, 0, strlen($array_mostrar) - 1);
        echo $array_mostrar;
    }

    function clientes_eliminar()
    {

        $query = sprintf("delete from clientes where ID_Cliente=%s", $this->input->post('ID_Cliente'));
        $this->db->query($query);
    }

    function habitaciones_eliminar()
    {
        $query = sprintf('delete from habitaciones where ID_Habitacion=%s', $this->input->post('ID_Habitacion'));
        $this->db->query($query);
    }

    //Funcion para borrar imagen
    function alojamientos_imagenes_delete()
    {
        $nombre_imagen = $this->input->post('NombreImagen');
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $query = sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s and NombreImagen=%s", $id_alojamiento, $nombre_imagen);
        $this->db->query($query);
    }

    //Funcion para borrar imagen
    function habitaciones_imagenes_delete()
    {
        $nombre_imagen = $this->input->post('NombreImagenHab');
        $id_habitacion = $this->input->post('ID_Habitacion');
        $query = sprintf("delete from habitaciones_imagenes where ID_Habitacion=%s and NombreImagenHab=%s", $id_habitacion, $nombre_imagen);
        $this->db->query($query);
    }

    //Funcion para listar los alojamientos con el autocompletado
    function reservas_alojamientos_list()
    {
        $query = "select informaciongeneral.nombre as name, alojamientos.ID_Alojamiento from alojamientos inner join informaciongeneral on alojamientos.ID_InformacionGeneral = informaciongeneral.ID_InformacionGeneral";
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        $array_comas = "";
        foreach ($rows as $var)
        {
            $array_comas = $var['name'] . "-" . $var['ID_Alojamiento'] . "," . $array_comas;
        }
        $array_comas = substr($array_comas, 0, strlen($array_comas) - 1);

        echo $array_comas;
    }

    function empresas_imagenes_descripcion()
    {
        $id_empresa = $this->input->post('ID_Empresa');
        $imagenempresa = $this->input->post('ImagenEmpresa');
        $imagendescripcion = $this->input->post('ImagenDescripcion');


        $query = sprintf('update empresas_imagenesemp set ImagenDescripcion="%s" where ID_Empresa=%s and ImagenEmpresa=%s', $imagendescripcion, $id_empresa, $imagenempresa);

        echo $query;
        $this->db->query($query);
    }
    
    function empresas_delete()
    {
        $id_empresa = $this->input->post('ID_Empresa');
        $query = sprintf("delete from empresas where ID_Empresa=%s",$id_empresa);
        $this->db->query($query);
    }

    function paginas_imagenes_descripcion()
    {
        $id_pagina = $this->input->post('ID_Pagina');
        $imagenpagina = $this->input->post('ImagenPagina');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update paginas_imagenespag set ImagenDescripcion="%s" where ID_Pagina=%s and ImagenPagina=%s', $imagendescripcion, $id_pagina, $imagenpagina);

        echo $query;
        $this->db->query($query);
    }
    
    function paginas_delete()
    {
        $id_pagina = $this->input->post('ID_Pagina');
        $query=sprintf("delete from paginas where ID_Pagina=%s",$id_pagina);
        $this->db->query($query);
    }

    function agendas_imagenes_descripcion()
    {
        $id_agenda = $this->input->post('ID_Agenda');
        $imagenagenda = $this->input->post('ImagenAgenda');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update agendas_imagenesage set ImagenDescripcion="%s" where ID_Agenda=%s and ImagenAgenda=%s', $imagendescripcion, $id_agenda, $imagenagenda);
        $this->db->query($query);
    }

    function habitaciones_imagenes_descripcion()
    {
        $id_habitacion = $this->input->post('ID_Habitacion');
        $imagenhabitacion = $this->input->post('ImagenHabitacion');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update habitaciones_imagenes set ImagenDescripcion="%s" where ID_Habitacion=%s and NombreImagenHab=%s', $imagendescripcion, $id_habitacion, $imagenhabitacion);
        $this->db->query($query);
    }
    
    function alojamientos_imagenes_descripcion()
    {
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $nombreimagen = $this->input->post('NombreImagen');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update alojamientos_imagenes set ImagenDescripcion="%s" where ID_Alojamiento=%s and ImagenDescripcion=%s', $imagendescripcion, $id_alojamiento, $nombreimagen);
        $this->db->query($query);
    }
}
?>
