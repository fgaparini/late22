<?php
$Lunes = "Lunes";
$Martes = "Martes";
$Miercoles = "Miercoles";
$Jueves = "Jueves";
$Viernes = "Viernes";
$Sabado = "Sabado";
$Domingo = "Domingo";

$Enero = "Enero";
$Febrero = "Febrero";
$Marzo = "Marzo";
$Abril = "Abril";
$Mayo = "Mayo";
$Junio = "Junio";
$Julio = "Julio";
$Agosto = "Agosto";
$Setiembre = "Setiembre";
$Octubre = "Octubre";
$Noviembre = "Noviembre";
$Diciembre = "Diciembre";

//Cargando base de calendario si aun no existe...
$sSQL = "SELECT count(*) as total";
$sSQL .= " FROM cal_calendario";
$sSQL .= "  WHERE id_habitacion = $id_habitacion";
$result = mysql_query($sSQL,$link);
if ($fila = mysql_fetch_array($result)) {
	if ($fila["total"] == 0) {			
		$sSQL = "INSERT INTO cal_calendario";
		$sSQL .= " (id_habitacion,";
		$sSQL .= " fecha,";
		$sSQL .= " cant_asignada,";
		$sSQL .= " cant_reservada,";
		$sSQL .= " cant_disponible,";
		$sSQL .= " tarifa_normal,";
		$sSQL .= " tarifa_oferta,";
		$sSQL .= " estado_bloqueo)";
		$sSQL .= " SELECT $id_habitacion,";
		$sSQL .= " f.fecha,";
		$sSQL .= " 0,";
		$sSQL .= " 0,";
		$sSQL .= " 0,";
		$sSQL .= " 0,";
		$sSQL .= " 0,";
		$sSQL .= " 'A'";
		$sSQL .= " FROM cal_fecha f";
		$result = mysql_query($sSQL,$link);
		if(!$result) {
			echo "<center><font class=cuerpodet>Ocurrió un error al intentar generar el calendario. Por favor vuelva a intentarlo en unos minutos.</font></center>";
		};
	};
};

//Constantes para columnas...
$col_fecha = 0;
$col_dia_semana = 1;
$col_dia = 2;
$col_mes = 3;
$col_anho = 4;
$col_cant_asignada = 5;
$col_cant_reservada = 6;
$col_cant_disponible = 7;
$col_mes_desc = 8;
$col_dia_cad = 9;
$col_mes_cad = 10;
$col_tarifa_normal = 11;
$col_tarifa_oferta = 12;
$col_estado_bloqueo = 13;
$col_estancia_minima = 14;

//Leyendo calendario...
$sSQL = "SELECT fecha,";
$sSQL .= " weekday(fecha) as dia_semana,";
$sSQL .= " day(fecha) as dia,";
$sSQL .= " month(fecha) as mes,";
$sSQL .= " year(fecha) as anho,";
$sSQL .= " cant_asignada,";
$sSQL .= " cant_reservada,";
$sSQL .= " cant_disponible,";
$sSQL .= " tarifa_normal,";
$sSQL .= " tarifa_oferta,";
$sSQL .= " estado_bloqueo,";
$sSQL .= " estancia_minima";
$sSQL .= " FROM cal_calendario";
$sSQL .= "  WHERE id_habitacion = $id_habitacion";
$sSQL .= "  AND fecha >= '".$anho_desde."-".$mes_desde."-01'";
$sSQL .= "  AND fecha < '".$anho_hasta."-".$mes_hasta."-01'";
$sSQL .= "  ORDER BY fecha";
$result = mysql_query($sSQL,$link);
if ($fila = mysql_fetch_array($result)) {
	$iFila = 0;
	do {
		$fechas[$iFila][$col_fecha] = $fila["fecha"];
		switch($fila["dia_semana"]) {
			case 0: $dia_semana = $Lunes; break;
			case 1: $dia_semana = $Martes; break;
			case 2: $dia_semana = $Miercoles; break;
			case 3: $dia_semana = $Jueves; break;
			case 4: $dia_semana = $Viernes; break;
			case 5: $dia_semana = $Sabado; break;
			case 6: $dia_semana = $Domingo; break;
		}
		$fechas[$iFila][$col_dia_semana] = $dia_semana;
		$fechas[$iFila][$col_dia] = $fila["dia"];
		$fechas[$iFila][$col_mes] = $fila["mes"];
		$fechas[$iFila][$col_anho] = $fila["anho"];
		$fechas[$iFila][$col_cant_asignada] = $fila["cant_asignada"];
		$fechas[$iFila][$col_cant_reservada] = $fila["cant_reservada"];
		$fechas[$iFila][$col_cant_disponible] = $fila["cant_disponible"];
		switch($fila["mes"]) {
			case 1: $mes_desc = $Enero; break;
			case 2: $mes_desc = $Febrero; break;
			case 3: $mes_desc = $Marzo; break;
			case 4: $mes_desc = $Abril; break;
			case 5: $mes_desc = $Mayo; break;
			case 6: $mes_desc = $Junio; break;
			case 7: $mes_desc = $Julio; break;
			case 8: $mes_desc = $Agosto; break;
			case 9: $mes_desc = $Setiembre; break;
			case 10: $mes_desc = $Octubre; break;
			case 11: $mes_desc = $Noviembre; break;
			case 12: $mes_desc = $Diciembre; break;
		}
		$fechas[$iFila][$col_mes_desc] = $mes_desc;
		if ($fila["dia"] < 10) {
			$fechas[$iFila][$col_dia_cad] = "0".$fila["dia"];
		}
		else {
			$fechas[$iFila][$col_dia_cad] = $fila["dia"];
		};
		if ($fila["mes"] < 10) {
			$fechas[$iFila][$col_mes_cad] = "0".$fila["mes"];
		}
		else {
			$fechas[$iFila][$col_mes_cad] = $fila["mes"];
		};
		$fechas[$iFila][$col_tarifa_normal] = $fila["tarifa_normal"];
		$fechas[$iFila][$col_tarifa_oferta] = $fila["tarifa_oferta"];
		$fechas[$iFila][$col_estado_bloqueo] = $fila["estado_bloqueo"];
		$fechas[$iFila][$col_estancia_minima] = $fila["estancia_minima"];
		$iFila++;
	} while ($fila = mysql_fetch_array($result));
	$iTotalFilas = sizeof($fechas);
	$iColumnasCal = $iTotalFilas + 1;
};
?>