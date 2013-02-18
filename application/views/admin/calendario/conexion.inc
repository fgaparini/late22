<?php

// Variables generales...
define("DB_NAME", "late_nueva"); 
define("DB_USER", "root"); 
define("DB_PASSWORD", ""); 
define("DB_HOST", "localhost");

// Estableciendo conexion con la BD...
$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysql_select_db(DB_NAME,$link);

?>