<html>
<head>
<title>Incluir/Editar Contato</title>
</head>
<body>

<?php
if(isset($_POST["validar"]))
{

	$error = false;
	if(isset($error_login)) unset($error_login);
	if(isset($error_senha)) unset($error_senha);
	if(isset($error_nome)) unset($error_nome);
	if(isset($error_data)) unset($error_data);
	if(isset($error_email)) unset($error_email);
	if(isset($error_telefone)) unset($error_telefone);
	if(isset($error_celular_1)) unset($error_celular_1);
	if(isset($error_celular_2)) unset($error_celular_2);
	if(isset($error_rua)) unset($error_rua);
	if(isset($error_numero)) unset($error_numero);
	if(isset($error_cep)) unset($error_cep);
	if(isset($error_bairro)) unset($error_bairro);
	if(isset($error_cidade)) unset($error_cidade);
	if(isset($error_estado)) unset($error_estado);

	$login 			= trim($_POST['login']);
	$senha1			= trim($_POST['senha1']);
	$senha2			= trim($_POST['senha2']);
	$nome 			= trim($_POST['nome']);
	$data_dia		= trim($_POST['data_dia']);
	$data_mes		= trim($_POST['data_mes']);
	$data_ano		= trim($_POST['data_ano']);
	$email			= trim($_POST['email']);
	$telefone_ddd 	= trim($_POST['telefone_ddd']);
	$telefone 		= trim($_POST['telefone']);
	$celular_1_ddd 	= trim($_POST['celular_1_ddd']);
	$celular_1 		= trim($_POST['celular_1']);
	$celular_2_ddd 	= trim($_POST['celular_2_ddd']);
	$celular_2 		= trim($_POST['celular_2']);
	$rua			= trim($_POST['end_rua']);
	$numero			= trim($_POST['end_numero']);
	$complemento    = trim($_POST['end_complemento']);
	$bairro			= trim($_POST['end_bairro']);
	$cep			= trim($_POST['end_cep']);
	$cidade			= trim($_POST['end_cidade']);
	$estado			= trim($_POST['end_estado']);

	//Valida��o de Login
	if(empty($login))
	{
		$error = true;
		$error_login = '<br><font color = "red">Informe o login.</font>';
	}
	else
	{
		include("./config.php");
		$sql = "SELECT login FROM usuario WHERE login ='".$login."'";
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1)
		{
			if(isset($_POST["codigo"]))
			{
				if(trim($_POST["codigo"]) != $login)
				{
					$error = true;
					$error_login = '<br><font color = "red">Este login j� est� cadastrado. Digite outro.</font>';

				}
			}
			else
			{
				$error = true;
				$error_login = '<br><font color = "red">Este login j� est� cadastrado. Digite outro.</font>';
			}
		}
		mysql_close($con);
	}

	//Valida��o de Senha
	if(empty($senha1))
	{
		$error = true;
		$error_senha = '<br><font color = "red">Informe a senha.</font>';
	}
	else if(empty($senha2))
	{
		$error = true;
		$error_senha = '<br><font color = "red">Confirme a senha.</font>';
	}
	else if($senha1 != $senha2){
		$error = true;
		$error_senha = '<br><font color = "red">As senhas s�o diferentes. Confirme novamente</font>';
	}

	//Valida��o de Nome
	if(empty($nome))
	{
		$error = true;
		$error_nome = '<br><font color = "red">Informe o nome.</font>';
	}

	//Valida email
	if(empty($email))
	{
		$error = true;
		$error_email = '<br><font color = "red">Informe o email.</font>';
	}
	else
	{
	 $pattern = "/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})(?::\d++)?$/iD";
	 if(!preg_match($pattern, $email))
	 {
	 	$error = true;
	 	$error_email = '<br><font color = "red">Digite um email v�lido.</font>';
		}
	}

	//Valida��o de Telefone
	if(empty($telefone_ddd))
	{
		$error = true;
		$error_telefone = '<br><font color = "red">Informe o DDD.</font>';
	}
	else if(($telefone_ddd >= 100) || ($telefone_ddd <= 9))
	{
		$error = true;
		$error_telefone = '<br><font color = "red">Informe um n�mero de DDD v�lido.</font>';
	}
	if(empty($telefone))
	{
		$error = true;
		if(isset($error_telefone))
		{
			$error_telefone .= '<br><font color = "red">Informe o telefone.</font>';
		}
		else
		{
			$error_telefone = '<br><font color = "red">Informe o telefone.</font>';
		}
	}
	else if($telefone <= 10000000)
	{
		$error = true;
		if(isset($error_telefone))
		{
			$error_telefone .= '<br><font color = "red">Informe um n�mero de telefone v�lido.</font>';
		}
		else
		{
			$error_telefone = '<br><font color = "red">Informe um n�mero de telefone v�lido.</font>';
		}
	}

	//Valida��o de Celular 1
	if(empty($celular_1_ddd))
	{
		$error = true;
		$error_celular_1 = '<br><font color = "red">Informe o DDD.</font>';
	}
	else if(($celular_1_ddd >= 100) || ($celular_1_ddd <= 9))
	{
		$error = true;
		$error_celular_1 = '<br><font color = "red">Informe um n�mero de DDD v�lido.</font>';
	}
	if(empty($celular_1))
	{
		$error = true;
		if(isset($error_celular_1))
		{
			$error_celular_1 .= '<br><font color = "red">Informe o telefone.</font>';
		}
		else
		{
			$error_celular_1 = '<br><font color = "red">Informe o telefone.</font>';
		}
	}
	else if($celular_1 <= 10000000)
	{
		$error = true;
		if(isset($error_celular_1))
		{
			$error_celular_1 .= '<br><font color = "red">Informe um n�mero de telefone v�lido.</font>';
		}
		else
		{
			$error_celular_1 = '<br><font color = "red">Informe um n�mero de telefone v�lido.</font>';
		}
	}

	//Valida��o de Celular 2
	if(!empty($celular_2_ddd))
	if(($celular_2_ddd >= 100) || ($celular_2_ddd <= 9))
	{
		$error = true;
		$error_celular_2 = '<br><font color = "red">Informe um n�mero de DDD v�lido.</font>';
	}
	if(!empty($celular_2))
	if($celular_2 <= 10000000)
	{
		$error = true;
		if(isset($error_celular_2))
		{
			$error_celular_2 .= '<br><font color = "red">Informe um n�mero de telefone v�lido.</font>';
		}
		else
		{
			$error_celular_2 = '<br><font color = "red">Informe um n�mero de telefone v�lido.</font>';
		}
	}
	if(empty($celular_2) xor empty($celular_2_ddd))
	{
		$error = true;
		if(isset($error_celular_2))
		{
			$error_celular_2 .= '<br><font color = "red">Ao informa o n�mero do celular, deve ser informado o ddd e o n�mero do celular.</font>';
		}
		else
		{
			$error_celular_2 = '<br><font color = "red">Ao informa o n�mero do celular, deve ser informado o ddd e o n�mero do celular.</font>';
		}
	}

	//Verifica se houve erros de vaalida��o
	if ($error == false)
	{
		include("./config.php");
		$con = mysql_connect($host, $login, $senha);
		mysql_select_db("agenda", $con);

		if (isset($_POST["codigo"]))
		{
			$sql = "SELECT codigo FROM dados_pessoais WHERE codigo =" . $_POST["codigo"];
			$result = mysql_query($sql, $con);
			if(mysql_num_rows($result) != 0)
			$sql = "UPDATE dados_pessoais SET nome = '".$nome."',
		ddd = ".$ddd.",
		telefone = ".$telefone." WHERE codigo = ".$_POST["codigo"];

		}
		else{
			$sql = "INSERT INTO dados_pessoais VALUES(
				'',
				'".$nome."',
				'".$ddd."',
				'".$telefone."')";
			mysql_query($sql, $con);
			mysql_close($con);
		}

		mysql_query($sql, $con);
		mysql_close($con);
		unset($error);
		header("location: ./agenda_index.php");
	}
	else
	{
		if (isset($_POST["codigo"]))
		{
			$_GET['codigo'] = $_POST['codigo'];
		}
		$vetor['login'] 			= $login;
		$vetor['senha']				= $senha1;
		$vetor['nome'] 				= $nome;
		$vetor['data_dia']			= $data_dia;
		$vetor['data_mes']			= $data_mes;
		$vetor['data_ano']			= $data_ano;
		$vetor['email']				= $email;
		$vetor['telefone_ddd'] 		= $telefone_ddd;
		$vetor['telefone']			= $telefone;
		$vetor['celular_1_ddd'] 	= $celular_1_ddd;
		$vetor['celular_1']			= $celular_1;
		$vetor['celular_2_ddd']		= $celular_2_ddd;
		$vetor['celular_2']			= $celular_2;
		$vetor['end_rua']			= $rua;
		$vetor['end_numero'] 		= $numero;
		$vetor['end_cep'] 			= $cep;
		$vetor['end_bairro'] 		= $bairro;
		$vetor['end_cidade'] 		= $cidade;
		$vetor['end_estado'] 		= $estado;
		$vetor['end_complemento'] 	= $complemento;
	}
	unset($_POST["validar"]);
}
?>
<?php
if(isset($_GET["codigo"])){
	if (!isset($error)){
		include("./config.php");
		$sql = "SELECT * FROM usuario WHERE login = '".$_GET["codigo"]."'";
		$result = mysql_query($sql);
		$vetor = mysql_fetch_array($result,MYSQL_ASSOC);
		mysql_close($con);
	}
}
if (!isset($vetor['login'])) $vetor['login']  = '';
if (!isset($vetor['tipo_usuario'])) $vetor['tipo_usuario'] = '';
if (!isset($vetor['senha'])) $vetor['senha'] = '';
if (!isset($vetor['nome'])) $vetor['nome'] = '';

