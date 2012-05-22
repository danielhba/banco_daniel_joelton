<html>
<head>
<title>Visualizar Usuário</title>
</head>
<body>
<center>
<h2>Visualizar Usuário</h2>
</center>
<form name="form1" method="POST">
<table align="center" width="100%">
<?php

if(isset($_GET["codigo"]))
{
	include("./config.php");
	$sql = 'SELECT * FROM usuario WHERE login = "'.$_GET["codigo"].'"';
	$con = mysql_connect($host,$log,$senha);
	$bd = mysql_select_db($bd,$con);
	$result = mysql_query($sql,$con);
	$vetor = mysql_fetch_array($result,MYSQL_ASSOC);
	if($vetor['tipo_usuario'] == 1) $vetor['tipo_usuario'] = "Administrador";
	if($vetor['tipo_usuario'] == 2) $vetor['tipo_usuario'] = "Professor";
	if($vetor['tipo_usuario'] == 3) $vetor['tipo_usuario'] = "Aluno";
	list($vetor['data_ano'], $vetor['data_mes'], $vetor['data_dia']) = explode('-', $vetor['data_nascimento']);
	mysql_close($con);
	?>
	<tr>
		<td width="50%" align="right">Login:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['login']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Tipo de usuário:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['tipo_usuario']?></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td width="50%" align="right">Nome:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['nome']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Data de nascimento:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['data_dia'] . "/". $vetor['data_mes']. "/". $vetor['data_ano'] ?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Email:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['email']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Telefone:</td>
		<td colspan="2" width="50%"><?php  echo "(" . $vetor['telefone_ddd'] . ") " . $vetor['telefone']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Celular 1:</td>
		<td colspan="2" width="50%"><?php  echo "(" . $vetor['celular_1_ddd'] . ") " . $vetor['celular_1']?></td>
	</tr>
	<?php
	if(!empty($vetor["celular_2_ddd"]) && !empty($vetor["celular_2"])) {
		?>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Celular 2:</td>
		<td colspan="2" width="50%"><?php  echo "(" . $vetor['celular_2_ddd'] . ") " . $vetor['celular_2']?></td>
	</tr>
	<?php
	}
	?>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Rua:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['end_rua']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Número:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['end_numero']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">CEP:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['end_cep']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Bairro:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['end_bairro']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Cidade:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['end_cidade']?></td>
	</tr>
		<tr>

	</tr>
	<tr>
		<td width="50%" align="right">Estado:</td>
		<td colspan="2" width="50%"><?php  echo $vetor['end_estado']?></td>
	</tr>
</table>
<br>
<table align="center" width="100%">
	<tr align="center">
		<td align="right"><input type="button" value="Editar"
			onclick="location.href ='usuario_editar.php?codigo=<?php echo $_GET['codigo']?>'">
		</td>

		<?php
}
?>
		<td align="left"><input type="button" value="Voltar"
			onclick="location.href = 'usuario_lista.php'"></td>
	</tr>
</table>
</form>
</body>
</html>
