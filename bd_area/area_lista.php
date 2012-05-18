<html>
<head>
<title>Lista de Áreas</title>
</head>
<body>
<center>
<h3>Lista de Áreas</h3>
</center>
<form name="form1" method="POST" action="area_editar.php">
<table border="0" align="center" width="60%">
<?php
include("config.php");
$sql = "SELECT nome,codigo FROM area ORDER BY nome";
$tabela = mysql_query($sql);
if(mysql_num_rows($tabela)== 0)
{
	?>
	<tr>
		<td align="center">Nao existe nenhuma área cadastrada</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar área clique em Cadastrar Área.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Cadastrar Área"></td>
	</tr>

	<?php
}
?>
	<tr bgcolor="0x52AA">
		<td width="50%">Nome Área</td>
		<td width="30%">
		<center>Opções</center>
		</td>
	</tr>
	<?php

	while($dados = mysql_fetch_row($tabela)){
		$codigo = $dados[1];
		$nome = $dados[0];
		?>
	<tr>

		<td align="left"><?php echo $nome?></td>
		<td align="center"><input type="button" value="Editar"
			onclick="location.href ='area_editar.php?codigo=<?php echo $codigo?>'">
		<input type="button" value="Excluir"
			onclick="location.href ='area_excluir.php?codigo=<?php echo $codigo?>'">
		</td>
	</tr>
	<?php
	}
	?>
	<tr bgcolor="grey">
		<td colspan="3" height="5"></td>
	</tr>
	<?php
	mysql_close($con);
	?>
	<tr>
		<td colspan="3" align="center"><input type="submit"
			value="Cadastrar Área"></td>
</table>
</form>
</body>
</html>
