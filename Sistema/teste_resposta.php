<?php
session_start();
include("config.php");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] != 0)){

	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Teste</title>
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
<center>
<h3>Teste - Resposta</h3>
</center>
		<?php
		if(isset($_POST["resposta"])){
			include("config.php");
			$con = mysql_connect($host, $log, $senha);
			mysql_select_db($bd, $con);

			$tabela = mysql_query("SELECT alternativa_correta, resposta_1, resposta_2, resposta_3, resposta_4, resposta_5, enunciado FROM questao WHERE id= '".$_POST["id"]."'");
			$correto = mysql_fetch_row($tabela);
			if ($correto[0] == $_POST["resposta"])
			{
				?>
<form name="form1" method="POST" action="teste_questao.php">
<table border="0" align="center" width="900px">
	<tr>
		<td align="center"><b>Parabéns! Resposta correta!</b></td>
	</tr>
</table>
<br>
<table align="center" width="900px">
	<tr>
		<td width="80%"><font size=2><b><?php echo $correto[6]?></b></font></td>
	</tr>
</table>
<table align="center" width="900px">
	<tr>
		<td><font size=2><b>a)</b> <?php if($correto[0] == 1) echo "<b> ".$correto[1]."</b>"; else echo $correto[1] ?></font></td>
	</tr>
	<tr>
		<td><font size=2><b>b)</b> <?php if($correto[0] == 2) echo "<b> ".$correto[2]."</b>"; else echo $correto[2] ?></font></td>
	</tr>
	<tr>
		<td><font size=2><b>c)</b> <?php if($correto[0] == 3) echo "<b> ".$correto[3]."</b>"; else echo $correto[3] ?></font></td>
	</tr>
	<tr>
		<td><font size=2><b>d)</b> <?php if($correto[0] == 4) echo "<b> ".$correto[4]."</b>"; else echo $correto[4] ?></font></td>
	</tr>
	<tr>
		<td><font size=2><b>e)</b> <?php if($correto[0] == 5) echo "<b> ".$correto[5]."</b>"; else echo $correto[5] ?></font></td>
	</tr>
</table>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td align="center"><input type="submit"
			value="Responder outra questão"></td>
	</tr>
</table>
</form>
				<?php
			}
			else{
				?>
<form name="form1" method="POST" action="teste_questao.php">
<table border="0" align="center" width="900px">
	<tr>
		<td align="center"><b>Ops! Resposta errada.</b></td>
	</tr>
</table>
<br>
<table align="center" width="900px">
	<tr>
		<td width="80%"><font size=2><b><?php echo $correto[6]?></b></font></td>
	</tr>
</table>
<br>
<table align="center" width="900px">
	<tr>
		<td><font size=2><b>a)</b></font> <?php if($correto[0] == 1) echo "<font size=2 color=\"red\"><b> ".$correto[1]."</b></font>"; else echo "<font size = 2>". $correto[1] . "</font>" ?></td>
	</tr>
	<tr>
		<td><font size=2><b>b)</b></font> <?php if($correto[0] == 2) echo "<font size=2 color=\"red\"><b> ".$correto[2]."</b></font>"; else echo "<font size = 2>". $correto[2] . "</font>" ?></td>
	</tr>
	<tr>
		<td><font size=2><b>c)</b></font> <?php if($correto[0] == 3) echo "<font size=2 color=\"red\"><b> ".$correto[3]."</b></font>"; else echo "<font size = 2>". $correto[3] . "</font>" ?></td>
	</tr>
	<tr>
		<td><font size=2><b>d)</b></font> <?php if($correto[0] == 4) echo "<font size=2 color=\"red\"><b> ".$correto[4]."</b></font>"; else echo "<font size = 2>". $correto[4] . "</font>" ?></td>
	</tr>
	<tr>
		<td><font size=2><b>e)</b></font> <?php if($correto[0] == 5) echo "<font size=2 color=\"red\"><b> ".$correto[5]."</b></font>"; else echo "<font size = 2>". $correto[5] . "</font>" ?></td>
	</tr>
</table>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td align="center"><input type="submit"
			value="Responder outra questão"></td>
	</tr>
</table>
</form>
				<?php
			}
		}
		else {
			if(isset($_POST["id"])){
				?>
<form name="form1" method="POST" action="teste_questao.php"><input
	type="hidden" name="id" value="<?php echo $_POST["id"] ?>">
<table border="0" align="center" width="900px">
	<tr>
		<td align="center">Por favor, responda a questão.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Responder questão"></td>
	</tr>
</table>
</form>
				<?php
			}
			else{
				?>
<form name="form1" method="POST" action="teste_questao.php">
<table border="0" align="center" width="900px">
	<tr>
		<td align="center">Por favor, responda a questão.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Responder questão"></td>
	</tr>
</table>
</form>
				<?php
			}
		}
		?></div>
</body>
</html>
		<?php
}
else{
	header("Location: home.php");
	exit;
}
?>