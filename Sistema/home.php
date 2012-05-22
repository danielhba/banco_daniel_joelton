<?php
session_start();
include("config.php");
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
<div id="leftMain"><a href="index.html"><img src="images/logo.png"
	alt="Estude e Estude" border="0" /></a>
<div id="navbar">
<ul>
<?php
echo '<li><a href="home.php">Home</a></li>';
echo '<li><a href="resolver_questao.php">Realizar Teste</a></li>';
echo '<li><a href="realizar_prova.php">Realizar Prova</a></li>';
if($_SESSION['logado'] == 1)
{
	echo '<li><a href="usuarios_cadastrados.php">Usuários</a></li>';
}
if($_SESSION['logado'] != 3)
{
	echo '<li><a href="questoes_cadastradas.php">Questões</a></li>';
}
if($_SESSION['logado'] == 1)
{
	echo '<li><a href="areas_cadastradas.php">Áreas</a></li>';
	echo '<li><a href="assuntos_cadastrados.php">Asuntos</a></li>';
	echo '<li><a href="disciplinas_cadastradas.php">Disciplinas</a></li>';

}
?>
</ul>
</div>
<div id="navbarAlt">
<ul>
	<li><a href="logout.php">SAIR</a></li>
</ul>
</div>
</div>
<div id="main">
<div></div>
<div id="mainphotos"><img src="images/picture1.jpg" alt="Photo 1"
	width="119" height="54" /><img src="images/picture2.jpg" alt="Photo 2"
	width="119" height="54" /><img src="images/learning-is-fun.gif"
	alt="Learning is Fun" width="119" height="54" /><img
	src="images/picture3.jpg" alt="Photo 3" width="119" height="54" /></div>
<div id="maintext"><img src="images/welcome.png" alt="Welcome" />
<table align="center" width="100%">
	<tr align="left">
		<td align="left"><font size=2><?php 
		echo '<b>Nome:</b> ' . $_SESSION["nome"];
		?></font></td>
		<td align="left"><font size=2><?php
		if($_SESSION['logado'] == 1) $tipo_usuario = 'Administrador';
		if($_SESSION['logado'] == 2) $tipo_usuario = 'Professor';
		if($_SESSION['logado'] == 3) $tipo_usuario = 'Aluno';
		echo '<b>Tipo:</b> ' . $tipo_usuario;
		?></font></td>
	</tr>

</table>
</div>
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