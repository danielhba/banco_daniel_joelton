<?php
	if(isset($_POST["excluir"])){
		
	include("./config.php");
	
	$con = mysql_connect($host, $log, $senha);
	mysql_select_db($bd, $con);
	$sql = "DELETE FROM disciplina WHERE codigo = ".$_POST["codigo"];
	mysql_query($sql,$con);
	mysql_close($con);
	header("location: ./disciplina_excluir_aviso.php");
	}
?>


<html><head><title>Excluir Disciplina</title>
</head>
<body>
<center>
<h3>Excluir Disciplina</h3>
</center>
<form name = "form1" method = "POST" action = "disciplina_excluir.php">
<table border = "0" align = "center"  width = "35%">
	<tr>
		<td>
		<input type = "hidden" name = "excluir"  value = "ok">
		<input type = "hidden" name = "codigo" value = "<?php  echo $_GET["codigo"]?>">
		
		<center>
		<h3>Voc� tem certeza que deseja excluir a disciplina?</h3>
		</center>
		</td>
	</tr>
	
	<tr>
	
		<td><input type = "submit" value = "sim"></td>
		<td><input type = "button"  value = "nao"
		onclick = "location.href = 'disciplina_lista.php'">
		</td>
		
	</tr>
</table>
</form>
</body>
</html>