if (!isset($vetor['data_nascimento'])) $vetor['data_nascimento'] = '';
else list($vetor['data_ano'], $vetor['data_mes'], $vetor['data_dia']) = explode('-', $vetor['data_nascimento']);
if (!isset($vetor['data_dia'])) $vetor['data_dia'] = '';
if (!isset($vetor['data_mes'])) $vetor['data_mes'] = '';
if (!isset($vetor['data_ano'])) $vetor['data_ano'] = '';

if (!isset($vetor['email'])) $vetor['email'] = '';
if (!isset($vetor['telefone_ddd'])) $vetor['telefone_ddd'] = '';
if (!isset($vetor['telefone'])) $vetor['telefone'] = '';
if (!isset($vetor['celular_1_ddd'])) $vetor['celular_1_ddd'] = '';
if (!isset($vetor['celular_1'])) $vetor['celular_1'] = '';
if (!isset($vetor['celular_2_ddd'])) $vetor['celular_2_ddd'] = '';
if (!isset($vetor['celular_2'])) $vetor['celular_2'] = '';
if (!isset($vetor['end_rua'])) $vetor['end_rua'] = '';
if (!isset($vetor['end_numero'])) $vetor['end_numero'] = '';
if (!isset($vetor['end_cep'])) $vetor['end_cep'] = '';
if (!isset($vetor['end_bairro'])) $vetor['end_bairro'] = '';
if (!isset($vetor['end_cidade'])) $vetor['end_cidade'] = '';
if (!isset($vetor['end_estado'])) $vetor['end_estado'] = '';
if (!isset($vetor['end_complemento'])) $vetor['end_complemento'] = '';
?>
<center>
<h3><?php
if(isset($_GET["codigo"]))
echo "Editar Usu�rio";
else echo "Cadastrar Usu�rio";
?></h3>
</center>
<form name="form1" method="POST" action="usuario_editar.php"><?php
if(isset($_GET["codigo"])){?><input type="hidden" name="codigo"
	value="<?php echo $_GET["codigo"]?>"> <?php 
}?> <input type="hidden" name="validar" value="ok">
<table border="0" align="center" width="60%">
<?php
//LOGIN
if(isset($error_login)){
	?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_login?></td>
	</tr>
	<?php
}
?>
	<tr>
		<td width="40%" align="right">* Login:</td>
		<td colspan="2" width="30%"><input type="text" name="login"
			value="<?php echo $vetor['login']?>" maxlength="25" size="25"></td>
	</tr>
	<?php
	//SENHA
	if(isset($error_senha)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_senha ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Senha:</td>
		<td colspan="2" width="60%"><input type="password" " name="senha1"
			value="<?php echo $vetor['senha']?>" maxlength=25 " size="25"></td>
	</tr>
	<tr>
		<td width="40%" align="right">* Confirma��o de Senha:</td>
		<td colspan="2" width="60%"><input type="password" " name="senha2"
			maxlength="25" size="25"></td>
	</tr>
	<?php
	//NOME
	if(isset($error_nome)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_nome ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Nome:</td>
		<td colspan="2" width="60%"><input type="text" name="nome"
			value="<?php echo $vetor['nome']?>" maxlength="50" size="50"></td>
	</tr>
	<?php
	//DATA NASCIMENTO
	if(isset($error_data)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_data ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Data de Nasccimento:</td>
		<td width="60%"><input type="text" name="data_dia"
			value="<?php echo $vetor['data_dia']?>" maxlength="2" size="2"> / <input
			type="text" name="data_mes" value="<?php echo $vetor['data_mes']?>"
			maxlength="2" size="2">/ <input type="text" name="data_ano"
			value="<?php echo $vetor['data_ano']?>" maxlength="4" size="4"></td>
	</tr>
	<?php
	//EMAIL
	if(isset($error_email)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_email ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* E-mail:</td>
		<td colspan="2" width="60%"><input type="text" name="email"
			value="<?php echo $vetor['email']?>" maxlength="50" size="50"></td>
	</tr>
	<?php
	//TELEFONE
	if(isset($error_telefone)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_telefone ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Telefone:</td>
		<td width="60%"><input type="text" name="telefone_ddd"
			value="<?php echo $vetor['telefone_ddd']?>" maxlength="2" size="3"> <input
			type="text" name="telefone" value="<?php echo $vetor['telefone']?>"
			maxlength="8" size="9"></td>
	</tr>
	<?php
	//CELULAR 1
	if(isset($error_celular_1)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_celular_1 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Celular 1:</td>
		<td width="60%"><input type="text" name="celular_1_ddd"
			value="<?php echo $vetor['celular_1_ddd']?>" maxlength="2" size="3">
		<input type="text" name="celular_1"
			value="<?php echo $vetor['celular_1']?>" maxlength="8" size="9"></td>
	</tr>
	<?php
	//CELULAR 2
	if(isset($error_celular_2)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_celular_2 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">Celular 2:</td>
		<td width="60%"><input type="text" name="celular_2_ddd"
			value="<?php echo $vetor['celular_2_ddd']?>" maxlength="2" size="3">
		<input type="text" name="celular_2"
			value="<?php echo $vetor['celular_2']?>" maxlength="8" size="9"></td>
	</tr>
	<?php
	//RUA
	if(isset($error_rua)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_rua ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Rua:</td>
		<td colspan="2" width="60%"><input type="text" name="end_rua"
			value="<?php echo $vetor['end_rua']?>" maxlength="50" size="50"></td>
	</tr>
	<?php
	//N�MERO
	if(isset($error_numero)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_nummero ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">Numero:</td>
		<td colspan="2" width="60%"><input type="text" name="end_numero"
			value="<?php echo $vetor['end_numero']?>" maxlength="5" size="5"></td>
	</tr>
	<tr>
		<td width="40%" align="right">Complemento:</td>
		<td colspan="2" width="60%"><input type="text" name="end_complemento"
			value="<?php echo $vetor['end_complemento']?>" maxlength="50"
			size="50"></td>
	</tr>
	<?php
	//COMPLEMENTO
	?>
	<?php
	//CEP
	if(isset($error_cep)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_cep ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* CEP:</td>
		<td colspan="2" width="60%"><input type="text" name="end_cep"
			value="<?php echo $vetor['end_cep']?>" maxlength="8" size="8"></td>
	</tr>
	<?php
	//BAIRRO
	if(isset($error_bairro)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_bairro ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Bairro:</td>
		<td colspan="2" width="60%"><input type="text" name="end_bairro"
			value="<?php echo $vetor['end_bairro']?>" maxlength="50" size="50"></td>
	</tr>
	<?php
	//CIDADE
	if(isset($error_cidade)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_cidade ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Cidade:</td>
		<td colspan="2" width="60%"><input type="text" name="end_cidade"
			value="<?php echo $vetor['end_cidade']?>" maxlength="50" size="50"></td>
	</tr>
	<?php
	//ESTADO
	if(isset($error_estado)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_estado ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Estado:</td>
		<td colspan="2" width="60%"><select Name="end_estado">
			<option value="none"
			<?php if ($vetor["end_estado"] == "") echo 'selected="selected"' ?>></option>
			<option value="AL"
			<?php if ($vetor["end_estado"] == "AL") echo 'selected="selected"' ?>>AL</option>
			<option value="AM"
			<?php if ($vetor["end_estado"] == "AM") echo 'selected="selected"' ?>>AM</option>
			<option value="AP"
			<?php if ($vetor["end_estado"] == "AP") echo 'selected="selected"' ?>>AP</option>
			<option value="BA"
			<?php if ($vetor["end_estado"] == "BA") echo 'selected="selected"' ?>>BA</option>
			<option value="CE"
			<?php if ($vetor["end_estado"] == "CE") echo 'selected="selected"' ?>>CE</option>
			<option value="DF"
			<?php if ($vetor["end_estado"] == "DF") echo 'selected="selected"' ?>>DF</option>
			<option value="ES"
			<?php if ($vetor["end_estado"] == "ES") echo 'selected="selected"' ?>>ES</option>
			<option value="GO"
			<?php if ($vetor["end_estado"] == "GO") echo 'selected="selected"' ?>>GO</option>
			<option value="MA"
			<?php if ($vetor["end_estado"] == "MA") echo 'selected="selected"' ?>>MA</option>
			<option value="MG"
			<?php if ($vetor["end_estado"] == "MG") echo 'selected="selected"' ?>>MG</option>
			<option value="MS"
			<?php if ($vetor["end_estado"] == "MS") echo 'selected="selected"' ?>>MS</option>
			<option value="MT"
			<?php if ($vetor["end_estado"] == "MT") echo 'selected="selected"' ?>>MT</option>
			<option value="PA"
			<?php if ($vetor["end_estado"] == "PA") echo 'selected="selected"' ?>>PA</option>
			<option value="PB"
			<?php if ($vetor["end_estado"] == "PB") echo 'selected="selected"' ?>>PB</option>
			<option value="PE"
			<?php if ($vetor["end_estado"] == "PE") echo 'selected="selected"' ?>>PE</option>
			<option value="PI"
			<?php if ($vetor["end_estado"] == "PI") echo 'selected="selected"' ?>>PI</option>
			<option value="PR"
			<?php if ($vetor["end_estado"] == "PR") echo 'selected="selected"' ?>>PR</option>
			<option value="RJ"
			<?php if ($vetor["end_estado"] == "RJ") echo 'selected="selected"' ?>>RJ</option>
			<option value="RO"
			<?php if ($vetor["end_estado"] == "RO") echo 'selected="selected"' ?>>RO</option>
			<option value="RR"
			<?php if ($vetor["end_estado"] == "RR") echo 'selected="selected"' ?>>RR</option>
			<option value="RN"
			<?php if ($vetor["end_estado"] == "RN") echo 'selected="selected"' ?>>RN</option>
			<option value="RS"
			<?php if ($vetor["end_estado"] == "RS") echo 'selected="selected"' ?>>RS</option>
			<option value="SC"
			<?php if ($vetor["end_estado"] == "SC") echo 'selected="selected"' ?>>SC</option>
			<option value="SE"
			<?php if ($vetor["end_estado"] == "SE") echo 'selected="selected"' ?>>SE</option>
			<option value="SP"
			<?php if ($vetor["end_estado"] == "SP") echo 'selected="selected"' ?>>SP</option>
			<option value="TO"
			<?php if ($vetor["end_estado"] == "TO") echo 'selected="selected"' ?>>TO</option>
		</select>
	
	</tr>
	<tr>
		<td colspan="3" align="center"><input type="button" value="Cancelar"
			onclick="location.href='usuario_lista.php'"> <input type="submit"
			value="Gravar"></td>
	</tr>
</table>
</form>
</body>
</html>
