<?php ob_start();
include("calendario/conexion.inc");
include("calendario/lecparam.inc");
include("calendario/actualiz.inc");
include("calendario/caldacab.inc"); ?>

<html>
	<head><style>@import URL(calendario/calendar.css);</style>
<style>@import URL(calendario_completo/calendar.css);</style>

<?php
include("calendario/fungen.inc");
?></head>
	<body>   <div>
          <?php
include("calendario/calini.inc");
include("calendario/calfilt.inc");
include("calendario/caldesdi.inc");
include("calendario_completo/entredisp.inc");
include("calendario/caldias.inc");
include("calendario/calcant.inc");
include("calendario_completo/entretarifa.inc");
include("calendario/caltari.inc");
include("calendario_completo/entreminblo.inc");
include("calendario/calesmi.inc");
include("calendario/calbloq.inc");
include("calendario/calactu.inc");
include("calendario/calbotac.inc");
include("calendario/calfin.inc");
?>
        </div></body>
</html>