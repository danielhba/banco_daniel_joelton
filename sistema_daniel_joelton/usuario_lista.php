<?php
session_start();
include("config.php");
$con = mysql_connect($host, $log, $senha) or die("N�o foi poss�vel estabelecer conex�o com o Servidor");
$banco = mysql_select_db($bd, $con) or die("N�o foi poss�vel estabelecer conex�o com o banco de Dados");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] != 0)){

	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lista de Usu�rios</title>
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
	echo '<li><a href="usuario_lista.php">Usu�rios</a></li>';
}
if($_SESSION['logado'] != 3)
{
	echo '<li><a href="questao_lista.php">Quest�es</a></li>';
}
if($_SESSION['logado'] == 1)
{
	echo '<li><a href="area_lista.php">�reas</a></li>';
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
<br>
<br>
<center>
<h3>Lista de usu�rios</h3>
</center>
<center>Para realizar a edi��o ou exclus�o de administradores do
sistema, contacte o administrador do Banco de Dados.</center>
<form name="form1" method="POST" action="usuario_lista.php"><br>
<table border="0" align="center" width="900px">
	<tr>
		<td width="15%"></td>
		<td width="85%"><font size=2><b>A busca por nome e login de usu�rio
		n�o � obrigat�ria.</b></font></td>
	</tr>
	<tr>
		<td width="40%" align="right">Nome:</td>
		<td width="60%" align="left"><input type="text" size="50" name="nome"
			value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; else echo "";?>">
		</td>
	</tr>
	<tr>
		<td width="40%" align="right">Login:</td>
		<td width="60%" align="left"><input type="text" size="50" name="login"
			value="<?php if(isset($_POST['login'])) echo $_POST['login']; else echo "";?>">
		</td>
	</tr>
	<tr>
		<td></td>
		<td align="left"><input type="submit" value="Buscar"></td>
	</tr>
</table>
</form>
<form name="form2" method="POST" action="usuario_editar.php"><br>
<table border="0" align="center" width="900px">
<?php
if(isset($_POST['nome']))
{
	include("config.php");
	$con = mysql_connect($host, $log, $senha);
	mysql_select_db($bd, $con);
	$sql = "SELECT login, tipo_usuario, nome FROM usuario WHERE tipo_usuario <> '1' ORDER BY nome";
	$tabela = mysql_query($sql);
	if(mysql_num_rows($tabela)==0){
		?>
	<tr>
		<td align="center">N�o h� usu�rios cadastrados.</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar usu�rio clique em Cadastrar Usu�rio.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Cadastrar Usu�rio"></td>
	</tr>
	<?php
	exit;
	}
	?>
	<tr>
		<td width="5%"></td>
		<td width="25%">
		<center><b>Nome</b></center>
		</td>
		<td width="20%">
		<center><b>Login</b></center>
		</td>
		<td width="10%">
		<center><b>Tipo</b></center>
		</td>
		<td width="80%">
		<center><b>Op��es</b></center>
		</td>
	</tr>
	<?php
	$color = '#FFFFF';
	$count = 0;
	$resultado = 0;
	while($dados = mysql_fetch_row($tabela)){
		$nome = $dados[2];
		$login = $dados[0];
		$passou = true;
		if(strcmp($_POST['nome'], ""))
		{
			$nome1 = strtolower($nome);
			$nome2 = strtolower($_POST['nome']);
			if((strpos($nome1,$nome2) === 0)||(strpos($nome1,$nome2) > 0)){
				$passou = true;
			}
			else
			{
				$passou = false;
			}

		}
		if($passou == true)
		{
			if(strcmp($_POST['login'], ""))
			{
				$login1 = strtolower($login);
				$login2 = strtolower($_POST['login']);
				if((strpos($login1,$login2) === 0)||(strpos($login1,$login2) > 0)){
					$passou = true;
				}
				else
				{
					$passou = false;
				}

			}
		}
		if($passou == true)
		{
			$resultado++;
			if($dados[1] == 1) $tipo = "Administrador";
			if($dados[1] == 2) $tipo = "Professor";
			if($dados[1] == 3) $tipo = "Aluno";
			$count++;
			if (strcmp($color,'#FFFFF') != 0)
			{
				$color = '#FFFFF';
			}
			else
			{
				$color = '#FFFAA';
			}
			?>
	<tr bgcolor="<?php echo $color?>">
		<td width="5%" align="center"><?php echo $count?></td>
		<td align="left"><?php echo $nome?></td>
		<td align="center"><?php echo $login?></td>
		<td align="center"><?php echo $tipo?></td>
		<td align="center"><input type="button" value="Visualizar"
			onclick="location.href = 'usuario_visualizar.php?codigo=<?php echo $login?>'">
		<input type="button" value="Editar"
			onclick="location.href = 'usuario_editar.php?codigo=<?php echo $login?>'">
		<input type="button" value="Excluir"
			onclick="location.href = 'usuario_excluir.php?codigo=<?php echo $login?>'">
		<input type="button" value="Resetar senha"
			onclick="location.href = 'usuario_resetar.php?codigo=<?php echo $login?>'">
		</td>
	</tr>
	<?php
		}
	}
	if($resultado == 0)
	{
		?>
	<tr>
		<td colspan="5" align="center"><br><br>N�o h� usu�rios cadastrados segundo os crit�rios de
		busca.</td>
	</tr>
	<tr>
		<td colspan="5" align="center"><br>Para cadastrar usu�rio clique em Cadastrar Usu�rio.<br></td>
	</tr>

	<?php
	}
	?>
	<tr>
		<td colspan="4" height="5"></td>
	</tr>
	<?php
	mysql_close($con);
	?>
	<tr>
		<td colspan="5" align="center"><input type="submit"
			value="Cadastrar Usu�rio"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>
	<?php
}
}
else{
	header("Location: login.php");
	exit;
}
?>
