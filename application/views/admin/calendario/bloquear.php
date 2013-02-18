<?php
ob_start();
include("conexion.inc");
include("lecparam.inc");
include("actualiz.inc");
include("caldacab.inc");
?>

<html>

<head>
<title>Bloquear</title>
<style>@import URL(calendar.css);</style>
<?php
include("fungen.inc");
?>
</head>

<body class=base>
<?php
include("calini.inc");
include("calfilt.inc");
include("caldesdi.inc");
include("caldias.inc");
include("calbloq.inc");
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