<?php
class Gf
{
    function comparar_general($var1,$var2,$result)
    {
        if($var1==$var2)
            return $result;
        else
            return "";
    }
    
    function eliminar_coma($string)
    {
        $array_comas='';
        if($string!='')
        $array_comas = substr($string, 0, strlen($string) - 1);
        else
        $array_comas='';
        
        return $array_comas;
    }
    
    function cantidad_dias($fecha_desde,$fecha_hasta)
    {
        //Calcular la cantidad de dias entre una fecha y otra
        $f_desde_array = explode("-", $fecha_desde);
        $f_hasta_array = explode("-",$fecha_hasta);
        
        $dia_desde = $f_desde_array[0];
        $mes_desde = $f_desde_array[1];
        $ano_desde = $f_desde_array[2];
        
        $dia_hasta = $f_hasta_array[0];
        $mes_hasta = $f_hasta_array[1];
        $ano_hasta = $f_hasta_array[2];
        
        //calculo timestam de las dos fechas
        $timestamp1 = mktime(0,0,0,$mes_desde,$dia_desde,$ano_desde);
        $timestamp2 = mktime(0,0,0,$mes_hasta,$dia_hasta,$ano_hasta); 
        
        //resto a una fecha la otra
        $segundos_diferencia = $timestamp1 - $timestamp2;
        
        //convierto segundos en días
        $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
        
        //obtengo el valor absoulto de los días (quito el posible signo negativo)
        $dias_diferencia = abs($dias_diferencia);

        //quito los decimales a los días de diferencia
        $dias_diferencia = floor($dias_diferencia); 
        
        return $dias_diferencia;
    }
    
    function html_mysql($fecha)
    {
        $array_fecha="";
        $array_fecha = explode("-", $fecha);
        $fecha = $array_fecha[2]."-".$array_fecha[1]."-".$array_fecha[0];
        return $fecha;
    }
    
    function mysql_html($fecha)
    {
        $array_fecha="";
        $array_fecha = explode("-", $fecha);
        $fecha = $array_fecha[0]."-".$array_fecha[1]."-".$array_fecha[2];
        return $fecha;
    }
    
}
?>
