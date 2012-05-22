<html>
<head>
<title>Visualizar Questão</title>
</head>
<body>
<center>
<h2>Visualizar Questão</h2>
</center>
<form name="form1" method="POST">
<table align="center" width="100%">
<?php

if(isset($_GET["codigo"]))
{
	include("./config.php");
	$sql = "SELECT * FROM questao WHERE id =".$_GET["codigo"];
	$con = mysql_connect($host,$log,$senha);
	$bd = mysql_select_db($bd,$con);
	$result = mysql_query($sql,$con);
	$vetor = mysql_fetch_array($result,MYSQL_ASSOC);
	$result = mysql_query('SELECT nome FROM area WHERE codigo ="'.$vetor['cod_area'].'"');
	$area = mysql_fetch_array($result);
	$result = mysql_query('SELECT nome FROM disciplina WHERE codigo ="'.$vetor['cod_disciplina'].'"');
	$disciplina = mysql_fetch_array($result);
	$result = mysql_query('SELECT nome FROM assunto WHERE codigo ="'.$vetor['cod_assunto'].'"');
	$assunto = mysql_fetch_array($result);
	mysql_close($con);
	?>
	<tr>
		<td width="50%" align="right">Área:</td>
		<td colspan="2" width="50%"><?php  echo $area[0]?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Disciplina:</td>
		<td colspan="2" width="50%"><?php  echo $disciplina[0]?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Assunto:</td>
		<td colspan="2" width="50%"><?php  echo $assunto[0]?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Nível de dificuldade:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['dificuldade']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Enunciado:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['enunciado']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Resposta 1:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['resposta_1']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Resposta 2:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['resposta_2']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Resposta 3:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['resposta_3']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Resposta 4:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['resposta_4']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Resposta 5:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['resposta_5']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Alternativa correta:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['alternativa_correta']?></td>
	</tr>
</table>
<br>
<table align="center" width="100%">
	<tr align="center">
		<td align="right"><input type="button" value="Editar"
			onclick="location.href ='questao_editar.php?codigo=<?php echo $_GET['codigo']?>'">
		</td>

		<?php
}
?>
		<td align="left"><input type="button" value="Voltar"
			onclick="location.href = 'questao_lista.php'"></td>
	</tr>
</table>
</form>
</body>
</html>