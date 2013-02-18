<tr>
<td class=caldesc><font class=calgen>Tarifa Normal</font>
<?php
echo "<br>";
echo "<select class=caltarn name='calgentarns' id='calgentarns' size=1 width=49px>";
echo "<option selected value='='>=</option>";
echo "<option value='+'>+</option>";
echo "<option value='-'>-</option>";
echo "</select>
";
echo "<input class=caleditarn type='text' name='calgentarni' value=0 maxlength=4 size=2>";
echo "<input class=calgen type='button'  value='>' onclick='javascript:normal_todo()'>";
echo "</td>";
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "tarn";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	echo "<td class=caltarn><input class=caleditarn type='text' name='".$bnc."' id='".$bncf."' value='".$fechas[$i][$col_tarifa_normal]."' maxlength=4 size=1></td>";
}
?>
</tr>
<tr>
<td class=caldesc><font class=calgen>Tarifa Oferta</font>
<?php
echo "<br>";
echo "<select class=caltaro name='calgentaros' id='calgentaros' size=1 width=49px>";
echo "<option selected value='='>=</option>";
echo "<option value='+'>+</option>";
echo "<option value='-'>-</option>";
echo "</select>";
echo "<input class=caleditaro type='text' name='calgentaroi' value=0 maxlength=4 size=2>";
echo "<input class=calgen type='button' value='>' onclick='javascript:oferta_todo()'>";
echo "</td>";
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "taro";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	
if ($fechas[$i][$col_tarifa_oferta]== 0) {

echo "<td class=caltaro><input class=caleditaro type='text' name='".$bnc."' id='".$bncf."' value='".$fechas[$i][$col_tarifa_oferta]."' maxlength=4 size=1></td>";

} else {

echo "<td class=caltaro><input class=caleditaro2 type='text' name='".$bnc."' id='".$bncf."' value='".$fechas[$i][$col_tarifa_oferta]."' maxlength=4 size=1></td>";
}
}
?>
</tr>