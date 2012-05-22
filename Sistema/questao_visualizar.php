<?php
session_start();
include("config.php");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] == 1)){
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Visualizar Questão</title>
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
<h2>Visualizar Questão</h2>
</center>
<form name="form1" method="POST">
<table align="center" width="900px">
<?php

if(isset($_GET["codigo"]))
{
	include("./config.php");
	$sql = "SELECT * FROM questao WHERE id =".$_GET["codigo"];
	$con = mysql_connect($host,$log,$senha);
	$bd = mysql_select_db($bd,$con);
	$result = mysql_query($sql,$con);
	$vetor = mysql_fetch_array($result,MYSQL_ASSOC);
	$result = mysql_query('SELECT nome FROM area WHERE codigo ="'.$vetor['cod_area'].'"');
	$area = mysql_fetch_array($result);
	$result = mysql_query('SELECT nome FROM disciplina WHERE codigo ="'.$vetor['cod_disciplina'].'"');
	$disciplina = mysql_fetch_array($result);
	$result = mysql_query('SELECT nome FROM assunto WHERE codigo ="'.$vetor['cod_assunto'].'"');
	$assunto = mysql_fetch_array($result);
	mysql_close($con);
	?>
	<tr>
		<td width="50%" align="right"><b>Área:</b></td>
		<td colspan="2" width="50%"><?php  echo $area[0]?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right"><b>Disciplina:</b></td>
		<td colspan="2" width="50%"><?php  echo $disciplina[0]?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right"><b>Assunto:</b></td>
		<td colspan="2" width="50%"><?php  echo $assunto[0]?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right"><b>Nível de dificuldade:</b></td>
		<td colspan="2" width="50%"><?php  echo $vetor['dificuldade']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right" valign="top"><b>Enunciado:</b></td>
		<td colspan="2" width="50%" valign="top"><?php  echo $vetor['enunciado']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right" valign="top"><b>Resposta 1:</b></td>
		<td colspan="2" width="50%" valign="top"><?php  echo $vetor['resposta_1']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right" valign="top"><b>Resposta 2:</b></td>
		<td colspan="2" width="50%" valign="top"><?php  echo $vetor['resposta_2']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right" valign="top"><b>Resposta 3:</b></td>
		<td colspan="2" width="50%" valign="top"><?php  echo $vetor['resposta_3']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right" valign="top"><b>Resposta 4:</b></td>
		<td colspan="2" width="50%" valign="top"><?php  echo $vetor['resposta_4']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right" valign="top"><b>Resposta 5:</b></td>
		<td colspan="2" width="50%" valign="top"><?php  echo $vetor['resposta_5']?></td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td width="50%" align="right"><b>Alternativa correta:</b></td>
		<td colspan="2" width="50%"><?php  echo $vetor['alternativa_correta']?></td>
	</tr>
</table>
<br>
<table align="center" width="900px">
	<tr align="center">
		<td align="right"><input type="button" value="Editar"
			onclick="location.href ='questao_editar.php?codigo=<?php echo $_GET['codigo']?>'">
		</td>

		<?php
}
?>
		<td align="left"><input type="button" value="Voltar"
			onclick="location.href = 'questao_lista.php'"></td>
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