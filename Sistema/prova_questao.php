<html>
<head>
<title>Avaliação</title>
</head>
<body>
<center>
<h3>Avaliação</h3>
</center>
<form name="form1" method="POST" action="prova_resposta.php"><br>
<?php
$questao_quantidade = 5;?>
<input type="hidden" name="quantidade"
	value="<?php echo $questao_quantidade?>"> <br>
<?php
include("config.php");
for($i = 1; $i <= $questao_quantidade; $i++){
	$con = mysql_connect($host, $log, $senha);
	$tabela = mysql_query("SELECT * FROM questao");
	$linha = rand(1, mysql_num_rows($tabela)) - 1;
	$contador = -1;
	while(($vetor = mysql_fetch_row($tabela, MYSQL_ASSOC)))
	{
		$contador++;
		if($contador == $linha)
		break;
	}
	?> <input type="hidden" name="id<?php echo $i?>"
	value="<?php echo $vetor['id']?>"> <br>

<table border="0" align="center" width="100%">
	<tr>
		<td width="80%"><?php echo $i. "º) ". $vetor['enunciado']?></td>
	</tr>
</table>
<table border="0" align="center" width="100%">
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="1">a) <?php echo $vetor['resposta_1']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="2">b) <?php echo $vetor['resposta_2']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="3">c) <?php echo $vetor['resposta_3']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="4">d) <?php echo $vetor['resposta_4']?></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="5">e) <?php echo $vetor['resposta_5']?></td>
	</tr>
	<tr>
	</tr>
</table>
	<?php
}
mysql_close();
?> <br>
<table border="0" align="center" width="100%">
	<tr>
		<td align="center"><input type="submit" value="Finalizar Prova"> <input
			type="button" value="Gerar outra prova"
			onclick="location.href = 'prova_questao.php'"></td>
	</tr>
</table>
</form>
</body>
</html>