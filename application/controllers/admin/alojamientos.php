<?php

class Alojamientos extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/alojamientos_model');
        $this->load->library('pagination');
        $this->load->helper('file');
        $this->load->config('avanbook_config');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

//##############################---Funciones Alojaminto------#############################
    //Listado Alojamientos
    function lists()
    {
        //Traigo Variables
        $order = $this->input->get('order');
        $campo = $this->input->get('campo');
        $valor = $this->input->get('valor');
        $start = $this->input->get('per_page');

        //Armado de URL
        $url = '?';

        if ($campo != '')
        {
            if ($valor != '')
                $url = $url . "campo=" . $campo . "&valor=" . $valor;
        }
        if ($order != '')
            $url = $url . "&order=" . $order;

        if ($start == "")
            $start = 0;

        //Configuracion paginado
        $result_number = 10;
        $config['base_url'] = base_url() . 'admin/alojamientos/lists/' . $url;

        //Contar la cantidad de resultados de la consulta a paginar
        $array_valores = $this->alojamientos_model->alojamientos_filtro($order, $campo, $valor, $start, $result_number);
        $config['total_rows'] = $array_valores['rows_count']; // le indico la cantidad total de resultado de la consulta sin limit ni order
        $config['per_page'] = $result_number;
        $config['num_links'] = 1;
        //iniciamos la paginacion
        $this->pagination->initialize($config);

        $data['alojamientos_array'] = $array_valores['rows_list'];
        $data['tipoalojamientos_array'] = $this->alojamientos_model->tipo_alojamientos();
        $data['title'] = 'Aojamientos';
        $data['css'] = array('css/admin/alojamientos_list');
        $data['view'] ='admin/alojamientos/alojamientos_list';

        //Envio los datos a la vista
        $this->load->view('admin/templates/temp_menu', $data);
    }

    //Formulario Alojamiento
    function form($id_alojamiento = 0)
    {
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla alojamientos
        $data['ID_Alojamiento'] = & $ID_Alojamiento;
        $data['ID_Categorias'] = & $ID_Categorias;
        $data['ID_TipoAlojamiento'] = & $ID_TipoAlojamiento;
        //Configuraciones agregadas al ultimo para posicionamiento
        $data['Url'] = & $Url;
        $data['DestaOrden'] = & $DestaOrden;
        $data['DestaHome'] = & $DestaHome;
        $data['Basico']= & $Basico;

        //Tabla informaciongeneral
        $data['ID_InformacionGeneral'] = & $ID_InformacionGeneral;
        $data['Nombre'] = & $Nombre;
        $data['Direccion'] = & $Direccion;
        $data['Telefono'] = & $Telefono;
        $data['Email'] = &  $Email;
        $data['WebSite'] = & $WebSite;
        $data['Responsable'] = & $Responsable;
        $data['Descripcion'] = & $Descripcion;
        $data['Coordenadas'] = & $Coordenadas;
        $data['Pais'] = & $Pais;
        $data['Provincia'] = & $Provincia;
        $data['Ciudad'] = & $Ciudad;
        $data['Localidad'] = & $Localidad;
        $data['Restaurant'] = & $Restaurant;
        $data['InformacionRestaurant'] = & $InformacionRestaurant;
        $data['Checkin'] = & $Checkin;
        $data['Checkout'] = & $Checkout;
        $data['PoliticaCancelacion'] = & $PoliticaCancelacion;
        $data['DiasPolitica'] = & $DiasPolitica;
        $data['TipoAcuerdo'] = & $TipoAcuerdo;

        //Tabla metodosdepago
        $data['ID_MP'] = & $ID_MP;
        $data['Senia'] = & $Senia;
        $data['GarantiaDebooking'] = & $GarantiaDebooking;
        $data['Anticipado'] = & $Anticipado;
        $data['ComisionSenia'] = & $ComisionSenia;
        $data['AceptaSenia'] = & $AceptaSenia;
        $data['Comision'] = & $Comision;
        $data['MejorPrecio'] = & $MejorPrecio;

        $query_rows = $this->alojamientos_model->alojamiento_find($id_alojamiento);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear Alojamiento';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar Alojamiento';
            $data['accion'] = 'editar';

            //Tabla alojamientos
            $ID_Alojamiento = $row->ID_Alojamiento;
            $ID_Categorias = $row->ID_Categorias;
            $ID_TipoAlojamiento = $row->ID_TipoAlojamiento;
            //Configuracion
            $Url = $row->Url;
            $DestaOrden = $row->DestaOrden;
            $DestaHome = $row->DestaHome;
            $TipoAcuerdo = $row->TipoAcuerdo;
            $Basico = $row->Basico;

            //Tabla informaciongeneral
            $ID_InformacionGeneral = $row->ID_InformacionGeneral;
            $Nombre = $row->Nombre;
            $Direccion = $row->Direccion;
            $Telefono = $row->Telefono;
            $Email = $row->Email;
            $WebSite = $row->WebSite;
            $Responsable = $row->Responsable;
            $Descripcion = $row->Descripcion;
            $Coordenadas = $row->Coordenadas;
            $Pais = $row->Pais;
            $Provincia = $row->Provincia;
            $Ciudad = $row->Ciudad;
            $Localidad = $row->Localidad;
            $Restaurant = $row->Restaurant;
            $InformacionRestaurant = $row->InformacionRestaurant;
            $Checkin = $row->Checkin;
            $Checkout = $row->Checkout;
            $PoliticaCancelacion = $row->PoliticaCancelacion;
            $DiasPolitica = $row->DiasPolitica;

            //Tabla metodosdepago
            $ID_MP = $row->ID_MP;
            $Senia = $row->Senia;
            $GarantiaDebooking = $row->GarantiaDebooking;
            $Anticipado = $row->Anticipado;
            $ComisionSenia = $row->ComisionSenia;
            $AceptaSenia = $row->AceptaSenia;
            $Comision = $row->Comision;
            $MejorPrecio = $row->MejorPrecio;
        }

        //Array segun lugar para mostrar
        $data['paises_array'] = $this->alojamientos_model->paises();
        $data['provincias_array'] = $this->alojamientos_model->provincias($Pais);
        $data['ciudades_array'] = $this->alojamientos_model->ciudades($Pais, $Provincia);
        $data['localidades_array'] = $this->alojamientos_model->localidades($Pais, $Provincia, $Ciudad);
        $data['tipoalojamientos_array'] = $this->alojamientos_model->tipo_alojamientos();
        $data['categorias_array'] = $this->alojamientos_model->categorias();
        $data['paises_array'] = $this->alojamientos_model->paises();
        $data['js'] = array('js/admin/alojamientos_form');
        $data['css'] = array('css/admin/alojamientos_list');
        $data['view'] = 'admin/alojamientos/alojamientos_form';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    //Mostrar Alojamiento
    function form_view($id_alojamiento = 0)
    {
        $data['p_a'] = $this->input->get('pestania');
        $data['title'] = "Mostrar Alojamiento";
        $data['menu_activo'] = 'info';
        $data['info_array'] = $this->alojamientos_model->info_gral_view($id_alojamiento);
        $data['servicios_array'] = $this->alojamientos_model->info_servicios($id_alojamiento);
        $data['publicidad_array'] = $this->alojamientos_model->info_publicidad($id_alojamiento);
        $data['fotos_array'] = $this->alojamientos_model->fotos_list($id_alojamiento);
        $data['clientes_array'] = $this->alojamientos_model->clientes_list($id_alojamiento);
        $data['habitaciones_array'] = $this->alojamientos_model->habitaciones_list($id_alojamiento);
        $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
        $data['js'] = array(
            'js/fancybox/jquery.mousewheel-3.0.4.pack',
            'js/fancybox/jquery.fancybox-1.3.4.pack',
            'js/blockui-master/jquery.blockUI',
            'js/admin/alojamientos_view'
        );
        $data['css'] = array('css/admin/alojamientos_list', 'js/fancybox/jquery.fancybox-1.3.4');
        $data['view'] ='admin/alojamientos/alojamientos_view';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    //Guardar Formulario alojamiento
    function save()
    {
        $accion = $this->input->post('accion');
        $ID_Alojamiento = $this->input->post('ID_Alojamiento');
        $ID_InformacionGeneral = $this->input->post('ID_InformacionGeneral');
        $ID_MP = $this->input->post('ID_MP');
        
        $data_info_gral = array(
            'Nombre' => $this->input->post('Nombre'),
            'Direccion' => $this->input->post('Direccion'),
            'Telefono' => $this->input->post('Telefono'),
            'Email' => $this->input->post('Email'),
            'WebSite' => $this->input->post('WebSite'),
            'Responsable' => $this->input->post('Responsable'),
            'Descripcion' => $this->input->post('Descripcion'),
            'Coordenadas' => $this->input->post('Coordenadas'),
            'Localidad' => $this->input->post('Localidad'),
            'Ciudad' => $this->input->post('Ciudad'),
            'Provincia' => $this->input->post('Provincia'),
            'Pais' => $this->input->post('Pais'),
            'Restaurant' => $this->input->post('Restaurant'),
            'InformacionRestaurant' => $this->input->post('InformacionRestaurant'),
            'InformacionHabitaciones' => $this->input->post('InformacionHabitaciones'),
            'Checkin' => $this->input->post('Checkin'),
            'Checkout' => $this->input->post('Checkout'),
            'PoliticaCancelacion' => $this->input->post('PoliticaCancelacion'),
            'DiasPolitica' => $this->input->post('DiasPolitica')
        );

        $data_metodo_pago = array(
            'Senia' => $this->input->post('Senia'),
            'GarantiaDebooking' => $this->input->post('GarantiaDebooking'),
            'Anticipado' => $this->input->post('Anticipado'),
            'ComisionSenia' => $this->input->post('ComisionSenia'),
            'AceptaSenia' => $this->input->post('AceptaSenia'),
            'Comision' => $this->input->post('Comision'),
            'MejorPrecio' => $this->input->post('MejorPrecio')
        );

        if ($accion == 'crear')
        {
            $id_data_info_gral = $this->alojamientos_model->insert('informaciongeneral', $data_info_gral);
            $id_data_metodo_pago = $this->alojamientos_model->insert('metododepago', $data_metodo_pago);

            $data_alojamientos = array(
                'ID_InformacionGeneral' => $id_data_info_gral,
                'ID_Imagenes' => 0, //no se sabe
                'ID_TipoAlojamiento' => $this->input->post('ID_TipoAlojamiento'),
                'ID_Categorias' => $this->input->post('ID_Categorias'),
                'Url' => $this->input->post('Url'),
                'TipoAcurdo' => $this->input->post('TipoAcuerdo'),
                'DestaOrden' => $this->input->post('DestaOrden'),
                'DestaHome' => $this->input->post('DestaHome'),
                'ID_MP' => $id_data_metodo_pago,
                'ID_Modulos' => '0', //no se sabe
                'Votos' => '0', //no se sabe
                'Activo' => 'A', //no se sabe
                'Basico' => $this->input->post('Basico')
            );

            $id_data_alojamientos = $this->alojamientos_model->insert('alojamientos', $data_alojamientos);
            redirect('admin/alojamientos/form_view/' . $id_data_alojamientos . "/?pestania=info", 'refresh');
        }
        elseif ($accion == 'editar')
        {
            $data_alojamientos = array(
                'ID_InformacionGeneral' => $this->input->post('ID_InformacionGeneral'),
                'ID_Imagenes' => 0, //no se sabe
                'ID_TipoAlojamiento' => $this->input->post('ID_TipoAlojamiento'),
                'ID_Categorias' => $this->input->post('ID_Categorias'),
                'Url' => $this->input->post('Url'),
                'TipoAcuerdo' => $this->input->post('TipoAcuerdo'),
                'DestaOrden' => $this->input->post('DestaOrden'),
                'DestaHome' => $this->input->post('DestaHome'),
                'ID_MP' => $this->input->post('ID_MP'),
                'ID_Modulos' => '0', //no se sabe
                'Votos' => '0', //no se sabe
                'Activo' => 'A', //no se sabe
                'Basico' => $this->input->post('Basico')
            );

            $this->alojamientos_model->update($ID_MP, $data_metodo_pago, 'ID_MP', 'metododepago');
            $this->alojamientos_model->update($ID_InformacionGeneral, $data_info_gral, 'ID_InformacionGeneral', 'informaciongeneral');
            $this->alojamientos_model->update($ID_Alojamiento, $data_alojamientos, 'ID_Alojamiento', 'alojamientos');

            redirect('admin/alojamientos/form_view/' . $ID_Alojamiento . "/?pestania=info", 'refresh');
        }
    }

#######################################------Funciones Clientes-------##################################
    //Formulario clientes

    function alojamientos_clientes_form($id_alojamiento = 0)
    {
        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);

        //Comprobar que existe el alojamiento sino tirar error
        if ($alojamiento_nombre != null)
        {
            //Variables tabla clientes
            $data['ID_Cliente'] = & $ID_Cliente;
            $data['Usuario'] = & $Usuario;
            $data['Clave'] = & $Clave;
            $data['NombreCliente'] = & $NombreCliente;
            $data['ApellidoCliente'] = & $ApellidoCliente;
            $data['EmailCliente'] = & $EmailCliente;
            $data['Cargo'] = & $Cargo;

            //Traigo el ID_Cliente deseado
            $ID_Cliente = $this->input->get('ID_Cliente');
            if ($ID_Cliente == "")
                $ID_Cliente = 0;

            $query_rows = $this->alojamientos_model->clientes_find($ID_Cliente);
            $row = $query_rows->row();

            if ($query_rows->num_rows() == 0)
            {
                $data['title'] = 'Nuevo Cliente';
                $data['accion'] = 'crear';
            }
            else
            {
                $data['title'] = 'Editar Cliente';
                $data['accion'] = 'editar';
                $ID_Cliente = $row->ID_Cliente;
                $Usuario = $row->Usuario;
                $Clave = $row->Clave;
                $NombreCliente = $row->NombreCliente;
                $ApellidoCliente = $row->ApellidoCliente;
                $EmailCliente = $row->EmailCliente;
                $Cargo = $row->Cargo;
            }
            //Menu sidebar que estara activo
            $data['menu_activo'] = 'clientes';
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            $data['nombre_alojamiento'] = $alojamiento_nombre;
            $data['css'] = array('css/admin/alojamientos_list');
            $data['view'] = 'admin/alojamientos/alojamientos_clientes_form';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    //Guardar Cliente
    function alojamientos_clientes_save()
    {
        $clientes_post = $this->input->post();

        $clientes_array = array(
            'Usuario' => $clientes_post['Usuario'],
            'Clave' => $clientes_post['Clave'],
            'NombreCliente' => $clientes_post['NombreCliente'],
            'ApellidoCliente' => $clientes_post['ApellidoCliente'],
            'EmailCliente' => $clientes_post['EmailCliente'],
            'Cargo' => $clientes_post['Cargo']
        );

        if ($clientes_post['accion'] == 'crear')
        {
            $id_cliente = $this->alojamientos_model->insert('clientes', $clientes_array);
            $alojamientos_clientes_array = array(
                'ID_Alojamiento' => $clientes_post['ID_Alojamiento'],
                'ID_Cliente' => $id_cliente
            );

            $this->alojamientos_model->insert('alojamientos_clientes', $alojamientos_clientes_array);
        }
        elseif ($clientes_post['accion'] == 'editar')
        {

            $this->alojamientos_model->update($clientes_post['ID_Cliente'], $clientes_array, 'ID_Cliente', 'clientes');
        }

        redirect('admin/alojamientos/form_view/' . $clientes_post['ID_Alojamiento'] . "/?pestania=clientes", 'refresh');
    }

#####################################################--------Funciones tabla servicios---------#############################################
    //Formulario Servicios

    function alojamientos_servicios_form($id_alojamiento = 0)
    {

        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);
        //Comprobar que existe el alojamiento sino tirar error
        if ($alojamiento_nombre != null)
        {
            $data['menu_activo'] = 'servicios';
            $data['nombre_alojamiento'] = $alojamiento_nombre;
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            //$data['servicios_array'] = $this->alojamientos_model->servicios_select();

            $servicios_total = $this->alojamientos_model->servicios_select();
            $servicios_alojamiento = $this->alojamientos_model->alojamientos_servicios_select($id_alojamiento);
            //Meto una combinacion de esos array en un array nuevo
            $data['servicios_array'] = $this->alojamientos_servicios_array_final($servicios_total, $servicios_alojamiento);
            $data['title'] = 'Nuevo Servicio';
            $data['css'] = array('css/admin/alojamientos_list');
            $data['view'] = 'admin/alojamientos/alojamientos_servicios_form';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    //Guardar Servicios
    function servicios_save()
    {
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $post_array = $this->input->post();

        //Saco el ultimo elemento del array post que es el id_alojamiento;
        array_pop($post_array);

        //Elimino todos los servicios que existen en este alojamiento,
        //Para que no de conflicto al insertarlo de nuevo (se borra y se agregan los ya ingresados mas los nuevos)
        $this->alojamientos_model->delete_alojamientos_servicios($id_alojamiento);

        $array_comas = "";
        foreach ($post_array as $var)
        {
            $this->alojamientos_model->insert_alojamientos_servicios($id_alojamiento, $var);
        }

        redirect('admin/alojamientos/form_view/' . $id_alojamiento . "/?pestania=servicios");
    }

##################################################------------ Funciones Imagenes--------------####################################3
    //Formulario imagenes para agregar muchas fotos

    function alojamientos_imagenes_form($id_alojamiento)
    {
        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);
        //Comprobar que existe el alojamiento sino tirar error
        if ($alojamiento_nombre != null)
        {
            $data['menu_activo'] = 'imagenes';
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            $data['nombre_alojamiento'] = $alojamiento_nombre;
            $data['title'] = 'Nuevas Imagenes';
            $data['js'] = array('js/admin/alojamientos_images_form');
            $data['view'] = 'admin/alojamientos/alojamientos_imagenes_form';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    //Funciones para guardar muchas imagenes
    function alojamientos_imagenes_save()
    {

        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $tipo = $this->input->post('tipo');
        $nombre_imagen = $this->input->post('foto_numero');

        $cantidad_fotos = 0;

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {

                //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                if ($tipo == 'foto_comun')
                    $this->alojamientos_model->images_delete_nombre_imagen($id_alojamiento, $nombre_imagen);
                elseif ($tipo == 'muchas_fotos')
                    $this->alojamientos_model->images_delete($id_alojamiento);

                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {

                    $i++;

                    $cantidad_fotos = $this->alojamientos_model->images_count($id_alojamiento);
                    $cantidad_fotos = $cantidad_fotos + 1;

                    if ($cantidad_fotos <= 12)
                    {

                        if ($tipo == 'muchas_fotos')
                        {
                            $image_name = $this->config->item('upload_path') . $id_alojamiento . "_" . $i . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $i . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $i . ".jpg";
                        }
                        elseif ($tipo == 'foto_comun')
                        {
                            $image_name = $this->config->item('upload_path') . $id_alojamiento . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $nombre_imagen . ".jpg";
                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name = $this->config->item('upload_path') . $id_alojamiento . "_" . $cantidad_fotos . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $cantidad_fotos . ".jpg";
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
                            $this->alojamientos_model->images_save($id_alojamiento, $nombre_imagen);
                        elseif ($tipo == 'muchas_fotos')
                            $this->alojamientos_model->images_save($id_alojamiento, $i);
                        elseif ($tipo == 'foto_mas')
                            $this->alojamientos_model->images_save($id_alojamiento, $cantidad_fotos);
                    }
                }
            }
        }
        redirect('admin/alojamientos/form_view/' . $id_alojamiento . "/?pestania=imagenes", 'refresh');
    }

//#########################----------- Funciones Habitacion-------------#####################################    


    function alojamientos_habitaciones_form($id_alojamiento)
    {
        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);

        //Comprobar que existe la habitacion sino tirar error
        if ($alojamiento_nombre != null)
        {
            //Variables tabla habitacion
            $data['ID_Habitacion'] = & $ID_Habitacion;
            $data['NombreHab'] = & $NombreHab;
            $data['DescripcionHab'] = & $DescripcionHab;
            $data['ID_Desayuno'] = & $ID_Desayuno;
            $data['PaxMax'] = & $PaxMax;
            $data['PaxAdulto'] = & $PaxAdulto;
            $data['PaxNinio'] = & $PaxNinio;
            $data['ID_TipoHabitacion'] = & $ID_TipoHabitacion;

            //Traigo el ID_Cliente deseado
            $ID_Habitacion = $this->input->get('ID_Habitacion');
            if ($ID_Habitacion == "")
                $ID_Habitacion = 0;

            $query_rows = $this->alojamientos_model->habitaciones_find($ID_Habitacion);
            $row = $query_rows->row();

            if ($query_rows->num_rows() == 0)
            {
                $data['title'] = 'Nueva Habitación';
                $data['accion'] = 'crear';
            }
            else
            {
                $data['title'] = 'Editar Habitación';
                $data['accion'] = 'editar';
                $ID_Habitacion = $row->ID_Habitacion;
                $NombreHab = $row->NombreHab;
                $DescripcionHab = $row->DescripcionHab;
                $ID_Desayuno = $row->ID_Desayuno;
                $PaxMax = $row->PaxMax;
                $PaxAdulto = $row->PaxAdulto;
                $PaxNinio = $row->PaxNinio;
                $ID_TipoHabitacion = $row->ID_TipoHabitacion;
            }

            $data['menu_activo'] = 'habitaciones';
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            $data['nombre_alojamiento'] = $alojamiento_nombre;
            $data['tipo_alojamientos_array'] = $this->alojamientos_model->tipo_habitaciones_list();
            $data['tipo_desayunos_array'] = $this->alojamientos_model->tipo_desayunos_list();
            $data['view'] = 'admin/alojamientos/alojamientos_habitaciones_form';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    function alojamientos_habitaciones_save()
    {
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $post_array = $this->input->post();


        $habitaciones_array = array(
            'NombreHab' => $post_array['NombreHab'],
            'DescripcionHab' => $post_array['DescripcionHab'],
            'ID_Desayuno' => $post_array['ID_Desayuno'],
            'PaxMax' => $post_array['PaxMax'],
            'PaxAdulto' => $post_array['PaxAdulto'],
            'PaxNinio' => $post_array['PaxNinio'],
            'ID_TipoHabitacion' => $post_array['ID_TipoHabitacion']
        );

        if ($post_array['accion'] == 'crear')
        {
            $id_habitacion = $this->alojamientos_model->insert('habitaciones', $habitaciones_array);

            $alojamientos_habitaciones_array = array(
                'ID_Alojamiento' => $id_alojamiento,
                'ID_Habitacion' => $id_habitacion
            );
            $this->alojamientos_model->insert('alojamientos_habitaciones', $alojamientos_habitaciones_array);

            //-----------------------------------------Agregar fotos-----------------------------
            if (isset($_FILES['filesToUpload']['tmp_name']))
            {
                if (count($_FILES['filesToUpload']['tmp_name']))
                {

                    //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                    if ($tipo == 'foto_comun')
                        $this->alojamientos_model->images_delete_nombre_imagen($id_alojamiento, $nombre_imagen);
                    elseif ($tipo == 'muchas_fotos')
                        $this->alojamientos_model->images_delete($id_alojamiento);

                    $i = 0;
                    foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                    {

                        $i++;

                        $cantidad_fotos = $this->alojamientos_model->images_count($id_alojamiento);
                        $cantidad_fotos = $cantidad_fotos + 1;

                        if ($cantidad_fotos <= 12)
                        {

                            if ($tipo == 'muchas_fotos')
                            {
                                $image_name = $this->config->item('upload_path') . $id_alojamiento . "_" . $i . ".jpg";
                                $thumb_grande = $this->config->item('upload_path_hab_thumb') . $id_alojamiento . "_" . $i . "_p" . ".jpg";
                                $thumb_chica = $this->config->item('upload_path_hab_thumb') . $id_alojamiento . "_" . $i . ".jpg";
                            }
                            elseif ($tipo == 'foto_comun')
                            {
                                $image_name = $this->config->item('upload_path') . $id_alojamiento . "_" . $nombre_imagen . ".jpg";
                                $thumb_grande = $this->config->item('upload_path_hab_thumb') . $id_alojamiento . "_" . $nombre_imagen . "_p" . ".jpg";
                                $thumb_chica = $this->config->item('upload_path_hab_thumb') . $id_alojamiento . "_" . $nombre_imagen . ".jpg";
                            }
                            elseif ($tipo == 'foto_mas')
                            {
                                $image_name = $this->config->item('upload_path') . $id_alojamiento . "_" . $cantidad_fotos . ".jpg";
                                $thumb_grande = $this->config->item('upload_path_hab_thumb') . $id_alojamiento . "_" . $cantidad_fotos . "_p" . ".jpg";
                                $thumb_chica = $this->config->item('upload_path_hab_thumb') . $id_alojamiento . "_" . $cantidad_fotos . ".jpg";
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
                                $this->alojamientos_model->images_save($id_alojamiento, $nombre_imagen);
                            elseif ($tipo == 'muchas_fotos')
                                $this->alojamientos_model->images_save($id_alojamiento, $i);
                            elseif ($tipo == 'foto_mas')
                                $this->alojamientos_model->images_save($id_alojamiento, $cantidad_fotos);
                        }
                    }
                }
            }
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->alojamientos_model->update($post_array['ID_Habitacion'], $habitaciones_array, 'ID_Habitacion', 'habitaciones');
        }

        redirect('admin/alojamientos/form_view/' . $id_alojamiento . "/?pestania=habitaciones", 'refresh');
    }

    function alojamientos_habitaciones_imagenes_save()
    {
        $id_habitacion = $this->input->post('ID_Habitacion');
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $tipo = $this->input->post('tipo');
        $nombre_imagen = $this->input->post('foto_numero');

        $cantidad_fotos = 0;

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {

                //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                if ($tipo == 'foto_comun')
                    $this->alojamientos_model->imageshab_delete_nombre_imagen($id_habitacion, $nombre_imagen);
                elseif ($tipo == 'muchas_fotos')
                    $this->alojamientos_model->imageshab_delete($id_habitacion);

                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {
                    $i++;
                    $cantidad_fotos = $this->alojamientos_model->imageshab_count($id_habitacion);
                    $cantidad_fotos = $cantidad_fotos + 1;
                    if ($cantidad_fotos <= 12)
                    {
                        if ($tipo == 'muchas_fotos')
                        {
                            $image_name = $this->config->item('upload_path_hab') . $id_habitacion . "_" . $i . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_hab_thumb') . $id_habitacion . "_" . $i . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_hab_thumb') . $id_habitacion . "_" . $i . ".jpg";
                        }
                        elseif ($tipo == 'foto_comun')
                        {
                            $image_name = $this->config->item('upload_path_hab') . $id_habitacion . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_hab_thumb') . $id_habitacion . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_hab_thumb') . $id_habitacion . "_" . $nombre_imagen . ".jpg";
                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name = $this->config->item('upload_path_hab') . $id_habitacion . "_" . $cantidad_fotos . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_hab_thumb') . $id_habitacion . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica = $this->config->item('upload_path_hab_thumb') . $id_habitacion . "_" . $cantidad_fotos . ".jpg";
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
                            $this->alojamientos_model->imageshab_save($id_habitacion, $nombre_imagen);
                        elseif ($tipo == 'muchas_fotos')
                            $this->alojamientos_model->imageshab_save($id_habitacion, $i);
                        elseif ($tipo == 'foto_mas')
                            $this->alojamientos_model->imageshab_save($id_habitacion, $cantidad_fotos);
                    }
                }
            }
        }
        redirect('admin/alojamientos/form_view/' . $id_alojamiento . "/?pestania=habitaciones", 'refresh');
    }

    function alojamientos_habitaciones_list($id_alojamiento)
    {
        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);
        $id_habitacion = $this->input->get('ID_Habitacion');

        //Comprobar que existe el alojamiento sino tirar error
        if ($alojamiento_nombre != null)
        {
            $data['id_habitacion'] = $id_habitacion;
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            $data['nombre_alojamiento'] = $alojamiento_nombre;
            $data['imageneshab_array'] = $this->alojamientos_model->imageneshab_list($id_habitacion);
            $data['menu_activo'] = '';
            $data['title'] = 'Imagenes Habitaciones';
            $data['css'] = array('js/fancybox/jquery.fancybox-1.3.4');
            $data['js'] = array(
                'js/blockui-master/jquery.blockUI',
                'js/fancybox/jquery.mousewheel-3.0.4.pack',
                'js/fancybox/jquery.fancybox-1.3.4.pack',
                'js/admin/alojamientos_imageneshab_list'
            );
            $data['view'] = 'admin/alojamientos/alojamientos_imageneshab_list';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    function alojamientos_calendario_hab($id_alojamiento)
    {
        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);
        $id_habitacion = $this->input->get('ID_Habitacion');

        //Comprobar que existe el alojamiento sino tirar error
        if ($alojamiento_nombre != null)
        {
            $data['id_habitacion'] = $id_habitacion;
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            $data['nombre_alojamiento'] = $alojamiento_nombre;

            $data['menu_activo'] = '';
            $data['title'] = 'Imagenes Habitaciones';
            $data['css'] = array('css/admin/alojamientos_calendario_hab');
            $data['js'] = array('js/admin/alojamientos_calendario_hab');
            $data['view'] = 'admin/alojamientos/alojamientos_calendario_hab';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

#####################################-----------------------------Funciones Ubicacion-------------------------####################################    

    function alojamientos_ubicacion_form($id_alojamiento = 0)
    {
        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);

        //Comprobar que existe la habitacion sino tirar error
        if ($alojamiento_nombre != null)
        {
            //Variables tabla habitacion
            $data['Coordenadas'] = $alojamiento_nombre->Coordenadas;
            $data['Direccion'] = $alojamiento_nombre->Direccion;
            $data['title'] = 'Nueva Ubicación';
            $data['menu_activo'] = 'ubicacion';
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            $data['nombre_alojamiento'] = $alojamiento_nombre;
            $data['view'] = 'admin/alojamientos/alojamientos_ubicacion_form';
            $data['js'] = array('js/admin/alojamientos_ubicacion_form');
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    function alojamientos_ubicacion_save()
    {
        $post_array = $this->input->post();
        $this->alojamientos_model->alojamiento_ubicacion_update($post_array['ID_Alojamiento'], $post_array['Coordenadas']);
        redirect('admin/alojamientos/form_view/' . $post_array['ID_Alojamiento'] . "/?pestania=ubicacion", 'refresh');
    }

#####################################################--------Funciones tabla publicidad---------#############################################

    function alojamientos_publicidad_form($id_alojamiento = 0)
    {

        $alojamiento_nombre = $this->alojamientos_model->alojamientos_info_gral($id_alojamiento);
        //Comprobar que existe el alojamiento sino tirar error
        if ($alojamiento_nombre != null)
        {
            $data['menu_activo'] = 'publicidad';
            $data['nombre_alojamiento'] = $alojamiento_nombre;
            $data['alojamientos_menu_sidebar'] = $this->config->item('alojamientos_menu_sidebar');
            $data['publicidad_array'] = $this->alojamientos_model->publicidad_select();
            $data['js'] = array('js/admin/alojamientos_publicidad_form');
            $data['title'] = 'Nueva publicidad';
            $data['css'] = array('css/admin/alojamientos_list');
            $data['view'] = 'admin/alojamientos/alojamientos_publicidad_form';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    //Guardar Servicios
    function alojamientos_publicidad_save()
    {
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $post_array = $this->input->post();


        //Saco el ultimo elemento del array post que es el id_alojamiento;
        array_pop($post_array);

        //Busco el precio en tipopublicidad
        foreach ($post_array as $var)
        {
            $precio = $this->alojamientos_model->find_precio_tipo_publicidad($var['ID_TipoPublicidad']);

            $array_publicidad = array(
                'ID_TipoPublicidad' => $var,
                'Precio' => $precio
            );

            $id_publicidad = $this->alojamientos_model->insert('publicidad', $array_publicidad);

            $array_alojamientos_publicidad = array(
                'ID_Alojamiento' => $id_alojamiento,
                'ID_Publicidad' => $id_publicidad
            );

            $this->alojamientos_model->insert('alojamientos_publicidad', $array_alojamientos_publicidad);
        }

        redirect('admin/alojamientos/form_view/' . $id_alojamiento . "/?pestania=publicidad");
    }

    function alojamientos_publicidad_estado($id_alojamiento)
    {
        $id_publicidad = $this->input->get('ID_Publicidad');
        $this->alojamientos_model->update_estado_publicidad($id_publicidad);
        redirect('admin/alojamientos/form_view/' . $id_alojamiento . "/?pestania=publicidad");
    }

    function alojamientos_publicidad_renovar($id_alojamiento)
    {
        $id_publicidad = $this->input->get('ID_Publicidad');
        $row = $this->alojamientos_model->find_precio_publicidad($id_publicidad);
        $this->alojamientos_model->update_estado_publicidad_simple($id_publicidad, 0);
        $array_publicidad = array(
            'ID_TipoPublicidad' => $row->ID_TipoPublicidad,
            'Precio' => $row->Precio
        );

        $id_publicidad = $this->alojamientos_model->insert('publicidad', $array_publicidad);

        $array_alojamientos_publicidad = array(
            'ID_Alojamiento' => $id_alojamiento,
            'ID_Publicidad' => $id_publicidad
        );

        $this->alojamientos_model->insert('alojamientos_publicidad', $array_alojamientos_publicidad);

        redirect('admin/alojamientos/form_view/' . $id_alojamiento . "/?pestania=publicidad");
    }
    
    

    //###########################################################----Funciones Privadas---------##########################
    private function alojamientos_servicios_array_final($servicios_total = array(), $servicios_alojamiento = array())
    {

        //Inicializo la variable que sera a donde se metan todos los array
        $a[] = "";
        //La variable que contrendra cuales son los check chekeados
        $checked = "";
        //Un contador para pugar el primer elemento cosa que el array tenga el primer elemento
        //para luego pugar los demas
        $count = 0;
        foreach ($servicios_total as $var0)
        {
            $count++;
            foreach ($servicios_alojamiento as $var1)
            {
                if ($var0['Servicio'] != $var1['Servicio'])
                {
                    $checked = "";
                }
                else
                {
                    $checked = "checked='checked'";
                    break; //En caso de ser iguales se hace un brack para que no se sobrescriba la variable
                }
            }

            $b = array(
                'Servicio' => $var0['Servicio'],
                'ID_Servicio' => $var0['ID_Servicio'],
                'checked' => $checked
            );

            if ($count == 1)
            //Pongo el primer elemento del array
                $a[0] = $b;
            else
            //Se puja el array
                array_push($a, $b);
        }

        return $a;
    }

}

?>
