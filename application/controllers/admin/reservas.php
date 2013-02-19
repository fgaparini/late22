<?php

class Reservas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/reservas_model');
        $this->load->model('admin/alojamientos_model');
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

        $checkin = $this->input->post('checkin');
        $checkout = $this->input->post('checkout');
        $id_alojamiento = $this->input->post('id_alojamiento');
        $cantidad_dias = $this->input->post('cant_dias');
        $cantidad_habitaciones = $this->input->post('cant_habitaciones');


        echo "checkin: " . $checkin . "<br>";
        echo "checkout: " . $checkout . "<br>";
        echo "id_alojamiento: " . $id_alojamiento . "<br>";
        echo "cantidad_dias: " . $cantidad_dias . "<br>";
        echo "cantidad_habitaciones: " . $cantidad_habitaciones . "<br>";

        for ($i = 1; $i <= $cantidad_habitaciones; $i++) {
            $id_habitacion = $this->input->post('id_habitacion_' . $i);
            $cant_por_hab = $this->input->post('cantidad_por_habitacion_' . $i);
            $precio_hab = $this->input->post('precio_habitacion_' . $i);
            echo "id_habitacion: " . $id_habitacion . "<br>";
            echo "cantidad_por_habitacion: " . $cant_por_hab . "<br>";
            echo "precio habitacion: " . $precio_hab . "<br>";
        }
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
                        'fecha_hasta' => $fecha_hasta
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
