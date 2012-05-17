<html>
<head>
<title>Teste - Resposta</title>
</head>
<body>
<center>
<h3>Teste - Resposta</h3>
</center>
<?php
if(isset($_POST["resposta"])){
	include("config.php");
	$con = mysql_connect($host, $log, $senha);
	mysql_select_db($bd, $con);
	$tabela = mysql_query("SELECT alternativa_correta, resposta_1, resposta_2, resposta_3, resposta_4, resposta_5, enunciado FROM questao WHERE id= '".$_POST["id"]."'");
	$correto = mysql_fetch_row($tabela);
	if ($correto[0] == $_POST["resposta"])
	{
		?>
<form name="form1" method="POST" action="teste_questao.php">
<table border="0" align="center" width="100%">
	<tr>
		<td align="center">Parabéns! Resposta correta!</td>
	</tr>
</table>
<br>
<table>
	<tr>
		<td width="80%"><?php echo $correto[6]?></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td>a) <?php if($correto[0] == 1) echo "<b> ".$correto[1]."</b>"; else echo $correto[1] ?></td>
	</tr>
	<tr>
		<td>b) <?php if($correto[0] == 2) echo "<b> ".$correto[2]."</b>"; else echo $correto[2] ?></td>
	</tr>
	<tr>
		<td>c) <?php if($correto[0] == 3) echo "<b> ".$correto[3]."</b>"; else echo $correto[3] ?></td>
	</tr>
	<tr>
		<td>d) <?php if($correto[0] == 4) echo "<b> ".$correto[4]."</b>"; else echo $correto[4] ?></td>
	</tr>
	<tr>
		<td>e) <?php if($correto[0] == 5) echo "<b> ".$correto[5]."</b>"; else echo $correto[5] ?></td>
	</tr>
</table>
<br>
<table border="0" align="center" width="100%">
	<tr>
		<td align="center"><input type="submit"
			value="Responder outra questão"></td>
	</tr>
</table>
</form>
		<?php
	}
	else{
		?>
<form name="form1" method="POST" action="teste_questao.php">
<table border="0" align="center" width="100%">
	<tr>
		<td align="center">Ops! Resposta errada.</td>
	</tr>
</table>
<br>
<table>
	<tr>
		<td width="80%"><?php echo $correto[6]?></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td>a) <?php if($correto[0] == 1) echo "<font color=\"red\"><b> ".$correto[1]."</b></font>"; else echo $correto[1] ?></td>
	</tr>
	<tr>
		<td>b) <?php if($correto[0] == 2) echo "<font color=\"red\"><b> ".$correto[2]."</b></font>"; else echo $correto[2] ?></td>
	</tr>
	<tr>
		<td>c) <?php if($correto[0] == 3) echo "<font color=\"red\"><b> ".$correto[3]."</b></font>"; else echo $correto[3] ?></td>
	</tr>
	<tr>
		<td>d) <?php if($correto[0] == 4) echo "<font color=\"red\"><b> ".$correto[4]."</b></font>"; else echo $correto[4] ?></td>
	</tr>
	<tr>
		<td>e) <?php if($correto[0] == 5) echo "<font color=\"red\"><b> ".$correto[5]."</b></font>"; else echo $correto[5] ?></td>
	</tr>
</table>
<br>
<table border="0" align="center" width="100%">
	<tr>
		<td align="center"><input type="submit"
			value="Responder outra questão"></td>
	</tr>
</table>
</form>
		<?php
	}
}
else {
	?>
<form name="form1" method="POST" action="teste_questao.php"><input
	type="hidden" name="id" value="<?php echo $_POST["id"] ?>">
<table border="0" align="center" width="100%">
	<tr>
		<td align="center">Por favor, responda a questão.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Responder questão"></td>
	</tr>
</table>
</form>
	<?php
}
?>
</body>
</html>