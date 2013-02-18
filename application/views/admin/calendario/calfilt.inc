<tr>
<?php
$anho = date('y');
echo "<td class=calfiltro colspan=".$iColumnasCal.">";
echo "<select class=calgen name='sel_mes'>";
echo "<option"; if ($mes == 1) { echo " selected"; }; echo " value=1>".$Enero."</option>";
echo "<option"; if ($mes == 2) { echo " selected"; }; echo " value=2>".$Febrero."</option>";
echo "<option"; if ($mes == 3) { echo " selected"; }; echo " value=3>".$Marzo."</option>";
echo "<option"; if ($mes == 4) { echo " selected"; }; echo " value=4>".$Abril."</option>";
echo "<option"; if ($mes == 5) { echo " selected"; }; echo " value=5>".$Mayo."</option>";
echo "<option"; if ($mes == 6) { echo " selected"; }; echo " value=6>".$Junio."</option>";
echo "<option"; if ($mes == 7) { echo " selected"; }; echo " value=7>".$Julio."</option>";
echo "<option"; if ($mes == 8) { echo " selected"; }; echo " value=8>".$Agosto."</option>";
echo "<option"; if ($mes == 9) { echo " selected"; }; echo " value=9>".$Setiembre."</option>";
echo "<option"; if ($mes == 10) { echo " selected"; }; echo " value=10>".$Octubre."</option>";
echo "<option"; if ($mes == 11) { echo " selected"; }; echo " value=11>".$Noviembre."</option>";
echo "<option"; if ($mes == 12) { echo " selected"; }; echo " value=12>".$Diciembre."</option>";
echo "</select>";
echo "<select class=calgen name='sel_anho'>";
for ($i=$anho_minimo;$i<=$anho_maximo;$i++) {
	echo "<option";
	if ($i == $anho) { echo " selected"; };
	echo " value=".$i.">".$i."</option>";
};
echo "</select>";
echo "<input class=calgen type='button' value='Ir' onclick='javascript:ir()' style='width:20px'>";
echo "</td>";
?>
</tr>