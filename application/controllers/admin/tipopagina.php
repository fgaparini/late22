<?php

class Tipopagina extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/tipopagina_model');
        $this->load->library('gf');
    }
    
    function index()
    {
        $this->lists();
    }


    function lists()
    {
        $data['tipopagina_array'] = $this->tipopagina_model->tipopagina_list();
        $data['title'] = "Listado tipos paginas";
        $data['view'] = 'admin/tipopagina/tipopagina_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    function form($id_tipopagina = 0)
    {
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_TipoPagina'] = & $ID_TipoPagina;
        $data['TipoPagina'] = & $TipoPagina;
       
        $query_rows = $this->tipopagina_model->tipopagina_find($id_tipopagina);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear tipo página';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar tipo página';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_TipoPagina = $row->ID_TipoPagina;
            $TipoPagina = $row->TipoPagina;
           
           
        }
        $data['view'] = "admin/tipopagina/tipopagina_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    
    function save()
    {
        $post_array = $this->input->post();
        
        $tipopagina_array = array(
            'ID_TipoPagina' => $post_array['ID_TipoPagina'],
            'TipoPagina' => $post_array['TipoPagina']
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->tipopagina_model->insert('tipopagina', $tipopagina_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->tipopagina_model->update($post_array['ID_TipoPagina'],$tipopagina_array);
        }

        redirect(base_url() . 'admin/tipopagina/lists/', 'refresh');
    }
    
    function delete($id_tipopagina=0)
    {
        $this->tipopagina_model->delete($id_tipopagina);
        redirect(base_url() . 'admin/tipopagina/lists/', 'refresh');
    }
}

?>

