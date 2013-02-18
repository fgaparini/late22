<tr>
<td class=caldesc><font class=calgen>Bloquear </font>
<?php
echo '<a href="#" onclick="bloquear_todo(1)" ><img src="lock-open.png" hspace=3 align="absmiddle" title="Abrir Todos los dias "  width="15" height="15" border="0" /></a>';
echo '<a href="#" onclick="bloquear_todo(2)" ><img src="lock-close.png" align="absmiddle" title="Bloquear Todos los dias "  width="15" height="15" border="0" /></a>';
echo "<input  type='hidden' value='' name=calgenbloq id=calgenbloq >";
echo "</td>";
for($i=0;$i<$iTotalFilas;$i++) {
	$bnc = "bloq";
	$bncf = $bnc.$fechas[$i][$col_anho].$fechas[$i][$col_mes_cad].$fechas[$i][$col_dia_cad];
	echo "<td class=calbloq>";
	echo '<input  type="hidden" name="'.$bnc.'" id="'.$bncf.'" value="'.$fechas[$i][$col_estado_bloqueo].'">';
	 echo '<div id="'.$i.'" class='; if ($fechas[$i][$col_estado_bloqueo] == "A") {echo "mostrar2";} else {echo "ocultar2";} echo '><img src="http://localhost/late/application/views/admin/calendario/lock-open.png" id="'.$i.'-d" class="bloqids" title="Estado: Abierto (click para cerrar)"  width="20" height="20" border="0" /></div>';
	 echo '<div id="'.$i.'a" class='; if ($fechas[$i][$col_estado_bloqueo] == "C") {echo "mostrar2";} else {echo "ocultar2";} echo '><img src="http://localhost/late/application/views/admin/calendario/lock-close.png" id="'.$i.'-s" class="abierid" title="Estado: Cerrado (click para abrir)"  width="20" height="20" border="0" /></div>'; 
	 		echo "</td>";
}
?>
</tr>