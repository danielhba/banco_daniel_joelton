<html>
<head>
<title>Teste</title>
</head>
<body>
<center>
<h3>Teste</h3>
</center>
<?php
include("config.php");
$con = mysql_connect($host, $log, $senha);
mysql_select_db($bd, $con);
if(isset($_POST["id"]))
{
	$vetor = mysql_fetch_row(mysql_query("SELECT * FROM questao WHERE id = '".$_POST["id"]."'"), MYSQL_ASSOC);
	$linha = 0;
}
else
{
	$tabela = mysql_query("SELECT * FROM questao");
	$linha = rand(1, mysql_num_rows($tabela)) - 1;
	$contador = -1;
	while(($vetor = mysql_fetch_row($tabela, MYSQL_ASSOC)))
	{
		$contador++;
		if($contador == $linha)
		break;
	}
}
mysql_close();
?>
<form name="form1" method="POST" action="teste_resposta.php"><input
	type="hidden" name="id" value="<?php echo $vetor['id']?>"> <br>
<table border="0" align="center" width="100%">
	<tr>
		<td width="80%"><?php echo $vetor['enunciado']?></td>
	</tr>
</table>
<table border="0" align="center" width="100%">
	<tr>
		<td><input type="radio" name="resposta" value="1">a) <?php echo $vetor['resposta_1']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="2">b) <?php echo $vetor['resposta_2']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="3">c) <?php echo $vetor['resposta_3']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="4">d) <?php echo $vetor['resposta_4']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="5">e) <?php echo $vetor['resposta_5']?></td>
	</tr>
	<tr>
	</tr>
</table>
<br>
<table border="0" align="center" width="100%">
	<tr>
		<td align="center"><input type="submit" value="Responder"> <input
			type="button" value="Pular Questão"
			onclick="location.href = 'teste_questao.php'"></td>
	</tr>
</table>
</form>
</body>
</html>
