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
        $array = array('uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho');

        foreach ($array as $var)
        {
            echo count($array) . " ";
        }
    }

    function mostrar()
    {
        $general = array(
            $a1 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '3',
        'fecha' => '01-01'
            ),
            $a2 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '3',
        'fecha' => '02-01'
            ),
            $a3 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '3',
        'fecha' => '03-01'
            ),
            //
            $a4 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '4',
        'fecha' => '01-01'
            ),
            $a5 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '4',
        'fecha' => '02-01'
            ),
            $a6 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '4',
        'fecha' => '03-01'
            ),
            $a7 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '10',
        'fecha' => '01-01'
            ),
            $a8 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '10',
        'fecha' => '02-01'
            ),
            $a9 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '10',
        'fecha' => '03-01'
            ),
            $a10 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '12',
        'fecha' => '01-01'
            ),
            $a11 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '12',
        'fecha' => '02-01'
            ),
            $a12 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '12',
        'fecha' => '03-01'
            ),
            //
            $a13 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '15',
        'fecha' => '01-01'
            ),
            $a14 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '15',
        'fecha' => '02-01'
            ),
            $a15 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '15',
        'fecha' => '03-01'
            ),
            $a16 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '16',
        'fecha' => '01-01'
            ),
            $a17 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '16',
        'fecha' => '02-01'
            ),
            $a18 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '16',
        'fecha' => '03-01'
            ),
            //
            $a19 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '20',
        'fecha' => '01-01'
            ),
            $a20 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '20',
        'fecha' => '02-01'
            ),
            $a21 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '20',
        'fecha' => '03-01'
            ),
            $a22 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '24',
        'fecha' => '01-01'
            ),
            $a23 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '24',
        'fecha' => '02-01'
            ),
            $a24 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '24',
        'fecha' => '03-01'
            ),
        );


        $i = 0;
        $z=0;
        $y=0;
        $id_alo = "";
        $id_hab = "";
        $id_fecha = "";
        $id_alo_array = "";
        foreach ($general as $var)
        {
            if($id_alo!=$var['id_alojamiento'])
              $i++;
            if($id_hab!=$var['id_habitacion'])
                $z++;
            if($id_fecha!=$var['fecha'])
                $y++;

            echo $i."-".$z."-".$y."<br>";

            $id_alo = $var['id_alojamiento'];
            $id_hab = $var['id_habitacion'];
            $id_fecha = $var['fecha'];
        }

        /*

          $id_alojamiento = 0;
          $id_habitacion = 0;
          $habitaciones = array();
          $fechas = array();
          $fe = array();
          $alo = array();
          $alojamientos = array();
          $count = 0;
          foreach ($general as $var) {
          $count++;

          if ($count == 1) {
          $id_habitacion = $var['id_habitacion'];
          }

          if ($id_habitacion != $var['id_habitacion']) {
          $hab = array(
          'id_habitacion' => $var['id_habitacion'],
          'fechas' => $fechas
          );
          array_unshift($habitaciones, $hab);
          $fechas = array();

          if ($id_alojamiento != $var['id_alojamiento']) {
          $alo = array(
          'id_alojamiento' => $var['id_alojamiento'],
          'habitacion' => $habitaciones
          );
          array_unshift($alojamientos, $alo);
          $habitaciones = array();
          }
          }

          $fe = array(
          'fecha' => $var['fecha'],
          );
          array_unshift($fechas, $fe);
          $id_alojamiento = $var['id_alojamiento'];
          $id_habitacion = $var['id_habitacion'];
          }




          foreach ($alojamientos as $var) {

          echo "id_alojamiento: " . $var['id_alojamiento'] . "  <br>";

          foreach ($var['habitacion'] as $var0) {
          echo "id_habitacion: " . $var0['id_habitacion'] . "<br>";

          foreach ($var0['fechas'] as $var1) {
          echo "fecha: " . $var1['fecha'] . "<br>";
          }
          }
          } */
    }

}

?>
