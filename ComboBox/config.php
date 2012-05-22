<?php
$host = "127.0.0.1";
$log = "root";
$senha = "";
$bd = "banco_daniel_joelton";
$con = mysql_connect($host, $log, $senha) ;
mysql_select_db($bd, $con);
?>