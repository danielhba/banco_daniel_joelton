<html>
<head>
<title><?php echo (isset($_GET["codigo"]) || isset($_POST["codigo"])) ? "Editar Questão": "Cadastrar Questão";?></title>
</head>
<body>

<?php
if(isset($_POST["validar"]))
{

	$error = false;
	if(isset($error_cod_area)) unset($error_cod_area);
	if(isset($error_cod_disciplina)) unset($error_cod_disciplina);
	if(isset($error_cod_assunto)) unset($error_cod_assunto);
	if(isset($error_dificuldade)) unset($error_dificuldade);
	if(isset($error_enunciado)) unset($error_enunciado);
	if(isset($error_resposta_1)) unset($error_resposta_1);
	if(isset($error_resposta_2)) unset($error_resposta_2);
	if(isset($error_resposta_3)) unset($error_resposta_3);
	if(isset($error_resposta_4)) unset($error_resposta_4);
	if(isset($error_resposta_5)) unset($error_resposta_5);
	if(isset($error_alternativa_correta)) unset($error_alternativa_correta);

	$cod_area				= strtolower(trim($_POST['cod_area']));
	$cod_disciplina			= trim($_POST['cod_disciplina']);
	$cod_assunto			= trim($_POST['cod_assunto']);
	$dificuldade			= trim($_POST['dificuldade']);
	$enunciado				= trim($_POST['enunciado']);
	$resposta_1				= trim($_POST['resposta_1']);
	$resposta_2				= trim($_POST['resposta_2']);
	$resposta_3				= trim($_POST['resposta_3']);
	$resposta_4				= trim($_POST['resposta_4']);
	$resposta_5 			= trim($_POST['resposta_5']);
	$alternativa_correta	= trim($_POST['alternativa_correta']);

	if($cod_area == 'none')
	{
		$error = true;
		$error_cod_area = '<font color = "red">Informe a área.</font>';
	}
	if($cod_disciplina == 'none')
	{
		$error = true;
		$error_cod_disciplina = '<font color = "red">Informe a disciplina.</font>';
	}
	if($cod_assunto == 'none')
	{
		$error = true;
		$error_cod_assunto = '<font color = "red">Informe o assunto.</font>';
	}
	if($dificuldade == 'none')
	{
		$error = true;
		$error_dificuldade = '<font color = "red">Informe o nível de dificuldade.</font>';
	}
	if($alternativa_correta == 'none')
	{
		$error = true;
		$error_alternativa_correta = '<font color = "red">Informe a alternativa correta.</font>';
	}
	if(empty($enunciado))
	{
		$error = true;
		$error_enunciado = '<font color = "red">Informe o enunciado da questão.</font>';
	}
	if(empty($resposta_1))
	{
		$error = true;
		$error_resposta_1 = '<font color = "red">Informe o enunciado da opção 1.</font>';
	}
	if(empty($resposta_2))
	{
		$error = true;
		$error_resposta_2 = '<font color = "red">Informe o enunciado da opção 2.</font>';
	}
	if(empty($resposta_3))
	{
		$error = true;
		$error_resposta_3 = '<font color = "red">Informe o enunciado da opção 3.</font>';
	}
	if(empty($resposta_4))
	{
		$error = true;
		$error_resposta_4 = '<font color = "red">Informe o enunciado da opção 4.</font>';
	}
	if(empty($resposta_5))
	{
		$error = true;
		$error_resposta_5 = '<font color = "red">Informe o enunciado da opção 5.</font>';
	}

	//Verifica se houve erros de vaalidação
	if ($error == false)
	{
		$data_sistema = 20 . date("y-m-d");
		$hora_sistema = date("H:i:s");

		include("./config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);

		if (isset($_POST["codigo"]))
		{
			$sql = "SELECT id FROM questao WHERE id ='".$_POST["codigo"]."'";
			$result = mysql_query($sql, $con);
			if(mysql_num_rows($result) != 0)

			$sql = "UPDATE questao SET
					cod_area = '".$cod_area."',
					cod_disciplina  = '".$cod_disciplina."',
					cod_assunto = '".$cod_assunto."', 
					dificuldade = '".$dificuldade."',
					enunciado = '".$enunciado."',
					resposta_1 = '".$resposta_1."',
					resposta_2 = '".$resposta_2."',
					resposta_3 = '".$resposta_3."',
					resposta_4 = '".$resposta_4."',
					resposta_5 = '".$resposta_5."',
					alternativa_correta = '".$alternativa_correta."', 
					data_cadastro = '".$data_sistema."',
					hora_cadastro = '".$hora_sistema."' WHERE id ='".$_POST["codigo"]."'";
			mysql_query($sql, $con);
			mysql_close($con);
		}
		else{
			$sql = "INSERT INTO questao VALUES(
				'',
				'danielhba',
				'".$cod_area."',
				'".$cod_disciplina."',
				'".$cod_assunto."',
				'".$dificuldade."',
				'".$enunciado."',
				'".$resposta_1."',
				'".$resposta_2."',
				'".$resposta_3."',
				'".$resposta_4."',
				'".$resposta_5."',
				'".$alternativa_correta."',
				'".$data_sistema."',
				'".$hora_sistema."')";
			mysql_query($sql, $con);
			mysql_close($con);
		}
		unset($error);
		?>

<center>
<h2><?php echo isset($_POST['codigo']) ?  "Edição de questão" : "Cadastro de questão";?></h2>
</center>

<center>
<h3><?php echo isset($_POST['codigo']) ?  "Confirmação de edição" : "Confirmação de cadastro";?></h3>
</center>

<center><?php echo isset($_POST['codigo']) ?  "Edição realizada com sucesso!" : "Cadastro realizado com sucesso!";?></center>

<table border="0" align="center" width="35%">
	<tr>

		<td>
		<center><input type="button" value="Voltar para a lista de usuários"
			onclick="location.href = 'questao_lista.php'"></center>
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
		$vetor['cod_area'] 				= $cod_area;
		$vetor['cod_disciplina'] 		= $cod_disciplina;
		$vetor['cod_assunto'] 			= $cod_assunto;
		$vetor['dificuldade'] 			= $dificuldade;
		$vetor['enunciado'] 			= $enunciado;
		$vetor['resposta_1'] 			= $resposta_1;
		$vetor['resposta_2'] 			= $resposta_2;
		$vetor['resposta_3'] 			= $resposta_3;
		$vetor['resposta_4'] 			= $resposta_4;
		$vetor['resposta_5'] 			= $resposta_5;
		$vetor['alternativa_correta']	= $alternativa_correta;
	}
	unset($_POST["validar"]);
}

