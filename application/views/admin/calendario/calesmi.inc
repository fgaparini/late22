<tr>
<td class=caldesc><font class=calgen>Estancia Mín.</font>
<?php
echo "<br>";
echo "<select class=calasig name='calgenesmis' id='calgenesmis'>";
echo "<option selected value='='>=</option>";
echo "<option value='+'>+</option>";
echo "<option value='-'>-</option>";
echo "</select>";
echo "<input class=calediesmi type='text' name='calgenesmii' value=0 maxlength=3>";
echo "<input class=calgen type='button' value='>' onclick='javascript:esmi_todo()'>";
echo "</td>";
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "esmi";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	
if ($fechas[$i][$col_estancia_minima] == 0) { echo "<td class=calesmi><input class=calediesmi type='text' name='".$bnc."' id='".$bncf."'  value='1' maxlength=3></td>";} 

else { echo "<td class=calesmi><input class=calediesmi type='text' name='".$bnc."' id='".$bncf."'  value='".$fechas[$i][$col_estancia_minima]."' maxlength=3></td>";
}

}
?>
</tr>