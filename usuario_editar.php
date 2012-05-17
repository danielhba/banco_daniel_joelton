<html>
<head>
<title><?php echo (isset($_GET["codigo"]) || isset($_POST["codigo"])) ? "Editar Usuário": "Cadastrar Usuário";?></title>
</head>
<body>

<?php
if(isset($_POST["validar"]))
{

	$error = false;
	if(isset($error_login)) unset($error_login);
	if(isset($error_tipo_usuario)) unset($error_tipo_usuario);
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

	$login 			= strtolower(trim($_POST['login']));
	$tipo_usuario   = trim($_POST['tipo_usuario']);
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

	//Validação de Login
	if(empty($login))
	{
		$error = true;
		$error_login = '<font color = "red">Informe o login.</font>';
	}

	if($tipo_usuario == 'none')
	{
		$error = true;
		$error_tipo_usuario = '<font color = "red">Informe o Tipo de usuário.</font>';
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
					echo "já existe";
					$error = true;
					$error_login = '<font color = "red">Este login já está cadastrado. Digite outro.</font>';
				}
			}
			else
			{
				echo "error";
				$error = true;
				$error_login = '<font color = "red">Este login já está cadastrado. Digite outro.</font>';
			}
		}
		mysql_close($con);
	}

	//Validação de Nome
	if(empty($nome))
	{
		$error = true;
		$error_nome = '<font color = "red">Informe o nome.</font>';
	}

	if(empty($data_dia))
	{
		$error = true;
		$error_data = '<font color = "red">Informe o dia.</font>';
	}
	if(empty($data_mes))
	{
		$error = true;
		if(isset($error_data))
		{
			$error_data .= '<br><font color = "red">Informe o mês.</font>';
		}
		else
		{
			$error_data = '<font color = "red">Informe o mês.</font>';
		}
	}
	if(empty($data_ano))
	{
		$error = true;
		if(isset($error_data))
		{
			$error_data .= '<br><font color = "red">Informe o ano.</font>';
		}
		else
		{
			$error_data = '<font color = "red">Informe o ano.</font>';
		}
	}
	if(!empty($data_ano) && !empty($data_mes) && !empty($data_ano))
	{
		if(!checkdate($data_mes, $data_dia, $data_ano))
		{
			$error = true;
			$error_data = '<font color = "red">Informe uma data de nascimento válida.</font>';
		}
	}

	//Valida email
	if(empty($email))
	{
		$error = true;
		$error_email = '<font color = "red">Informe o email.</font>';
	}
	else
	{
	 $pattern = "/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})(?::\d++)?$/iD";
	 if(!preg_match($pattern, $email))
	 {
	 	$error = true;
	 	$error_email = '<font color = "red">Digite um email válido.</font>';
		}
	}

	//Validação de Telefone
	if(empty($telefone_ddd))
	{
		$error = true;
		$error_telefone = '<font color = "red">Informe o DDD.</font>';
	}
	else if(($telefone_ddd >= 100) || ($telefone_ddd <= 9))
	{
		$error = true;
		$error_telefone = '<font color = "red">Informe um número de DDD válido.</font>';
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
			$error_telefone = '<font color = "red">Informe o telefone.</font>';
		}
	}
	else if($telefone <= 10000000)
	{
		$error = true;
		if(isset($error_telefone))
		{
			$error_telefone .= '<br><font color = "red">Informe um número de telefone válido.</font>';
		}
		else
		{
			$error_telefone = '<font color = "red">Informe um número de telefone válido.</font>';
		}
	}

	//Validação de Celular 1
	if(empty($celular_1_ddd))
	{
		$error = true;
		$error_celular_1 = '<br><font color = "red">Informe o DDD.</font>';
	}
	else if(($celular_1_ddd >= 100) || ($celular_1_ddd <= 9))
	{
		$error = true;
		$error_celular_1 = '<br><font color = "red">Informe um número de DDD válido.</font>';
	}
	if(empty($celular_1))
	{
		$error = true;
		if(isset($error_celular_1))
		{
			$error_celular_1 .= '<font color = "red">Informe o telefone.</font>';
		}
		else
		{
			$error_celular_1 = '<font color = "red">Informe o telefone.</font>';
		}
	}
	else if($celular_1 <= 10000000)
	{
		$error = true;
		if(isset($error_celular_1))
		{
			$error_celular_1 .= '<br><font color = "red">Informe um número de telefone válido.</font>';
		}
		else
		{
			$error_celular_1 = '<font color = "red">Informe um número de telefone válido.</font>';
		}
	}

	//Validação de Celular 2
	if(!empty($celular_2_ddd))
	if(($celular_2_ddd >= 100) || ($celular_2_ddd <= 9))
	{
		$error = true;
		$error_celular_2 = '<font color = "red">Informe um número de DDD válido.</font>';
	}
	if(!empty($celular_2))
	if($celular_2 <= 10000000)
	{
		$error = true;
		if(isset($error_celular_2))
		{
			$error_celular_2 .= '<br><font color = "red">Informe um número de telefone válido.</font>';
		}
		else
		{
			$error_celular_2 = '<font color = "red">Informe um número de telefone válido.</font>';
		}
	}
	if(empty($celular_2) xor empty($celular_2_ddd))
	{
		$error = true;
		if(isset($error_celular_2))
		{
			$error_celular_2 .= '<br><font color = "red">Ao informa o número do celular, deve ser informado o ddd e o número do celular.</font>';
		}
		else
		{
			$error_celular_2 = '<font color = "red">Ao informa o número do celular, deve ser informado o ddd e o número do celular.</font>';
		}
	}

	//Validação de Endereço
	if(empty($rua))
	{
		$error = true;
		$error_rua = '<font color = "red">Informe o endereço.</font>';
	}
	if(empty($bairro))
	{
		$error = true;
		$error_bairro = '<font color = "red">Informe o bairro.</font>';
	}
	if(empty($cep))
	{
		$error = true;
		$error_cep = '<font color = "red">Informe o CEP.</font>';
	}
	else if($cep < 10000000)
	{
		$error = true;
		$error_cep = '<font color = "red">Informe um número de CEP válido.</font>';
	}
	if(empty($cidade))
	{
		$error = true;
		$error_cidade = '<font color = "red">Informe a cidade.</font>';
	}

	if($estado == 'none')
	{
		$error = true;
		$error_estado = '<font color = "red">Informe o Estado.</font>';
	}


	//Verifica se houve erros de vaalidação
	if ($error == false)
	{
		$data_nascimento = $data_ano ."-".$data_mes."-".$data_dia;
		$data_sistema = 20 . date("y-m-d");
		$hora_sistema = date("H:i:s");

		include("./config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);

		if (isset($_POST["codigo"]))
		{
			$sql = "SELECT login FROM usuario WHERE login ='".$_POST["codigo"]."'";
			$result = mysql_query($sql, $con);
			if(mysql_num_rows($result) != 0)

			$sql = "UPDATE usuario SET
					login = '".$login."',
					tipo_usuario = '".$tipo_usuario."',
					nome  = '".$nome."',
					data_nascimento = '".$data_nascimento."', 
					email = '".$email."',
					telefone_ddd = '".$telefone_ddd."',
					telefone = '".$telefone."',
					celular_1_ddd = '".$celular_1_ddd."',
					celular_1 = '".$celular_1."',
					celular_2_ddd = '".$celular_2_ddd."',
					end_rua  = '".$rua."',
					end_numero = '".$numero."', 
					end_cep = '".$cep."',
					end_bairro = '".$bairro."',
					end_cidade = '".$cidade."',
					end_estado = '".$estado."',
					end_complemento = '".$complemento."',
					data_cadastro = '".$data_sistema."',
					hora_cadastro = '".$hora_sistema."' WHERE login ='".$_POST["codigo"]."'";
			mysql_query($sql, $con);
			mysql_close($con);
		}
		else{
			$sql = "INSERT INTO usuario VALUES(
				'".$login."',
				'danielhba',
				'".$tipo_usuario."',
				'".$login."',
				'".$nome."',
				'".$data_nascimento."',
				'".$email."',
				'".$telefone_ddd."',
				'".$telefone."',
				'".$celular_1_ddd."',
				'".$celular_1."',
				'".$celular_2_ddd."',
				'".$celular_2."',
				'".$rua."',
				'".$numero."',
				'".$cep."',
				'".$bairro."',
				'".$cidade."',
				'".$estado."',
				'".$complemento."',
				'".$data_sistema."',
				'".$hora_sistema."')";
			mysql_query($sql, $con);
			mysql_close($con);
		}
		unset($error);
		?>

<center>
<h2><?php echo isset($_POST['codigo']) ?  "Edição de usuário" : "Cadastro de usuário";?></h2>
</center>

<center>
<h3><?php echo isset($_POST['codigo']) ?  "Confirmação de edição" : "Confirmação de cadastro";?></h3>
</center>

<center><?php echo isset($_POST['codigo']) ?  "Edição realizada com sucesso!" : "Cadastro realizado com sucesso!";?></center>

<table border="0" align="center" width="35%">
	<tr>

		<td>
		<center><input type="button" value="Voltar para a lista de usuários"
			onclick="location.href = 'usuario_lista.php'"></center>
		</td>
	</tr>
</table>
		<?php
		exit;
	}
	else
	{
		if(isset($_POST['codigo']))
		{
			$_GET['codigo'] = $_POST['codigo'];
		}
		$vetor['login'] 			= $login;
		$vetor['tipo_usuario']		= $tipo_usuario;
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

if(isset($_GET["codigo"])){
	if (!isset($error)){
		include("./config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);
		$sql = "SELECT * FROM usuario WHERE login = '".$_GET["codigo"]."'";
		$result = mysql_query($sql);
		$vetor = mysql_fetch_array($result,MYSQL_ASSOC);
		mysql_close($con);
	}
}

if (!isset($vetor['login'])) $vetor['login']  = '';
if (!isset($vetor['tipo_usuario'])) $vetor['tipo_usuario'] = '';
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
<h3><?php echo isset($_GET["codigo"]) ? "Editar Usuário": "Cadastrar Usuário";?>
</h3>
</center>
<form name="form1" method="POST" action="usuario_editar.php"><?php
if(isset($_GET["codigo"])){?> <input type="hidden" name="codigo"
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
		<td width="40%" align="right"></td>
		<td colspan="2" width="30%"><font size="2">Conteudo do login será
		cadastrado em letras minúsculas.</font></td>
	</tr>
	<tr>
		<td width="40%" align="right">* Login:</td>
		<td colspan="2" width="30%"><input type="text" name="login"
			value="<?php echo $vetor['login']?>" maxlength="25" size="25"></td>
	</tr>
	<?php
	//ESTADO
	if(isset($error_tipo_usuario)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_tipo_usuario ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Tipo de usuário:</td>
		<td colspan="2" width="60%"><select Name="tipo_usuario">
			<option value="none"
			<?php if ($vetor["tipo_usuario"] == "") echo 'selected="selected"' ?>></option>
			<option value="1"
			<?php if ($vetor["tipo_usuario"] == "1") echo 'selected="selected"' ?>>Administrador</option>
			<option value="2"
			<?php if ($vetor["tipo_usuario"] == "2") echo 'selected="selected"' ?>>Professor</option>
			<option value="3"
			<?php if ($vetor["tipo_usuario"] == "3") echo 'selected="selected"' ?>>Aluno</option>
		</select>
	
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
	//NÚMERO
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
