<?php
session_start();
include("config.php");
$con = mysql_connect($host, $log, $senha) or die("N�o foi poss�vel estabelecer conex�o com o Servidor");
$banco = mysql_select_db($bd, $con) or die("N�o foi poss�vel estabelecer conex�o com o banco de Dados");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] != 3)){
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lista de Quest�es</title>
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
	echo '<li><a href="usuario_lista.php">Usu�rios</a></li>';
}
if($_SESSION['logado'] != 3)
{
	echo '<li><a href="questao_lista.php">Quest�es</a></li>';
}
if($_SESSION['logado'] == 1)
{
	echo '<li><a href="area_lista.php">�reas</a></li>';
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
<h3>Lista de Quest�es</h3>
</center>
<form name="form1" method="POST" action="questao_editar.php">
<table border="0" align="center" width="900px">
<?php
include("config.php");
$con = mysql_connect($host, $log, $senha);
mysql_select_db($bd, $con);
$sql = "SELECT id, enunciado, dificuldade, cod_area FROM questao ORDER BY enunciado";
$tabela = mysql_query($sql);
if(mysql_num_rows($tabela)==0){
	?>
	<tr>
		<td align="center">N�o h� quest�es cadastradas.</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar quest�o clique em Cadastrar Quest�o.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Cadastrar Quest�o"></td>
	</tr>
	<?php
	exit;
}
?>
	<tr>
		<td width="2%"></td>
		<td width="40%">
		<center><b>Enunciado</b></center>
		</td>
		<td width="10%">
		<center><b>Dificuldade</b></center>
		</td>
		<td width="20%">
		<center><b>�rea</b></center>
		</td>
		<td width="40%">
		<center><b>Op��es</b></center>
		</td>
	</tr>
	<?php
	$color = '#FFFFF';
	$count = 0;
	while($dados = mysql_fetch_row($tabela)){
		$id				= $dados[0];
		$enunciado		= $dados[1];
		$dificuldade	= $dados[2];
		$sql = mysql_query("SELECT nome FROM area WHERE codigo = '".$dados[3]."'");
		if(mysql_num_rows($sql) > 0) $area = mysql_result($sql, 0, 0);
		else $area="<b>Sem categoria</b>";
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
		<td align="left"><font size=2><?php echo $enunciado?></font></td>
		<td align="center"><font size=2><?php echo $dificuldade?></font></td>
		<td align="center"><font size=2><?php echo $area?></font></td>
		<td align="center"><input type="button" value="Visualizar"
			onclick="location.href ='questao_visualizar.php?codigo=<?php echo $id?>'"><input
			type="button" value="Editar"
			onclick="location.href = 'questao_editar.php?codigo=<?php echo $id?>'">
		<input type="button" value="Excluir"
			onclick="location.href = 'questao_excluir.php?codigo=<?php echo $id?>'">
		</td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td colspan="5" height="5"></td>
	</tr>
	<?php
	mysql_close($con);
	?>
	<tr>
		<td colspan="5" align="center"><input type="submit"
			value="Cadastrar Quest�o"></td>
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