<?php
session_start();
include("config.php");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] == 1)){
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lista de Assuntos</title>
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
<center>
<h3>Lista de Assuntos</h3>
</center>
<form name="form1" method="POST" action="assunto_editar.php">
<table border="0" align="center" width="900px">
<?php
include("config.php");
$sql = "SELECT nome,codigo FROM assunto ORDER BY nome";
$tabela = mysql_query($sql);
if(mysql_num_rows($tabela)== 0)
{
	?>
	<tr>
		<td align="center">Nao existe nenhum assunto cadastrado</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar assunto clique em Cadastrar Assunto.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Incluir Assunto"></td>
	</tr>

	<?php
}
?>
	<tr>
		<td width="5%"></td>
		<td width="50%"><center><b>Nome</b></center></td>
		<td width="30%">
		<center><b>Opções</b>
		</center>
		</td>
	</tr>
	<?php

	while($dados = mysql_fetch_row($tabela)){
		$codigo = $dados[1];
		$nome = $dados[0];
		?>
	<tr>
		<td width="5%"></td>
		<td align="left"><?php echo $nome?></td>
		<td align="center"><input type="button" value="Editar"
			onclick="location.href = 'assunto_editar.php?codigo=<?php echo $codigo?>'">
		<input type="button" value="Excluir"
			onclick="location.href = 'assunto_excluir.php?codigo=<?php echo $codigo?>'">
		</td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td colspan="3" height="5"></td>
	</tr>
	<?php
	mysql_close($con);
	?>
	<tr>
		<td colspan="3" align="center"><input type="submit"
			value="Cadastrar Assunto"></td>

</table>
</form>
</div>
</body>
</html>
	<?php
}
else{
	header("Location: home.php");
	exit;
}
?>