<?php ob_start();
include("calendario/conexion.inc");

$sSQL = "select * from habitaciones";
$result = mysql_query($sSQL,$link);

?>

<html>
	<head><style>@import URL(calendario/calendar.css);</style>
<style>@import URL(calendario_completo/calendar.css);</style>

<?php
include("calendario/fungen.inc");
?></head>
	<body>   <div>
          <?php

?>
        </div></body>
</html>