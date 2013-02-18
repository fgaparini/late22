<tr>
<td class=caldescactu><font class=calgen>Actualizar</font><br><input class=calgenactu type='checkbox' name='calgenactu'>

<?php
echo "<input class=calgen type='button' size=4 value='>' onclick='sel_todo()' style='width:20px'>";
echo "</td>";
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "actu";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	echo "<td class=calactu><input class=calediactu type='checkbox' size=1 name='".$bnc."' id='".$bncf."'></td>";
}
?>
</tr>