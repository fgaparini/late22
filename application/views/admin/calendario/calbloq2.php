<tr>
<td class=caldesc><font class=calgen>Bloqueo</font>
<script language="javascript">

function bloquear(xa,ja) {
	document.getElementById(ja).className = 'ocultar2';
	document.getElementById(ja+'a').className = 'mostrar2';
	document.calgen.aa[ja].value = "C";
}
function abierto(ya,ka) {
	document.getElementById(ka).className = 'mostrar2';
	document.getElementById(ka+"a").className = 'ocultar2';
	document.calgen.aa[ka].value = "A";
}
</script>
<?php
echo "<br>";
echo "<select class=calbloq name='calgenbloq' id='calgenbloq'>";
echo "<option selected value='A'>A</option>";
echo "<option value='C'>C</option>";
echo "</select>";
echo "<input class=calgen type='button' value='>' onclick='javascript:bloquear_todo()'>";
echo "</td>";
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "aa";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	echo "<td class=calbloq>";
	echo '<input  type="text" name="'.$bnc.'" id="'.$bncf.'" value="'.$fechas[$i][$col_estado_bloqueo].'">';
	 echo '<div id="'.$i.'" class='; if ($fechas[$i][$col_estado_bloqueo] == "A") {echo "mostrar2";} else {echo "ocultar2";} echo '><a href="#" onclick="bloquear('.$bncf.','.$i.')" ><img src="../iconos-panel/lock-open.png" title="Abierto"  width="20" height="20" border="0" /></a></div>';
	 echo '<div id="'.$i.'a" class='; if ($fechas[$i][$col_estado_bloqueo] == "C") {echo "mostrar2";} else {echo "ocultar2";} echo '><a href="#" onclick="abierto('.$bncf.','.$i.')" ><img src="../iconos-panel/lock-close.png" title="cerrado"  width="20" height="20" border="0" /></a></div>'; 
	 	
	echo "</td>";
}
?>
</tr>