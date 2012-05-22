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
<title>Visualizar Usuário</title>
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
<br>
<br>
<center>
<h3>Visualizar Usuário</h3>
</center>
<form name="form1" method="POST">
<table align="center" width="900px">
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
<table align="center" width="900px">
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