<tr>
<td class=caldesc><font class=calgen>Disponibles</font></td>
<?php
for($i=0;$i<$iTotalFilas;$i++) {
	if ($fechas[$i][$col_estado_bloqueo] == "A") {
		echo "<td class=caldisp>";
	}
	else {
		echo "<td class=calnodisp>";
	}
	echo "<font class=calgen>".$fechas[$i][$col_cant_disponible]."</font></td>";
}
?>
</tr>