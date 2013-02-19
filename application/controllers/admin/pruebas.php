<?php

class Pruebas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $query = "
                    
                    select ah.ID_Alojamiento as a, ah.ID_Habitacion as b, cal_calendario.fecha as c  
                    from 
                    cal_calendario 
                    inner join alojamientos_habitaciones as ah
                    on
                    cal_calendario.id_habitacion=ah.ID_Habitacion
                    where
                    fecha>'2013-01-01' and fecha<'2013-01-016'
                ";

        $rows_count = $this->db->query($query);
        $rows = $rows_count->result_array();
        $total = $rows_count->num_rows();
        $id_alojamiento = "";
        $id_habitacion = "";
        $count = 0;
        $final = array();
        $final_total = array();
        $alojamientos = array();
        $habitaciones = array();
        $fechas = array();
        foreach ($rows as $var)
        {
            $count++;
            if ($count == 1)
            {
                $id_alojamiento = $var['a'];
                $id_habitacion = $var['b'];
            }

            array_unshift($fechas, $var['c']);
            if ($id_habitacion != $var['b'] or $count == $total)
            {
                array_unshift($habitaciones, $var['b']);
                if ($id_alojamiento != $var['a'] or $count == $total)
                {

                    $final = array(
                        'id_aloamiento' => $var['a'],
                        'habitacion' => array(
                            'ids_habitaciones' => $habitaciones,
                            'fecha' => array(
                                'fechas' => $fechas
                            )
                        )
                    );

                    array_unshift($final_total, $final);

                    $final = array();
                    $fechas = array();
                    $habitaciones = array();
                }
            }


            $id_alojamiento = $var['a'];
            $id_habitacion = $var['b'];
        }

         foreach ($final_total as $var)
          {
          echo $var[0][0][0];

          } 

        print_r($final_total);
    }

    function prueba2()
    {
       $array = array('uno','dos','tres','cuatro','cinco','seis','siete','ocho');
       
       foreach($array as $var)
       {
           echo count($array)." ";
          
       }
       
    }

    function mostra()
    {
    }

}

?>
