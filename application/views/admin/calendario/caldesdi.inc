<tr>
<?php
$mes_anterior = $fechas[0][$col_mes] - 1;
if ($mes_anterior < 1) {
	$mes_anterior = 12;
	$anho_anterior = $fechas[0][$col_anho] - 1;
	if ($anho_anterior < $anho_minimo) {
		$mes_anterior = 1;
		$anho_anterior = $anho_minimo;
	};
}
else {
	$anho_anterior = $fechas[0][$col_anho];
};
$mes_siguiente = $fechas[$iTotalFilas-1][$col_mes] + 1;
if ($mes_siguiente > 12) {
	$mes_siguiente = 1;
	$anho_siguiente = $fechas[$iTotalFilas-1][$col_anho] + 1;
	if ($anho_siguiente > $anho_maximo) {
		$mes_siguiente = 12;
		$anho_siguiente = $anho_maximo;
	};
}
else {
	$anho_siguiente = $fechas[$iTotalFilas-1][$col_anho];
};
$link_anterior = "anterior";
$link_proximo = "siguiente";
$desc_rango = " Desde ".$fechas[0][$col_mes_desc].": ".$fechas[0][$col_dia_semana]." ".$fechas[0][$col_dia].", ".$fechas[0][$col_anho];
$desc_rango .= " hasta ".$fechas[$iTotalFilas-1][$col_mes_desc].": ".$fechas[$iTotalFilas-1][$col_dia_semana]." ".$fechas[$iTotalFilas-1][$col_dia].", ".$fechas[$iTotalFilas-1][$col_anho]." ";
echo "<td class=calmesdesc colspan=".$iColumnasCal.">";
echo "<input class=calgen type='button' value='Anterior' onclick='javascript:irdet(".$mes_anterior.",".$anho_anterior.")'>";
echo "<font class=calmesdesc>".$desc_rango."</font> ";
echo "<input class=calgen type='button' value='Siguiente' onclick='javascript:irdet(".$mes_siguiente.",".$anho_siguiente.")'>";
echo "</td>";
?>
</tr>