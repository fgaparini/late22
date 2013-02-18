<?php

class Paginas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/paginas_model');
        $this->load->config('avanbook_config');
        $this->load->library('gf');
    }
    
    function index()
    {
        $this->lists();
    }

    function lists()
    {
        $data['paginas_array'] = $this->paginas_model->paginas_list();
        $data['title'] = "Listado Páginas";
        $data['js'] = array('js/admin/paginas_lists');
        $data['view'] = 'admin/paginas/paginas_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function view($id_pagina = 0)
    {
        $query_rows = $this->paginas_model->paginas_find($id_pagina);
        $row = $query_rows->row();
        if ($query_rows->num_rows() == 0)
        {
            echo "esta pagina no existe";
        }
        else
        {
            $data['ID_Pagina'] = $row->ID_Pagina;
            $data['MetaTitulo'] = $row->MetaTitulo;
            $data['MetaDescripcion'] = $row->MetaDescripcion;
            $data['Keywords'] = $row->Keywords;
            $data['TituloContenido'] = $row->TituloContenido;
            $data['Contenido'] = $row->Contenido;
            $data['Subtitulo'] = $row->Subtitulo;
            $data['Url'] = $row->Url;
            $data['title'] = $row->TituloContenido;
            $data['keywords'] = $row->Keywords;
            $data['description'] = $row->MetaDescripcion;
            $data['js'] = array('js/admin/paginas_lists');
            $data['view'] = 'admin/paginas/paginas_view';
            $this->load->view('admin/templates/temp_menu', $data);
        }
    }

    function form($id_pagina = 0)
    {
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_Pagina'] = & $ID_Pagina;
        $data['MetaTitulo'] = & $MetaTitulo;
        $data['MetaDescripcion'] = & $MetaDescripcion;
        $data['Keywords'] = & $Keywords;
        $data['TituloContenido'] = & $TituloContenido;
        $data['Contenido'] = & $Contenido;
        $data['Subtitulo'] = & $Subtitulo;
        $data['Url'] = & $Url;
        $data['ID_TipoPagina'] = & $ID_TipoPagina;

        $query_rows = $this->paginas_model->paginas_find($id_pagina);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear Página';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar Página';
            $data['accion'] = 'editar';

            //Tabla paginas
            $ID_Pagina = $row->ID_Pagina;
            $MetaTitulo = $row->MetaTitulo;
            $MetaDescripcion = $row->MetaDescripcion;
            $Keywords = $row->Keywords;
            $TituloContenido = $row->TituloContenido;
            $Contenido = $row->Contenido;
            $Subtitulo = $row->Subtitulo;
            $Url = $row->Url;
            $ID_TipoPagina = $row->ID_TipoPagina;
        }
        $data['tipo_paginas_array'] = $this->paginas_model->tipo_pagina_list();
        $data['js'] = array('js/ckeditor/ckeditor');
        $data['view'] = "admin/paginas/paginas_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        $post_array = $this->input->post();
        $paginas_array = array(
            'MetaTitulo' => $post_array['MetaTitulo'],
            'MetaDescripcion' => $post_array['MetaDescripcion'],
            'Keywords' => $post_array['Keywords'],
            'TituloContenido' => $post_array['TituloContenido'],
            'Contenido' => $post_array['Contenido'],
            'Subtitulo' => $post_array['Subtitulo'],
            'Url' => $post_array['Url'],
            'ID_TipoPagina' => $post_array['ID_TipoPagina']
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->paginas_model->insert('paginas', $paginas_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->paginas_model->update($post_array['ID_Pagina'],$paginas_array,'ID_Pagina','paginas');
        }

        redirect(base_url() . 'admin/paginas/lists/', 'refresh');
    }
    
    function paginas_imagenes_list($id_pagina)
    {
         //$data['js'] = array('js/empresas_publicidad_list');
        $row = $this->paginas_model->paginas_find($id_pagina);
        $row = $row->row();
        $data['TituloContenido']=$row->TituloContenido;
        $data['ID_Pagina']=$row->ID_Pagina;
        $data['paginas_imagenes_array'] = $this->paginas_model->paginas_imagenes_list($id_pagina);
        $data['title'] = 'Paginas Imagenes';
        $data['js']=array('js/admin/paginas_imagenes_list','js/blockui-master/jquery.blockUI');
        $data['view'] = 'admin/paginas/paginas_imagenes_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
     //Funciones para guardar muchas imagenes
    function paginas_imagenes_save()
    {

        $id_pagina = $this->input->post('ID_Pagina');
        $tipo = $this->input->post('tipo');
        $nombre_imagen = $this->input->post('foto_numero');

        $cantidad_fotos = 0;

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {

                //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                if ($tipo == 'foto_comun')
                    $this->paginas_model->paginas_images_delete_nombre_imagen($id_pagina, $nombre_imagen);
                elseif ($tipo == 'muchas_fotos')
                    $this->paginas_model->paginas_images_delete($id_pagina);

                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {

                    $i++;

                    $cantidad_fotos = $this->paginas_model->paginas_images_count($id_pagina);
                    $cantidad_fotos = $cantidad_fotos + 1;

                    if ($cantidad_fotos <= 12)
                    {

                        if ($tipo == 'muchas_fotos')
                        {
                            $image_name = $this->config->item('upload_path_pag') . $id_pagina . "_" . $i . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $i . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $i . ".jpg";
                        }
                        elseif ($tipo == 'foto_comun')
                        {
                            $image_name = $this->config->item('upload_path_pag') . $id_pagina . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $nombre_imagen . ".jpg";
                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name = $this->config->item('upload_path_pag') . $id_pagina . "_" . $cantidad_fotos . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $cantidad_fotos . ".jpg";
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
                            $this->paginas_model->paginas_images_save($id_pagina, $nombre_imagen);
                        elseif ($tipo == 'muchas_fotos')
                            $this->paginas_model->paginas_images_save($id_pagina, $i);
                        elseif ($tipo == 'foto_mas')
                            $this->paginas_model->paginas_images_save($id_pagina, $cantidad_fotos);
                    }
                }
            }
        }
        redirect(base_url().'admin/paginas/paginas_imagenes_list/' . $id_pagina , 'refresh');
    }
    
     function paginas_imagenes_delete()
    {
        $id_pagina = $this->input->get('ID_Pagina');
        $ImagenPagina = $this->input->get('ImagenPagina');
        $this->paginas_model->delete_paginas_imagenespag($id_pagina,$ImagenPagina);
        redirect(base_url().'admin/paginas/paginas_imagenes_list/' . $id_pagina , 'refresh');
    }

}

?>
