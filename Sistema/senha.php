<?php
session_start();
include("config.php");
$con = mysql_connect($host, $log, $senha) or die("Não foi possível estabelecer conexão com o Servidor");
$banco = mysql_select_db($bd, $con) or die("Não foi possível estabelecer conexão com o banco de Dados");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] != 0)){
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Home</title>
<meta name="keywords" content="keyword1, keyword2, keyword3, etc..." />
<meta name="description" content="Description of website here..." />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE ]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div id="leftMain"><a href="home.php"><img src="images/logo.png"
	alt="Estude e Estude" border="0" /></a>
<div id="navbar">
<ul>
<?php
echo '<li><a href="teste_questao.php">Realizar Teste</a></li>';
echo '<li><a href="prova_gerar.php">Realizar Prova</a></li>';
if($_SESSION['logado'] == 1)
{
	echo '<li><a href="usuario_lista.php">Usuários</a></li>';
}
if($_SESSION['logado'] != 3)
{
	echo '<li><a href="questao_lista.php">Questões</a></li>';
}
if($_SESSION['logado'] == 1)
{
	echo '<li><a href="area_lista.php">Áreas</a></li>';
	echo '<li><a href="disciplina_lista.php">Disciplinas</a></li>';
	echo '<li><a href="assunto_lista.php">Assuntos</a></li>';
}
?>
</ul>
</div>
<div id="navbarAlt">
<ul>
	<li><a href="senha.php">Alterar Senha</a></li>
</ul>
<ul>
	<li><a href="logout.php">Sair</a></li>
</ul>
</div>
</div>
<div id="mainphotos">
<center><img src="images/picture1.jpg" alt="Photo 1" width="119"
	height="54" /><img src="images/picture2.jpg" alt="Photo 2" width="119"
	height="54" /><img src="images/learning-is-fun.gif"
	alt="Learning is Fun" width="119" height="54" /><img
	src="images/picture3.jpg" alt="Photo 3" width="119" height="54" /></center>
<center><img src="images/welcome.png" alt="Welcome" /></center>
<table align="left" width="900px">
	<tr align="left">
		<td width="2%"></td>
		<td align="left"><font size=2><?php 
		echo '<b>Nome:</b> ' . $_SESSION["nome"];
		?></font></td>
		<td align="right"><font size=2><?php
		if($_SESSION['logado'] == 1) $tipo_usuario = 'Administrador';
		if($_SESSION['logado'] == 2) $tipo_usuario = 'Professor';
		if($_SESSION['logado'] == 3) $tipo_usuario = 'Aluno';
		echo '<b>Tipo:</b> ' . $tipo_usuario;
		?></font></td>
	</tr>
</table>
		<?php
		if(isset($_POST["validar"])){
			$error = false;
			if(isset($error_senha)) unset($error_senha);
			if(isset($error_senha1)) unset($error_senha1);

			$senha = md5(addslashes($_POST['senha']));
			$senha1 = addslashes($_POST['senha1']);
			$senha2 = addslashes($_POST['senha2']);
			$teste	= $senha;
			$teste1 = $senha1;
			$teste2	= $senha2;
			if(empty($senha))
			{
				$error = true;
				$error_senha = '<font size=2 color = "red">Informe a senha atual.</font>';
			}
			else
			{
				include("./config.php");
				$sql = "SELECT * FROM usuario WHERE login ='".$_SESSION["login_user"]."' AND senha='". $teste."'";
				$result = mysql_query($sql);
				if(mysql_num_rows($result) == 0){
					$error = true;
					$error_senha = '<font size=2 color = "red">A senha atual não confere.</font>';
				}
			}
			if(empty($senha1)){
				$error = true;
				$error_senha1 = '<font size=2 color = "red">Informe a nova senha.</font>';
			}
			else if(empty($senha2))
			{
				$error = true;
				$error_senha1 = '<font size=2 color = "red">Confirme a nova senha.</font>';
			}
			else if(strcmp($teste1, $teste2)!=0)
			{
				$error = true;
				$error_senha1 = '<font size=2 color = "red">As senhas não conferem.</font>';
			}

			if($error == false){
				$data_sistema = 20 . date("y-m-d");
				$hora_sistema = date("H:i:s");
				$senha = md5($teste1);
				$sql = "UPDATE usuario SET
				 				senha = '".$senha."',			
								data_cadastro = '".$data_sistema."',
								hora_cadastro = '".$hora_sistema."'
						WHERE login = '".$_SESSION["login_user"]."'";
				mysql_query($sql,$con);
				mysql_close($con);
				?> <br>
<br>
<center>
<h3>Alterar Senha</h3>
</center>
<center>
<h3>Confirmação de alterarção</h3>
</center>
<center>Alteração realizada com sucesso!</center>
<br>
<table border="0" align="center" width="35%">
	<tr>
		<td>
		<center><input type="button" value="Voltar para Home"
			onclick="location.href = 'home.php'"></center>
		</td>
	</tr>
</table>

				<?php
				exit;
			}
		}
		?> <br>
<br>
<center>
<h3>Alterar Senha</h3>
</center>
<form name="form1" method="POST" action="senha.php"><input type="hidden"
	name="validar" value="ok">
<table border="0" align="center" width="900px">
<?php
if(isset($error_senha))
{
	?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php  echo $error_senha ?></td>
	</tr>
	<?php
}
?>
	<tr>
		<td width="40%" align="right">Senha atual:</td>
		<td width="60%" align="left"><input type="password" name="senha"
			size=40></td>
	</tr>

	<?php
	if(isset($error_senha1))
	{
		?>
	<tr>
		<td width="40%" align="right"></td>
		<td width="60%"><?php  echo $error_senha1 ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td width="40%" align="right">Nova senha:</td>
		<td width="60%" align="left"><input type="password" name="senha1"
			size=40></td>
	</tr>
	<tr>
		<td width="40%" align="right">Confirmação da senha:</td>
		<td width="60%" align="left"><input type="password" name="senha2"
			size=40></td>
	</tr>
	<tr>
		<td></td>
		<td align="left"><input type="submit" value="Gravar"> <input
			type="button" value="Cancelar" onclick="location.href = 'home.php'"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>
	<?php
}
else{
	header("Location: login.php");
	exit;
}
?>