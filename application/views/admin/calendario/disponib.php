<?php
ob_start();
include("conexion.inc");
include("lecparam.inc");
include("actualiz.inc");
include("caldacab.inc");
?>

<html>

<head>
<title>Disponibilidad</title>
<style>@import URL(calendar.css);</style>
<?
include("fungen.inc");
?>
</head>

<body class=base>
<?
include("calini.inc");
include("calfilt.inc");
include("caldesdi.inc");
include("caldias.inc");
include("calcant.inc");
include("calactu.inc");
include("calbotac.inc");
include("calfin.inc");
?>
</body>

</html>

<?php
include("desconec.inc");
ob_end_flush();
?>