<?php
$anho_minimo = 2012;
$anho_maximo = 2030;
$anho = date('y');
if ( (isset($_POST["id_habitacion"])) && ($_POST["id_habitacion"]!="") ) { 
 $id_habitacion = $_POST["id_habitacion"];
 
if (isset ($_POST["mes"])) {
$mes = $_POST["mes"];
 $anho = $_POST["anho"];
} else {

$mes = date('m');
 $anho = date('y');
}
}
else {
 if ( (isset($_GET["id_habitacion"])) && ($_GET["id_habitacion"]!="") ) { 
 $id_habitacion = $_GET["id_habitacion"];
$mes = date('m');
$anho = date('y');}
}

 

$mes_desde = $mes;
$anho_desde = $anho;
if ($mes_desde < 10) {
	$mes_desde = "0".$mes_desde;
};
$mes_hasta = $mes + 1;
if ($mes_hasta > 12) {
	$mes_hasta = 1;
	$anho_hasta = $anho + 1;
}
else {
	$anho_hasta = $anho;
};
if ($mes_hasta < 10) {
	$mes_hasta = "0".$mes_hasta;
};
$fechas[] = array(0,array(0,0,0,0));
?>

