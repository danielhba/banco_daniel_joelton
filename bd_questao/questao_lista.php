<html>
<head>
<title>Lista de Questões</title>
</head>
<body>
<center>
<h3>Lista de Questões</h3>
<form name="form1" method="POST" action="questao_editar.php">
<table border="0" align="center" width="80%">
<?php
include("config.php");
$con = mysql_connect($host, $log, $senha);
mysql_select_db($bd, $con);
$sql = "SELECT id, enunciado, dificuldade, cod_area FROM questao ORDER BY enunciado";
$tabela = mysql_query($sql);
if(mysql_num_rows($tabela)==0){
	?>
	<tr>
		<td align="center">Não há questões cadastradas.</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar questão clique em Cadastrar Questão.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Cadastrar Questão"></td>
	</tr>
	<?php
	exit;
}
?>
	<tr bgcolor="0x52AA">
		<td width="40%">
		<center>Enunciado</center>
		</td>
		<td width="10%">
		<center>Dificuldade</center>
		</td>
		<td width="20%">
		<center>Área</center>
		</td>
		<td width="40%">
		<center>Opções</center>
		</td>
	</tr>
	<?php
	while($dados = mysql_fetch_row($tabela)){
		$id				= $dados[0];
		$enunciado		= $dados[1];
		$dificuldade	= $dados[2];
		$sql = mysql_query("SELECT nome FROM area WHERE codigo = '".$dados[3]."'");
		$area = mysql_result($sql, 0, 0);
		?>
	<tr align="center">
		<td align="left"><?php echo $enunciado?></td>
		<td align="center"><?php echo $dificuldade?></td>
		<td align="center"><?php echo $area?></td>
		<td align="center"><input type="button" value="Visualizar"
			onclick="location.href ='questao_visualizar.php?codigo=<?php echo $id?>'"><input
			type="button" value="Editar"
			onclick="location.href = 'questao_editar.php?codigo=<?php echo $id?>'">
		<input type="button" value="Excluir"
			onclick="location.href = 'questao_excluir.php?codigo=<?php echo $id?>'">
		</td>
	</tr>
	<?php
	}
	?>
	<tr bgcolor="0x52AA">
		<td colspan="4" height="5"></td>
	</tr>
	<?php
	mysql_close($con);
	?>
	<tr>
		<td colspan="4" align="center"><input type="submit"
			value="Cadastrar Questão"></td>
	</tr>
</table>
</form>

</body>
</html>
