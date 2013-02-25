<?php

class Reservas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/reservas_model');
        $this->load->model('admin/alojamientos_model');
        $this->load->model('husped_model');
        $this->load->model('cal_fecha');
        $this->load->library('pagination');
        $this->load->library('gf');
        
    }

    function index() {
        $this->lists();
    }

    function lists() {
        //Traigo Variables
        $order = $this->input->get('order');
        $campo = $this->input->get('campo');
        $valor = $this->input->get('valor');
        $start = $this->input->get('per_page');

        //Armado de URL
        $url = '?';

        if ($campo != '') {
            if ($valor != '')
                $url = $url . "campo=" . $campo . "&valor=" . $valor;
        }
        if ($order != '')
            $url = $url . "&order=" . $order;

        if ($start == "")
            $start = 0;

        //Configuracion paginado
        $result_number = 1;
        $config['base_url'] = base_url() . 'admin/reservas/lists/' . $url;

        //Contar la cantidad de resultados de la consulta a paginar
        $array_valores = $this->reservas_model->reservas_filtro($order, $campo, $valor, $start, $result_number);
        $config['total_rows'] = $array_valores['rows_count']; // le indico la cantidad total de resultado de la consulta sin limit ni order
        $config['per_page'] = $result_number;
        $config['num_links'] = 1;
        //iniciamos la paginacion
        $this->pagination->initialize($config);

        $data['reservas_array'] = $array_valores['rows_list'];
        $data['title'] = 'Reservas';
        $data['views'] = 'admin/reservas/reservas_list';

        //Envio los datos a la vista
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form() {
        $data['title'] = 'Crear Reserva';
        $data['css'] = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');
        $data['js'] = array(
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.position',
            'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
            'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/admin/reservas_form'
        );
        $data['view'] = 'admin/reservas/reservas_form';
        $data['paises_array'] = $this->alojamientos_model->paises();
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function buscar_disponibilidad() {
        $campo = $this->input->post('campo');
        $nombre_alojamiento = $this->input->post('nombre_alojamiento');
        $fecha_desde = $this->input->post('fecha_desde');
        $fecha_hasta = $this->input->post('fecha_hasta');
        $paxmax = $this->input->post('PaxMax');
        $pais = $this->input->post('Pais');
        $ciudad = $this->input->post('Ciudad');
        $provincia = $this->input->post('Provincia');
        $localidad = $this->input->post('Localidad');

        //Calcular la diferencia de dias entre las 2 fechas
        ///$cantidad_dias = $this->gf->cantidad_dias($fecha_desde, $fecha_hasta);
        //Saco el id del nombre
        if ($nombre_alojamiento != "") {
            $array_nombre_alojamiento = explode("-", $nombre_alojamiento);
            $id_alojamiento = $array_nombre_alojamiento[1];
        } else {
            $id_alojamiento = 0;
        }

        //Cambio el orde de la fecha para que mysql lo entienda
        $a_fecha_desde_mysql = explode("-", $fecha_desde);
        $a_fecha_hasta_mysql = explode("-", $fecha_hasta);

        $fecha_desde = $a_fecha_desde_mysql[2] . "-" . $a_fecha_desde_mysql[1] . "-" . $a_fecha_desde_mysql[0];
        $fecha_hasta = $a_fecha_hasta_mysql[2] . "-" . $a_fecha_hasta_mysql[1] . "-" . $a_fecha_hasta_mysql[0];

        //Consulta 
        $rows = $this->reservas_model->buscar_disponibilidad($campo, $id_alojamiento, $fecha_desde, $fecha_hasta, $paxmax, $pais, $provincia, $ciudad, $localidad);
        $data['alojamientos_array'] = $this->array_busqueda($rows, $fecha_desde, $fecha_hasta);

        $data['title'] = "Habitaciones Disponibles";
        $data['css'] = array('css/admin/reservas_alojamientos');
        $data['view'] = 'admin/reservas/reservas_alojamientos';
        $data['js'] = array('js/admin/reservas_alojamientos');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function buscar_disponibilidad_ii() {


        $cantidad_habitaciones = $this->input->post('cant_habitaciones');
        $id_alojamiento = $this->input->post('id_alojamiento');

        $subtotal = 0;
        $total = 0;
        for ($i = 1; $i <= $cantidad_habitaciones; $i++) {
            $nombre_hab[$i] = $this->input->post('nombre_hab_' . $i);
            $id_habitacion[$i] = $this->input->post('id_habitacion_' . $i);
            $cant_por_hab[$i] = $this->input->post('cantidad_por_habitacion_' . $i);
            $precio_hab[$i] = $this->input->post('precio_habitacion_' . $i);
            $subtotal = $cant_por_hab[$i] * $precio_hab[$i];
            $total = $subtotal + $total;
        }

        //Arrays varios valores de habitaciones
        $data['nombre_hab'] = $nombre_hab;
        $data['id_habitacion'] = $id_habitacion;
        $data['cant_por_hab'] = $cant_por_hab;
        $data['precio_hab'] = $precio_hab;

        //Metodos de pago
        //Buscar acepta senia, anticipado
        $MP = $this->reservas_model->select_mp_alo($id_alojamiento);
        $senia = $MP->Senia;
        $senia = ($senia * $total) / 100;
        $data['Senia'] = $MP->Senia;
        $data['senia_total'] = $senia;
        $data['Anticipado'] = $MP->Anticipado;
        $data['ComisionSenia'] = $MP->ComisionSenia;
        $data['AceptaSenia'] = $MP->AceptaSenia;
        $data['Comision'] = $MP->Comision;
        $data['MejorPrecio'] = $MP->MejorPrecio;
        //Info alojamiento
        $data['descripcion'] = $this->input->post('descripcion');
        $data['direccion'] = $this->input->post('direccion');
        $data['tipoalojamiento'] = $this->input->post('tipo_alojamiento');
        $data['localidad'] = $this->input->post('localidad');
        $data['checkin'] = $this->gf->html_mysql($this->input->post('checkin'));
        $data['checkout'] = $this->gf->html_mysql($this->input->post('checkout'));
        $data['id_alojamiento'] = $this->input->post('id_alojamiento');
        $data['nombre_alojamiento'] = $this->input->post('nombre_alojamiento');
        $data['cantidad_dias'] = $this->input->post('cant_dias');
        $data['cantidad_habitaciones'] = $cantidad_habitaciones;
        $data['title'] = "Reservar paso 2";
        $data['js'] = array('js/admin/reservas_alojamientos_ii');
        $data['view'] = 'admin/reservas/reservas_alojamientos_ii';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function buscar_disponibilidad_iii() {

        //Datos huesped
        $NombreHuesped=$this->input->post('huesped_nombre');
        $ApellidoHuesped=$this->input->post('ApellidoHuesped');
        $EmailHuesped=$this->input->post('EmailHuesped');
        $Contrasenia="";
        $TelefonoFijo=$this->input->post('huesped_telefono');
        $TelefonoCelular="";
        $DiasAcumulados="";
        $Ciudad=$this->input->post('huesped_ciudad');
        $Provincia=$this->input->post('huesped_provincia');
        $Observacion=$this->input->post('Observacion');
        
        //Datos reservas_Det
        $CheckIn = $this->input->post('checkin');
        $CheckOut = $this->input->post('checkout');
        $rows_fechas=$this->cal_fecha->list_fechas_rango($CheckIn,$CheckOut);
        $fe_array[];
        $fe_count=0;
        foreach($rows_fechas as $var)
        {
            $fe_count++;
            $fe_array[$fe_count]=$var;
        }
        
        
        echo "Como pagar : " . $this->input->post('metodo') . "<br>";
        echo "forma de pago : " . $this->input->post('metodo_pago') . "<br>";
        echo "tipo tarjeta : " . $this->input->post('tarjeta_tipo') . "<br>";
        echo "metodo de pago : " . $this->input->post('tarjeta_titular') . "<br>";
        echo "tarjeta numero : " . $this->input->post('tarjeta_numero') . "<br>";
        echo "tarjeta vencimiento : " . $this->input->post('tarjeta_vencimiento') . "<br>";
        echo "tarjeta codigo : " . $this->input->post('tarjeta_codigo') . "<br>";
        echo "huesped nombre : " . $this->input->post('huesped_nombre') . "<br>";
        echo "huesped correo : " . $this->input->post('huesped_correo') . "<br>";
        echo "huesped ciudad : " . $this->input->post('huesped_ciudad') . "<br>";
        echo "huesped apellido : " . $this->input->post('huesped_apellido') . "<br>";
        echo "huesped telefono : " . $this->input->post('huesped_telefono') . "<br>";
        echo "huesped provincia : " . $this->input->post('huesped_provincia') . "<br>";
        echo "huesped observaciones : " . $this->input->post('hueped_observaciones') . "<br>";
        echo "mail huesped : " . $this->input->post('envio_huesped') . "<br>";
        echo "mail alojamiento : " . $this->input->post('envio_alojamiento') . "<br>";
        echo "senia total : " . $this->input->post('senia_total') . "<br>";
        echo "senia total : " . $this->input->post('total') . "<br>";
        
        echo "cant_hab : " . $this->input->post('cant_hab') . "<br>";
        echo "nombre_hab : " . $this->input->post('nombre_hab') . "<br>";
        echo "precio_hab : " . $this->input->post('precio_hab') . "<br>";
        echo "nombre_alojamiento : " . $this->input->post('nombre_alojamiento') . "<br>";
        echo "tipo_alojamiento : " . $this->input->post('tipo_alojamiento') . "<br>";
        echo "localidad : " . $this->input->post('localidad') . "<br>";
        echo "direccion : " . $this->input->post('direccion') . "<br>";
        echo "checkin : " . $this->input->post('checkin') . "<br>";
        echo "checkout : " . $this->input->post('checkout') . "<br>";
        echo "descuento :" .$this->input->post('descuento')."<br>";
        
        $huesped_array = array(
            'NombreHuesped' => $NombreHuesped,
            'ApellidoHuesped' => $ApellidoHuesped,
            'EmailHuesped' => $EmailHuesped,
            'Contrasenia' => $Contrasenia,
            'TelefonoFijo' => $TelefonoFijo,
            'TelefonoCelular' => $TelefonoCelular,
            'DiasAcumulados' => $DiasAcumulados,
            'Ciudad' => $Ciudad,
            'Provincia' => $Provincia,
            'Observacion' => $Observacion
        );
        
        
        //Guardo y obtengo el ultimo id de la insercion
        $ID_Huesped = $this->huesped_model->insert($huesped_array);
        
        $reservas_dat=array(
            
            
            
        );
        
        
    }

    //Arma el array que luego se mostrar en la vista
    private function array_busqueda($rows_count = array(), $fecha_desde, $fecha_hasta) {
        $rows = $rows_count->result_array();
        $total = $rows_count->num_rows();
        $id_alojamiento = "";
        $id_habitacion = "";
        $count = 0;
        $final = array();
        $final_total = array();
        $habitaciones = array();
        $fechas = array();
        $fe = array('');
        $min_disp = 999;
        foreach ($rows as $var) {
            $count++;
            //Le asigno el primer valor a las "banderas" que me diran cuando cambio de habitacion y alojamiento
            if ($count == 1) {
                //Alojamiento
                $id_alojamiento = $var['ID_Alojamiento'];
                $nombre = $var['Nombre'];
                $descripcion = $var['Descripcion'];
                $tipoalojamiento = $var['TipoAlojamiento'];
                $pais = $var['CountryName'];
                $provincia = $var['SuName'];
                $ciudad = $var['Name'];
                $localidad = $var['Localidad'];
                $direccion = $var['Direccion'];
                //habitaciones
                $id_habitacion = $var['ID_Habitacion'];
                $nombrehab = $var['NombreHab'];
            }


            if ($id_habitacion != $var['ID_Habitacion'] or $count == $total) {// or $count == $total
                //Variables que van a estar en el foreach de habitacion
                krsort($fechas); //Ordena las fechas en forma inversa
                $hab = array(
                    'id_habitacion' => $id_habitacion,
                    'nombrehab' => $nombrehab,
                    'fechas' => $fechas
                );
                //Se una el array $hab en $habitaciones
                array_unshift($habitaciones, $hab);
                $fechas = array(); //Importante resetear la variable para que no se sigan acumulando
                if ($id_alojamiento != $var['ID_Alojamiento'] or $count == $total) {//or $count == $total
                    //Estas son las variables que se veran en el primer foreach el que tien datos mas generales del alojamiento
                    $final = array(
                        'id_alojamiento' => $id_alojamiento,
                        'nombre' => $nombre,
                        'descripcion' => $descripcion,
                        'tipoalojamiento' => $tipoalojamiento,
                        'pais' => $pais,
                        'provincia' => $provincia,
                        'ciudad' => $ciudad,
                        'localidad' => $localidad,
                        'habitacion' => $habitaciones,
                        'fecha_desde' => $fecha_desde,
                        'fecha_hasta' => $fecha_hasta,
                        'direccion' => $direccion
                    );
                    array_unshift($final_total, $final);
                    //Se resetean de nuevo las variables para volver a comenzar
                    $final = array();
                    $fechas = array();
                    $habitaciones = array();
                    $hab = array();
                    $fe = array();
                }
                //Cuando esta variable no es igual a la nueva y primera significa que cambio de habitacion
                //habitaciones
                $id_habitacion = $var['ID_Habitacion'];
                $nombrehab = $var['NombreHab'];
                $min_disp = 999;
            }
            //Cuando esta variable no es igual a la nueva y primera significa que cambio de alojamiento
            //Alojamiento
            $id_alojamiento = $var['ID_Alojamiento'];
            $nombre = $var['Nombre'];
            $descripcion = $var['Descripcion'];
            $tipoalojamiento = $var['TipoAlojamiento'];
            $pais = $var['CountryName'];
            $provincia = $var['SuName'];
            $ciudad = $var['Name'];
            $localidad = $var['Localidad'];

            if ($min_disp > $var['cant_disponible']) {
                $min_disp = $var['cant_disponible'];
            }

            //$min_disp=$var['cant_disponible'];

            $fe = array(
                'fecha' => $var['fecha'],
                'tarifa_normal' => $var['tarifa_normal'],
                'tarifa_oferta' => $var['tarifa_oferta'],
                'cant_disponible' => $var['cant_disponible'],
                'min_disponible' => $min_disp
            );

            //Aca en fechas solo hay una sola variable que se va uniendo con otras para saber de cada habitacion cuales son las fechas
            array_unshift($fechas, $fe);
        }

        return $final_total;
    }

    private function array_mostrar($final_total = array()) {

        foreach ($final_total as $key_alo => $info_alo) {
            echo "Nombre: " . $info_alo['nombre'] . "<br>";
            echo "Descripcion: " . $info_alo['descripcion'] . "<br>";
            echo "Tipo: " . $info_alo['tipoalojamiento'] . "<br>";
            echo "Lugar: " . $info_alo['pais'] . " > " . $info_alo['provincia'] . " > " . $info_alo['ciudad'] . " > " . $info_alo['localidad'] . "<br>";
            foreach ($info_alo['habitacion'] as $key_hab => $info_hab) {
                echo "Habitacion: " . $info_hab['nombrehab'] . "<br>";
                echo "Calendario: ";
                foreach ($info_hab['fechas'] as $key_fe => $info_fe) {
                    //pasar fecha
                    $array_f = explode('-', $info_fe['fecha']);
                    $fecha_chica = $array_f[2] . "/" . $array_f[1];
                    //fijarse si es oferta o no

                    if ($info_fe['tarifa_oferta'] > 0)
                        $precio = $info_fe['tarifa_oferta'] . "*";
                    else
                        $precio = $info_fe['tarifa_normal'];

                    echo "[" . $fecha_chica . "($" . $precio . ")-" . $info_fe['cant_disponible'] . "]";
                }
                echo "<br>";
            }
            echo "<br><br>";
        }
    }

}

?>
