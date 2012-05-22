<?php
session_start();
include("config.php");
$con = mysql_connect($host, $log, $senha) or die("Não foi possível estabelecer conexão com o Servidor");
$banco = mysql_select_db($bd, $con) or die("Não foi possível estabelecer conexão com o banco de Dados");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] == 1))
{
	if(isset($_POST["excluir"])){
		include("./config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);
		$sql = "DELETE FROM disciplina WHERE codigo = ".$_POST["codigo"];
		mysql_query($sql,$con);
		mysql_close($con);
		header("location: ./disciplina_excluir_aviso.php");
		exit;
	}
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Excluir Área</title>
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
echo '<li><a href="prova_questao.php">Realizar Prova</a></li>';
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
	echo '<li><a href="assunto_lista.php">Asuntos</a></li>';
	echo '<li><a href="disciplina_lista.php">Disciplinas</a></li>';

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
<div id="mainphotos"><center>
<img src="images/picture1.jpg" alt="Photo 1"
	width="119" height="54" /><img src="images/picture2.jpg" alt="Photo 2"
	width="119" height="54" /><img src="images/learning-is-fun.gif"
	alt="Learning is Fun" width="119" height="54" /><img
	src="images/picture3.jpg" alt="Photo 3" width="119" height="54" />
</center>
<center><img src="images/welcome.png" alt="Welcome" /></center>
<table width="900px">
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
		if(isset($_GET['codigo']))
		{
			?>
<center>
<h3>Excluir Disciplina</h3>
</center>
<form name="form1" method="POST" action="disciplina_excluir.php">
<table border="0" align="center" width="900px">
	<tr>
		<td><input type="hidden" name="excluir" value="ok"> <input
			type="hidden" name="codigo" value="<?php  echo $_GET["codigo"]?>">
		<center><b>Você tem certeza que deseja excluir a disciplina?</b></center>
		</td>
	</tr>
</table>
<br>
<table align="center" width="900px">
	<tr>
		<td align="right" width="50%"><input type="submit" value="Sim"></td>
		<td align="left" width="50%"><input type="button" value="Não"
			onclick="location.href = 'disciplina_lista.php'"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>
			<?php
		}
		else {
			header("Location: area_lista.php");
			exit;
		}
}
else{
	header("Location: home.php");
	exit;
}
?>