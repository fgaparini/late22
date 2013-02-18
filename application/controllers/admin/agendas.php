<?php

class Agendas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/agendas_model');
        $this->load->config('avanbook_config');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function lists()
    {
        $data['agendas_array'] = $this->agendas_model->agendas_list();
        $data['title'] = "Listado Agenda";
        $data['js'] = array('admin/js/agendas_lists');
        $data['view'] ='admin/agendas/agendas_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form($id_agenda = 0)
    {
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_Agenda'] = & $ID_Agenda;
        $data['Titulo'] = & $Titulo;
        $data['Descripcion'] = & $Descripcion;
        $data['Fecha'] = & $Fecha;

        $query_rows = $this->agendas_model->agendas_find($id_agenda);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear Agenda';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar Agenda';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_Agenda = $row->ID_Agenda;
            $Titulo = $row->Titulo;
            $Descripcion = $row->Descripcion;
            $Fecha = $row->Fecha;
        }
        $data['css'] = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');
        $data['js'] = array(
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.position',
            'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
            'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/ckeditor/ckeditor',
            'js/admin/agendas_form'
            
        );
        $data['view'] ='admin/agendas/agendas_form';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        $post_array = $this->input->post();

        //Cambiar fecha para mysql
        $fecha = $post_array['Fecha'];
        $fecha = $this->gf->html_mysql($fecha);

        $agendas_array = array(
            'ID_Agenda' => $post_array['ID_Agenda'],
            'Titulo' => $post_array['Titulo'],
            'Descripcion' => $post_array['Descripcion'],
            'Fecha' => $fecha
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->agendas_model->insert('agendas', $agendas_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->agendas_model->update($post_array['ID_Agenda'], $agendas_array, 'ID_Agenda', 'agendas');
        }

        redirect(base_url() . 'admin/agendas/lists/', 'refresh');
    }

    function delete($id_agenda = 0)
    {
        $this->agendas_model->delete($id_agenda);
        redirect(base_url() . 'admin/agendas/lists/', 'refresh');
    }

    function agendas_imagenes_list($id)
    {
        //$data['js'] = array('js/empresas_publicidad_list');
        $row = $this->agendas_model->agendas_find($id);
        $row = $row->row();
        $data['Titulo'] = $row->Titulo;
        $data['ID_Agenda'] = $row->ID_Agenda;
        $data['imagenes_array'] = $this->agendas_model->agendas_imagenes_list($id);
        $data['title'] = 'Agendas Imagenes';
        $data['js'] = array('js/admin/agendas_imagenes_list', 'js/blockui-master/jquery.blockUI');
        $data['view'] = 'admin/agendas/agendas_imagenes_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    //Funciones para guardar muchas imagenes
    function agendas_imagenes_save()
    {
        $id_agenda = $this->input->post('ID_Agenda');
        $tipo = $this->input->post('tipo');
        $nombre_imagen = $this->input->post('foto_numero');

        $cantidad_fotos = 0;

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {

                //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                if ($tipo == 'foto_comun')
                    $this->agendas_model->agendas_images_delete_nombre_imagen($id_agenda, $nombre_imagen);
                elseif ($tipo == 'muchas_fotos')
                     $this->agendas_model->agendas_images_delete($id_agenda);

                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {

                    $i++;

                    $cantidad_fotos = $this->agendas_model->agendas_images_count($id_agenda);
                    $cantidad_fotos = $cantidad_fotos + 1;

                    if ($cantidad_fotos <= 12)
                    {

                        if ($tipo == 'muchas_fotos')
                        {
                            $image_name = $this->config->item('upload_path_agenda') . $id_agenda . "_" . $i . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_agenda_thumb') . $id_agenda . "_" . $i . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_agenda_thumb') . $id_agenda . "_" . $i . ".jpg";
                        }
                        elseif ($tipo == 'foto_comun')
                        {
                            $image_name = $this->config->item('upload_path_agenda') . $id_agenda . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_agenda_thumb') . $id_agenda . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_agenda_thumb') . $id_agenda . "_" . $nombre_imagen . ".jpg";
                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name = $this->config->item('upload_path_agenda') . $id_agenda . "_" . $cantidad_fotos . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_agenda_thumb') . $id_agenda . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_agenda_thumb') . $id_agenda . "_" . $cantidad_fotos . ".jpg";
                        }


                        $image = ImageCreateFromJPEG($file);
                        //ancho
                        $width = imagesx($image);
                        //alto imagen
                        $height = imagesy($image);
                        //nuevo ancho imagen
                        $new_width = 550;
                        //calcular alto 
                        $new_height = ($new_width * $height) / $width;
                        //crear imagen nueva
                        $thumb = imagecreatetruecolor($new_width, $new_height);
                        //redimensiono
                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                        //Guardo imagen final 
                        ImageJPEG($thumb, $image_name);

                        //Thumb
                        //nuevo ancho imagen
                        $new_width = 100;
                        //calcular alto 
                        $new_height = ($new_width * $height) / $width;
                        //crear imagen nueva
                        $thumb = imagecreatetruecolor($new_width, $new_height);
                        //redimensiono
                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                        //Guardo imagen final 
                        ImageJPEG($thumb, $thumb_chica);

                        if ($i == 1 or $cantidad_fotos == 1 or $nombre_imagen == '1')
                        {
                            //Thumprincipal
                            //nuevo ancho imagen
                            $new_height = 270;
                            //calcular alto 
                            $new_width = ($new_height * $width) / $height;
                            //crear imagen nueva
                            $thumb = imagecreatetruecolor($new_width, $new_height);
                            //redimensiono
                            imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                            //Guardo imagen final 
                            ImageJPEG($thumb, $thumb_grande);
                        }

                        //Guardar imagenes en la table alojamientos_imagenes
                        if ($tipo == 'foto_comun')
                            $this->agendas_model->agendas_images_save($id_agenda, $nombre_imagen);
                        elseif ($tipo == 'muchas_fotos')
                            $this->agendas_model->agendas_images_save($id_agenda, $i);
                        elseif ($tipo == 'foto_mas')
                             $this->agendas_model->agendas_images_save($id_agenda, $cantidad_fotos);
                    }
                }
            }
        }
        redirect(base_url() . 'admin/agendas/agendas_imagenes_list/' . $id_agenda, 'refresh');
    }

    function agendas_imagenes_delete()
    {
        $id_agenda = $this->input->get('ID_Agenda');
        $ImagenAgenda = $this->input->get('ImagenAgenda');
        $this->agendas_model->delete_agendas_imagenespag($id_agenda, $ImagenAgenda);
        redirect(base_url() . 'admin/agendas/agendas_imagenes_list/' . $id_agenda, 'refresh');
    }

}

?>