if(isset($_GET["codigo"])){
	if (!isset($error)){
		include("./config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);
		$sql = "SELECT * FROM questao WHERE id = '".$_GET["codigo"]."'";
		$result = mysql_query($sql);
		$vetor = mysql_fetch_array($result, MYSQL_ASSOC);
		mysql_close($con);
	}
}

if (!isset($vetor['cod_area'])) $vetor['cod_area'] = '';
if (!isset($vetor['cod_disciplina'])) $vetor['cod_disciplina'] = '';
if (!isset($vetor['cod_assunto'])) $vetor['cod_assunto'] = '';
if (!isset($vetor['dificuldade'])) $vetor['dificuldade'] = '';
if (!isset($vetor['enunciado'])) $vetor['enunciado'] = '';
if (!isset($vetor['resposta_1'])) $vetor['resposta_1'] = '';
if (!isset($vetor['resposta_2'])) $vetor['resposta_2'] = '';
if (!isset($vetor['resposta_3'])) $vetor['resposta_3'] = '';
if (!isset($vetor['resposta_4'])) $vetor['resposta_4'] = '';
if (!isset($vetor['resposta_5'])) $vetor['resposta_5'] = '';
if (!isset($vetor['alternativa_correta'])) $vetor['alternativa_correta'] = '';
?>
<center>
<h3><?php echo isset($_GET["codigo"]) ? "Editar Questão": "Cadastrar Questão";?>
</h3>
</center>
<form name="form1" method="POST" action="questao_editar.php"><?php
if(isset($_GET["codigo"])){?> <input type="hidden" name="codigo"
	value="<?php echo $_GET["codigo"]?>"> <?php 
}?> <input type="hidden" name="validar" value="ok">
<table border="0" align="center" width="60%">

<?php
//ÁREA
if(isset($error_cod_area)){
	?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_cod_area?></td>
	</tr>
	<?php
}
?>
	<tr>
		<td width="40%" align="right">* Área:</td>
		<td colspan="2" width="60%"><select Name="cod_area">
			<option value="none"
			<?php if ($vetor["cod_area"] == "") echo 'selected="selected"' ?>></option>
			<?php
			include("./config.php");
			$con = mysql_connect($host, $log, $senha);
			mysql_select_db($bd, $con);
			$tabela = mysql_query("SELECT codigo, nome FROM area ORDER BY nome");
			while($dados = mysql_fetch_row($tabela)){
				$codigo	= $dados[0];
				$nome	= $dados[1];
				?>
			<option value="<?php echo $codigo?>"
			<?php if ($vetor["cod_area"] == $codigo) echo 'selected="selected"' ?>><?php echo $nome?></option>
			<?php
			}
			mysql_close($con);
			?>
		</select></td>
	</tr>

	<?php
	//DISCIPLINA
	if(isset($error_cod_disciplina)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_cod_disciplina?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Disciplina:</td>
		<td colspan="2" width="60%"><select Name="cod_disciplina">
			<option value="none"
			<?php if ($vetor["cod_disciplina"] == "") echo 'selected="selected"' ?>></option>
			<?php
			include("./config.php");
			$con = mysql_connect($host, $log, $senha);
			mysql_select_db($bd, $con);
			$tabela = mysql_query("SELECT codigo, nome FROM disciplina ORDER BY nome");
			while($dados = mysql_fetch_row($tabela)){
				$codigo	= $dados[0];
				$nome	= $dados[1];
				?>
			<option value="<?php echo $codigo?>"
			<?php if ($vetor["cod_disciplina"] == $codigo) echo 'selected="selected"' ?>><?php echo $nome?></option>
			<?php
			}
			mysql_close($con);
			?>
		</select></td>
	</tr>

	<?php
	//ASSUNTO
	if(isset($error_cod_assunto)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_cod_assunto?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Assunto:</td>
		<td colspan="2" width="60%"><select Name="cod_assunto">
			<option value="none"
			<?php if ($vetor["cod_assunto"] == "") echo 'selected="selected"' ?>></option>
			<?php
			include("./config.php");
			$con = mysql_connect($host, $log, $senha);
			mysql_select_db($bd, $con);
			$tabela = mysql_query("SELECT codigo, nome FROM assunto ORDER BY nome");
			while($dados = mysql_fetch_row($tabela)){
				$codigo	= $dados[0];
				$nome	= $dados[1];
				?>
			<option value="<?php echo $codigo?>"
			<?php if ($vetor["cod_assunto"] == $codigo) echo 'selected="selected"' ?>><?php echo $nome?></option>
			<?php
			}
			mysql_close($con);
			?>
		</select></td>
	</tr>


	<?php
	//DIFICULDADE
	if(isset($error_dificuldade)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_dificuldade ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Dificuldade:</td>
		<td colspan="2" width="60%"><select Name="dificuldade">
			<option value="none"
			<?php if ($vetor["dificuldade"] == "") echo 'selected="selected"' ?>></option>
			<option value="1"
			<?php if ($vetor["dificuldade"] == "1") echo 'selected="selected"' ?>>1</option>
			<option value="2"
			<?php if ($vetor["dificuldade"] == "2") echo 'selected="selected"' ?>>2</option>
			<option value="3"
			<?php if ($vetor["dificuldade"] == "3") echo 'selected="selected"' ?>>3</option>
			<option value="4"
			<?php if ($vetor["dificuldade"] == "4") echo 'selected="selected"' ?>>4</option>
			<option value="5"
			<?php if ($vetor["dificuldade"] == "5") echo 'selected="selected"' ?>>5</option>
		</select>
	
	</tr>

	<?php
	//ENUNCIADO
	if(isset($error_enunciado)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_enunciado ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Enunciado:</td>
		<td colspan="2" width="60%"><textarea onmouseover="this.focus()"
			name="enunciado" rows="3" cols="50"><?php echo $vetor['enunciado']?></textarea>
	
	</tr>

	<?php
	//RESPOSTA_1
	if(isset($error_resposta_1)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_resposta_1 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Opção 1:</td>
		<td colspan="2" width="60%"><textarea name="resposta_1" rows="3" cols="50"><?php echo $vetor['resposta_1']?></textarea></td>
	</tr>


	<?php
	//RESPOSTA_2
	if(isset($error_resposta_2)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_resposta_2 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Opção 2:</td>
		<td colspan="2" width="60%"><textarea name="resposta_2" rows="3" cols="50"><?php echo $vetor['resposta_2']?></textarea></td>
	</tr>


	<?php
	//RESPOSTA_3
	if(isset($error_resposta_3)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_resposta_3 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Opção 3:</td>
		<td colspan="2" width="60%"><textarea name="resposta_3" rows="3" cols="50"><?php echo $vetor['resposta_3']?></textarea></td>
	</tr>


	<?php
	//RESPOSTA_4
	if(isset($error_resposta_4)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_resposta_4 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Opção 4:</td>
		<td colspan="2" width="60%"><textarea name="resposta_4" rows="3" cols="50"><?php echo $vetor['resposta_4']?></textarea></td>
	</tr>


	<?php
	//RESPOSTA_5
	if(isset($error_resposta_5)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_resposta_5 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Opção 5:</td>
		<td colspan="2" width="60%"><textarea name="resposta_5" rows="3" cols="50"><?php echo $vetor['resposta_5']?></textarea></td>
	</tr>

	<?php
	//OPÇÃO CORRETA
	if(isset($error_alternativa_correta)){
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php echo $error_alternativa_correta?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">* Opção correta:</td>
		<td colspan="2" width="60%"><select Name="alternativa_correta">
			<option value="none"
			<?php if ($vetor["alternativa_correta"] == "") echo 'selected="selected"' ?>></option>
			<option value="1"
			<?php if ($vetor["alternativa_correta"] == "1") echo 'selected="selected"' ?>>1</option>
			<option value="2"
			<?php if ($vetor["alternativa_correta"] == "2") echo 'selected="selected"' ?>>2</option>
			<option value="3"
			<?php if ($vetor["alternativa_correta"] == "3") echo 'selected="selected"' ?>>3</option>
			<option value="4"
			<?php if ($vetor["alternativa_correta"] == "4") echo 'selected="selected"' ?>>4</option>
			<option value="5"
			<?php if ($vetor["alternativa_correta"] == "5") echo 'selected="selected"' ?>>5</option>
		</select>
	
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="submit" value="Gravar"> <input
			type="button" value="Cancelar"
			onclick="location.href='questao_lista.php'"></td>
	</tr>
</table>
</form>
</body>
</html>