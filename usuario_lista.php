<html>
<head>
<title>Lista de usuários</title>
</head>
<body>
<center>
<h3>Lista de usuários</h3>
</center>
<form name="form1" method="POST" action="usuario_editar.php">
<table border="0" align="center" width="60%">
<?php
include("config.php");
$con = mysql_connect($host, $log, $senha);
mysql_select_db($bd, $con);
$sql = "SELECT login, tipo_usuario, nome FROM usuario ORDER BY nome";
$tabela = mysql_query($sql);
if(mysql_num_rows($tabela)==0){
	?>
	<tr>
		<td align="center">Não há usuários cadastrados.</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar usuário clique em Cadastrar Usuário.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Cadastrar Usuário"></td>
	</tr>
	<?php
	exit;
}
?>
	<tr bgcolor="0x52AA">
		<td width="40%">
		<center>Nome</center>
		</td>
		<td width="20%">
		<center>Login</center>
		</td>
		<td width="20%">
		<center>Tipo</center>
		</td>
		<td width="40%">
		<center>Opções</center>
		</td>
	</tr>
	<?php
	while($dados = mysql_fetch_row($tabela)){
		$nome = $dados[2];
		$login = $dados[0];
		if($dados[1] == 1) $tipo = "Administrador";
		if($dados[1] == 2) $tipo = "Professor";
		if($dados[1] == 3) $tipo = "Aluno";
		?>
	<tr>
		<td align="left"><?php echo $nome?></td>
		<td align="center"><?php echo $login?></td>
		<td align="center"><?php echo $tipo?></td>
		<td align="center"><input type="button" value="Excluir"
			onclick="location.href = 'usuario_excluir.php?codigo=<?php echo $login?>'">
		<input type="button" value="Editar"
			onclick="location.href = 'usuario_editar.php?codigo=<?php echo $login?>'">
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
			value="Cadastrar Usuário"></td>
	</tr>
</table>
</form>
</body>
</html>