<?php

mysql_connect("localhost", "root", "");
mysql_select_db("estado");

$estado = $_POST['estado'];

$sql = "SELECT * FROM tb_cidades WHERE uf = '$estado' ORDER BY nome ASC";
$qr = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($qr) == 0){
	echo  '<option value="-1"></option>';
	 
}
else
{
	echo '<option value="-1">Selecione a Cidade</option>';
	while($ln = mysql_fetch_assoc($qr)){
		echo '<option value="'.$ln['nome'].'">'.$ln['nome'].'</option>';
	}
}
?>