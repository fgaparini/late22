<?php

class Tipoempresa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/tipoempresa_model');
        $this->load->library('gf');
    }
    
    function index()
    {
        $this->lists();
    }


    function lists()
    {
        $data['tipoempresa_array'] = $this->tipoempresa_model->tipoempresa_list();
        $data['title'] = "Listado tipos empresas";
        $data['view'] = 'admin/tipoempresa/tipoempresa_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    function form($id_tipoempresa = 0)
    {
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_TipoEmpresa'] = & $ID_TipoEmpresa;
        $data['TipoEmpresa'] = & $TipoEmpresa;
       
        $query_rows = $this->tipoempresa_model->tipoempresa_find($id_tipoempresa);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear tipo empresa';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar tipo empresa';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_TipoEmpresa = $row->ID_TipoEmpresa;
            $TipoEmpresa = $row->TipoEmpresa;
           
           
        }
        $data['view'] = "admin/tipoempresa/tipoempresa_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    
    function save()
    {
        $post_array = $this->input->post();
        $tipoempresa_array = array(
            'ID_TipoEmpresa' => $post_array['ID_TipoEmpresa'],
            'TipoEmpresa' => $post_array['TipoEmpresa']
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->tipoempresa_model->insert('tipoempresa', $tipoempresa_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->tipoempresa_model->update($post_array['ID_TipoEmpresa'],$tipoempresa_array);
        }

        redirect(base_url() . 'admin/tipoempresa/lists/', 'refresh');
    }
    
    function delete($id_tipoempresa=0)
    {
        $this->tipoempresa_model->delete($id_tipoempresa);
        redirect(base_url() . 'admin/tipoempresa/lists/', 'refresh');
    }
}

?>

