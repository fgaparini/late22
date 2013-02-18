<tr>
<td class=caldesc><font class=calgen>Asignados</font>
<?php
echo "<br>";
echo "<select class=calasig name='calgenasigs' id='calgenasigs'>";
echo "<option selected value='='>=</option>";
echo "<option value='+'>+</option>";
echo "<option value='-'>-</option>";
echo "</select>";
echo "<input class=calediasig2 type='text' name='calgenasigi' id='calgenasigi' value=0 maxlength=3 size=1> ";
echo "<input class=calgen type='button' value='>' onclick=javascript:asignar_todo() style='width:20px' >";
echo "</td>";
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "asig";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	echo "<td class=calasig><input class=calediasig type='text' name='".$bnc."' id='".$bncf."' value='".$fechas[$i][$col_cant_asignada]."' maxlength=3 size=1 ></td>";
}
?>
</tr>
<tr>
<td class=caldesc><font class=calgen>Reservados</font></td>
<?php
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "res";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	echo "<td class=calres><font class=calgen>".$fechas[$i][$col_cant_reservada]."</font></td>";
}
?>
</tr>
<tr>
<td class=caldesc><font class=calgen>Disponibles</font></td>
<?php
for($i=0;$i<$iTotalFilas;$i++) {
	if ( ($fechas[$i][$col_estado_bloqueo] == "C") || ($fechas[$i][$col_cant_disponible] == 0) ) {
		echo "<td class=calnodisp>";
	}
	else {
		echo "<td class=caldisp>";
	}
	echo "<font class=calgen>".$fechas[$i][$col_cant_disponible]."</font></td>";
}
?>
</tr>