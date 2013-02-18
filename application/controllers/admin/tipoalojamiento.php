<?php

class Tipoalojamiento extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/tipoalojamiento_model');
        $this->load->library('gf');
    }
    
    function index()
    {
        $this->lists();
    }


    function lists()
    {
        $data['tipoalojamiento_array'] = $this->tipoalojamiento_model->tipoalojamiento_list();
        $data['title'] = "Listado tipos alojamientos";
        $data['view'] = 'admin/tipoalojamiento/tipoalojamiento_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    function form($id_tipoalojamiento = 0)
    {
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_TipoAlojamiento'] = & $ID_TipoAlojamiento;
        $data['TipoAlojamiento'] = & $TipoAlojamiento;
       
        $query_rows = $this->tipoalojamiento_model->tipoalojamiento_find($id_tipoalojamiento);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear tipo alojamiento';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar tipo alojamiento';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_TipoAlojamiento = $row->ID_TipoAlojamiento;
            $TipoAlojamiento = $row->TipoAlojamiento;
           
           
        }
        $data['view'] = "admin/tipoalojamiento/tipoalojamiento_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    
    function save()
    {
        $post_array = $this->input->post();
        
        $tipoalojamiento_array = array(
            'ID_TipoAlojamiento' => $post_array['ID_TipoAlojamiento'],
            'TipoAlojamiento' => $post_array['TipoAlojamiento']
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->tipoalojamiento_model->insert('tipoalojamiento', $tipoalojamiento_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->tipoalojamiento_model->update($post_array['ID_TipoAlojamiento'],$tipoalojamiento_array);
        }

        redirect(base_url() . 'admin/tipoalojamiento/lists/', 'refresh');
    }
    
    function delete($id_tipoalojamiento=0)
    {
        $this->tipoalojamiento_model->delete($id_tipoalojamiento);
        redirect(base_url() . 'admin/tipoalojamiento/lists/', 'refresh');
    }
}

?>

