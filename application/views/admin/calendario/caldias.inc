<tr>
<td class=caldias><font class=calgen>Dias del  mes</font></td>
<?php
for ($i=0;$i<$iTotalFilas;$i++) {
	if ( ($fechas[$i][$col_dia_semana] != $Sabado) && ($fechas[$i][$col_dia_semana] != $Domingo) ) {
		echo "<td class=caldialab>";
	}
	else {
		echo "<td class=caldianolab>";
	}
	echo "<font class=calgen>".$fechas[$i][$col_dia]."</font></td>";
}
?>
</tr>