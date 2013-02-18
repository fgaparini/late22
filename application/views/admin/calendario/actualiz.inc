<?php

// Actualizando si corresponde...
foreach( $_POST as $name => $value ) {

	// Cantidades...	
	if (preg_match("/asig/",$name)) {
		
		$fecha = substr($name, 4, 4)."-".substr($name, 8, 2)."-".substr($name, 10, 2);
		
		$sSQL = "UPDATE cal_calendario SET";
		$sSQL .= " cant_asignada = ".$value;
		$sSQL .= " WHERE id_habitacion = ".$id_habitacion;
		$sSQL .= " AND fecha = '".$fecha."'";
		$result = mysql_query($sSQL,$link);
		if(!$result) {
			echo "<center><font class=cuerpodet>Ocurri� un error al intentar actualizar cantidad asignada en calendario (Query: ".$sSQL." Id: ".$id_habitacion." Fecha: ".$fecha."). Por favor vuelva a intentarlo en unos minutos.</font></center>";
		};

		$sSQL = "UPDATE cal_calendario SET";
		$sSQL .= " cant_disponible = cant_asignada - cant_reservada";
		$sSQL .= " WHERE id_habitacion = ".$id_habitacion;
		$sSQL .= " AND fecha = '".$fecha."'";
		$result = mysql_query($sSQL,$link);
		if(!$result) {
			echo "<center><font class=cuerpodet>Ocurri� un error al intentar actualizar cantidad disponible en calendario (Query: ".$sSQL." Id: ".$id_habitacion." Fecha: ".$fecha."). Por favor vuelva a intentarlo en unos minutos.</font></center>";
		};
				
	};

	// Estancia Minima...	
	if (preg_match("/esmi/",$name)) {
		
		$fecha = substr($name, 4, 4)."-".substr($name, 8, 2)."-".substr($name, 10, 2);
		
		$sSQL = "UPDATE cal_calendario SET";
		$sSQL .= " estancia_minima = ".$value;
		$sSQL .= " WHERE id_habitacion = ".$id_habitacion;
		$sSQL .= " AND fecha = '".$fecha."'";
		$result = mysql_query($sSQL,$link);
		if(!$result) {
			echo "<center><font class=cuerpodet>Ocurri� un error al intentar actualizar estancia minima en calendario (Query: ".$sSQL." Id: ".$id_habitacion." Fecha: ".$fecha."). Por favor vuelva a intentarlo en unos minutos.</font></center>";
		};
				
	};
	
	// Tarifa Normal...	
	if (preg_match("/tarn/",$name)) {
		
		$fecha = substr($name, 4, 4)."-".substr($name, 8, 2)."-".substr($name, 10, 2);
		
		$sSQL = "UPDATE cal_calendario SET";
		$sSQL .= " tarifa_normal = ".$value;
		$sSQL .= " WHERE id_habitacion = ".$id_habitacion;
		$sSQL .= " AND fecha = '".$fecha."'";
		$result = mysql_query($sSQL,$link);
		if(!$result) {
			echo "<center><font class=cuerpodet>Ocurri� un error al intentar actualizar tarifa normal en calendario (Query: ".$sSQL." Id: ".$id_habitacion." Fecha: ".$fecha."). Por favor vuelva a intentarlo en unos minutos.</font></center>";
		};
				
	};

	// Tarifa Oferta...	
	if (preg_match("/taro/",$name)) {
		
		$fecha = substr($name, 4, 4)."-".substr($name, 8, 2)."-".substr($name, 10, 2);
		
		$sSQL = "UPDATE cal_calendario SET";
		$sSQL .= " tarifa_oferta = ".$value;
		$sSQL .= " WHERE id_habitacion = ".$id_habitacion;
		$sSQL .= " AND fecha = '".$fecha."'";
		$result = mysql_query($sSQL,$link);
		if(!$result) {
			echo "<center><font class=cuerpodet>Ocurri� un error al intentar actualizar tarifa oferta en calendario (Query: ".$sSQL." Id: ".$id_habitacion." Fecha: ".$fecha."). Por favor vuelva a intentarlo en unos minutos.</font></center>";
		};
				
	};
	
	// Bloqueo...	
	if (preg_match("/bloq/",$name)) {
		
		$fecha = substr($name, 4, 4)."-".substr($name, 8, 2)."-".substr($name, 10, 2);
		
		$sSQL = "UPDATE cal_calendario SET";
		$sSQL .= " estado_bloqueo = '".$value."'";
		$sSQL .= " WHERE id_habitacion = ".$id_habitacion;
		$sSQL .= " AND fecha = '".$fecha."'";
		$result = mysql_query($sSQL,$link);
		if(!$result) {
			echo "<center><font class=cuerpodet>Ocurri� un error al intentar actualizar estado bloqueo en calendario (Query: ".$sSQL." Id: ".$id_habitacion." Fecha: ".$fecha."). Por favor vuelva a intentarlo en unos minutos.</font></center>";
		};
				
	};
				
};

?>