<?php
if(isset($_POST["excluir"])){
	include("./config.php");
	$con = mysql_connect($host, $log, $senha);
	mysql_select_db($bd, $con);
	$sql = "DELETE FROM questao WHERE id= '" .$_POST["codigo"]."'";
	mysql_query($sql, $con);
	mysql_close($con);
	header("location: ./questao_excluir_aviso.php");
}
?>

<html>
<head>
<title>Excluir Quest�o</title>
</head>
<body>
<center>
<h3>Excluir Quest�o</h3>
</center>
<form name="form1" method="POST" action="questao_excluir.php">
<table border="0" align="center" width="35%">
	<tr>
		<td><input type="hidden" name="excluir" value="ok"> <input
			type="hidden" name="codigo" value="<?php echo $_GET["codigo"]?>">
		<center>
		<h3>Voc� tem certeza que deseja excluir a quest�o?</h3>
		</center>
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="Sim"></td>
		<td><input type="button" value="N�o"
			onclick="location.href = 'questao_lista.php'"></td>
	</tr>
</table>
</form>
</body>
</html>