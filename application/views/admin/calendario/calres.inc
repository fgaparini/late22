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