<html>
<head>
<title>Lista de Assuntos</title>
</head>
<body>
<center>
<h3>Lista de Assuntos</h3>
</center>
<form name="form1" method="POST" action="assunto_editar.php">
<table border="0" align="center" width="60%">
<?php
include("config.php");
$sql = "SELECT nome,codigo FROM assunto ORDER BY nome";
$tabela = mysql_query($sql);
if(mysql_num_rows($tabela)== 0)
{
	?>
	<tr>
		<td align="center">Nao existe nenhum assunto cadastrado</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar assunto clique em Incluir Assunto.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Incluir Assunto"></td>
	</tr>

	<?php
}
?>
	<tr bgcolor="0x52AA">
		<td width="50%">Nome do Assunto</td>
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
			onclick="location.href = 'assunto_editar.php?codigo=<?php echo $codigo?>'">
		<input type="button" value="Excluir"
			onclick="location.href = 'assunto_excluir.php?codigo=<?php echo $codigo?>'">
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
			value="Cadastrar Assunto"></td>
</table>
</form>
</body>
</html>
