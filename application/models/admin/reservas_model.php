
<?php

class Reservas_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insert($row = array())
    {
        $this->db->insert('reserva_dat', $row);
        return $this->db->insert_id();
    }
    
    function reservas_filtro($orden, $campo, $valor, $start, $end)
    {
        $query_list = '';
        $query_count = '';

        $query_select = '';
        $query_select_count = '';
        $query_where = '';
        $query_order = '';
        $query_limit = '';

        $query_select = " select reserva_dat.Localizador as localizador, Checkin, Checkout, NombreHuesped, ApellidoHuesped, Nombre, costo_total, estado_pago, metodo_pago, reserva_dat.fecha_reserva as fecha_reserva_dat ";
        $query_select_count = " select count(*) as cantidad ";


        $query_from = " from alojamientos 
                      inner join informaciongeneral on alojamientos.id_alojamiento = informaciongeneral.id_informaciongeneral 
                      inner join reserva_dat on alojamientos.id_alojamiento=reserva_dat.alojamiento_id 
                      inner join reservas_det on reserva_dat.localizador=reservas_det.localizador
                      inner join huesped on reserva_dat.id_huesped=huesped.id_huesped";


        //Filtrado de campos
        if ($campo != '')
        {
            if ($valor != '')
                if ($campo == 'Localizador')
                //Como localizador esta en las dos tablas reserva_data y resevas_det hay que referirse a una table en especifico.
                    $query_where = " where reserva_dat." . $campo . " = '" . $valor . "' ";
                else
                    $query_where = " where " . $campo . " = '" . $valor . "' ";
            else
                $query_where = '';
        }
        //Filtrado por cual campo vamos a ordenar la consulta
        if ($orden != '')
            $query_order = " order by " . $orden . " ";
        else
            $query_order = '';

        //Limite del paginado (que valor comenzar y terminara)
        $query_limit = " limit " . $start . "," . $end . "";

        //Armo la consulta con sus diferentes partes
        $query_list = $query_select . $query_from . $query_where . $query_order . $query_limit; //consulta que devolvera el listado de valores
        $query_count = $query_select_count . $query_from . $query_where; // consulta que devolvera la cantidad de valores unicamente
        //Ejecuto la consulta para contar la cantidad de resultados y devuelvo el valor por ejempo 20
        $rows_total = $this->db->query($query_count);
        $rows_total = $rows_total->row();
        $rows_total = $rows_total->cantidad;

        //Ejecuto la contula para devolver el array con los valores deseasdos
        $rows = $this->db->query($query_list);
        $rows = $rows->result_array();

        //Armo un array para devolver 2 valores al controlador 
        $result = array(
            'rows_list' => $rows,
            'rows_count' => $rows_total
        );


        return $result;
    }

    function tipo_alojamientos()
    {
        $query = "select * from tipoalojamientos";
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    /*function buscar_disponibilidad($campo, $valor, $fecha_desde, $fecha_hasta, $paxmax, $pais, $provinci, $ciudad, $localidad)
    {

        if ($campo == 'nombre')
        {
            $query = sprintf(
                    "
                select 
                h.ID_Habitacion,
                h.NombreHab,
                th.TipoHabitacion,
                h.PaxMax,
                c.cant_disponible,
                c.fecha
                from 
                alojamientos_habitaciones as ah
                inner join 
                habitaciones as h
                on 
                h.ID_Habitacion = ah.ID_Habitacion 
                inner join 
                alojamientos as a
                on
                a.ID_Alojamiento = ah.ID_Alojamiento
                inner join
                informaciongeneral as i
                on
                i.ID_InformacionGeneral = a.ID_InformacionGeneral
                inner join
                tipo_habitaciones as th
                on
                h.ID_TipoHabitacion=th.ID_TipoHabitacion
                inner join
                cal_calendario as c
                on
                c.id_habitacion = h.ID_Habitacion

                where h.PaxMax>=%s and cant_disponible>0  and c.fecha>'%s' and c.fecha<='%s' ", $valor, $paxmax, $fecha_desde, $fecha_hasta);

            $rows = $this->db->query($query);
            $rows = $rows->result_array();
            return $rows;
        }
    }*/

    function buscar_disponibilidad($campo, $id_alojamiento, $fecha_desde, $fecha_hasta, $paxmax, $pais, $provincia, $ciudad, $localidad)
    {

        $query = sprintf(
               "select 
            a.ID_Alojamiento,
            i.Nombre,
            i.Descripcion,
            i.Direccion,
            ta.TipoAlojamiento,
            p.CountryName,
            pr.SuName,
            ci.Name,
            lo.Localidad,
            c.fecha,
            c.tarifa_normal,
            c.tarifa_oferta,
            c.cant_disponible,
            h.ID_Habitacion,
            h.NombreHab
        from
               cal_calendario as c
        inner join
    habitaciones as h ON c.id_habitacion = h.ID_Habitacion
        inner join
    alojamientos_habitaciones as ah ON c.id_habitacion = ah.ID_Habitacion
        inner join
    alojamientos as a ON a.ID_Alojamiento = ah.ID_Alojamiento
        inner join
    informaciongeneral as i ON a.ID_InformacionGeneral = i.ID_InformacionGeneral
        inner join
    tipoalojamiento as ta ON a.ID_TipoAlojamiento = ta.ID_TipoAlojamiento
        inner join
    paises as p ON i.pais = p.CountryCode
        inner join
    provincias as pr ON i.provincia = pr.SuCode
        inner join
    ciudades as ci ON i.ciudad = ci.location
        inner join
    localidades as lo ON i.localidad = lo.ID_Localidades

            where
                fecha >= '%s'
                and fecha < '%s' 
                and h.PaxMax >= %s 
                
                and c.tarifa_normal>0
                
           ", $fecha_desde, $fecha_hasta, $paxmax);

        
        $q = "";
        
        //and c.cant_disponible>0
        if ($campo == 'nombre')
        {
            $q = $q . sprintf(" and a.ID_Alojamiento=%s", $id_alojamiento);
        }
        elseif ($campo == 'lugar')
        {
            if ($pais != 'null')
                $q = $q . sprintf(" and p.CountryCode='%s' ", $pais);
            if ($provincia != 'null')
                $q = $q . sprintf(" and pr.SuCode='%s' ", $provincia);
            if ($ciudad != 'null')
                $q = $q . sprintf(" and ci.Location='%s' ", $ciudad);
            if ($localidad != 'null')
                $q = $q . sprintf(" and lo.ID_Localidades='%s' ", $localidad);
        }

        $query = $query . $q;
        $rows = $this->db->query($query);
        //$rows = $rows->result_array();
        return $rows;
    }
    
    function comision_mp($id_alojamiento)
    {
        $query=sprintf("
            select m.Comision from alojamientos as a
            inner join 
            metododepago as m
            on
            a.ID_MP=m.ID_MP
            where a.ID_Alojamiento=%s",$id_alojamiento);
        $row = $this->db->query($query);
        $row = $row->row();
        return $row->Comision;
    }
    
    function select_mp_alo($id_alojamiento)
    {
        $query=  sprintf("
            select Senia,
            Anticipado,
            ComisionSenia,
            AceptaSenia,
            Comision,
            MejorPrecio 
            from 
            alojamientos as a 
            inner join 
            metododepago as m 
            on 
            a.ID_MP=m.ID_MP
            where ID_Alojamiento=%s",$id_alojamiento);
        
        $row = $this->db->query($query);
        $row = $row->row();
        return $row;
    }
    
    function max_id()
    {
        $query="select max(reservas_id) as max_id from reserva_dat";
        $row = $this->db->query($query);
        $row = $row->row();
        return $row->max_id;
    }
    
    function alojamiento_responsable($id_alojamiento)
    {
        $query= sprintf("
            select i.Responsable from alojamientos as a
            inner join 
            informaciongeneral as i
            on
            a.ID_InformacionGeneral=i.ID_InformacionGeneral
            where a.ID_Alojamiento=%s",$id_alojamiento);
        
        $row=$this->db->query($query);
        $row=$row->row();
        return $row->Responsable;
    }
    
    function precio_cal_calendar($id_habitacion,$fecha)
    {
      $query=sprintf("
                        select 
                        c.tarifa_oferta, c.tarifa_normal
                        from
                        cal_calendario c
                        where 
                        c.id_habitacion=%s 
                        and c.fecha='%s'",$id_habitacion,$fecha); 
      
      $row = $this->db->query($query);
      $row = $row->row();
      return $row;
    }
    
    function datos_habitacion($id_habitacion)
    {
        $query=sprintf("
                        select 
                        NombreHab, UnidadAlojativa
                        from
                        habitaciones
                        where
                        id_habitacion = %s",$id_habitacion); 
      
      $row = $this->db->query($query);
      $row = $row->row();
      return $row;
    }
}