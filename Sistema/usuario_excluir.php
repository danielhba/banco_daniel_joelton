<?php
if(isset($_POST["excluir"])){
	include("./config.php");
	$con = mysql_connect($host, $log, $senha);
	mysql_select_db($bd, $con);
	$sql = "DELETE FROM usuario WHERE login= '" .$_POST["codigo"]."'";
	mysql_query($sql, $con);
	mysql_close($con);
	header("location: ./usuario_excluir_aviso.php");
}
?>

<html>
<head>
<title>Excluir Usu�rio</title>
</head>
<body>
<center>
<h3>Excluir Usu�rio</h3>
</center>
<form name="form1" method="POST" action="usuario_excluir.php">
<table border="0" align="center" width="35%">
	<tr>
		<td><input type="hidden" name="excluir" value="ok"> <input
			type="hidden" name="codigo" value="<?php echo $_GET["codigo"]?>">
		<center>
		<h3>Voc� tem certeza que deseja excluir o usu�rio?</h3>
		</center>
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="Sim"></td>
		<td><input type="button" value="N�o"
			onclick="location.href = 'usuario_lista.php'"></td>
	</tr>
</table>
</form>
</body>
</html>