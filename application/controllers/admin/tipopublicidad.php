<?php

class Tipopublicidad extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/tipopublicidad_model');
        $this->load->library('gf');
    }
    
    function index()
    {
        $this->lists();
    }


    function lists()
    {
        $data['tipopublicidad_array'] = $this->tipopublicidad_model->tipopublicidad_list();
        $data['title'] = "Listado tipos publicidad";
        $data['view'] ='admin/tipopublicidad/tipopublicidad_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    function form($id_tipopublicidad = 0)
    {
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_TipoPublicidad'] = & $ID_TipoPublicidad;
        $data['TipoPublicidad'] = & $TipoPublicidad;
        $data['DetallePublicidad'] = & $DetallePublicidad;
        $data['Precio'] = & $Precio;
       
        $query_rows = $this->tipopublicidad_model->tipopublicidad_find($id_tipopublicidad);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear tipo publicidad';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar tipo publicidad';
            $data['accion'] = 'editar';

            //Tabla publicidad
            $ID_TipoPublicidad = $row->ID_TipoPublicidad;
            $TipoPublicidad = $row->TipoPublicidad;
            $DetallePublicidad  = $row->DetallePublicidad;
            $Precio = $row->Precio;
        }
        $data['view'] = "admin/tipopublicidad/tipopublicidad_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    
    function save()
    {
        $post_array = $this->input->post();
        
        $tipopublicidad_array = array(
            'ID_TipoPublicidad' => $post_array['ID_TipoPublicidad'],
            'TipoPublicidad'    => $post_array['TipoPublicidad'],
            'DetallePublicidad' => $post_array['DetallePublicidad'],
            'Precio'            => $post_array['Precio']
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->tipopublicidad_model->insert('tipopublicidad', $tipopublicidad_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->tipopublicidad_model->update($post_array['ID_TipoPublicidad'],$tipopublicidad_array);
        }

        redirect(base_url() . 'admin/tipopublicidad/lists/', 'refresh');
    }
    
    function delete($id_tipopublicidad=0)
    {
        $this->tipopublicidad_model->delete($id_tipopublicidad);
        redirect(base_url() . 'admin/tipopublicidad/lists/', 'refresh');
    }
}

?>

