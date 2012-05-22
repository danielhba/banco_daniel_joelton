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
<center><h3>Teste</h3></center>
		<?php
		include("config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);
		if(isset($_POST["id"]))
		{
			$vetor = mysql_fetch_row(mysql_query("SELECT * FROM questao WHERE id = '".$_POST["id"]."'"), MYSQL_ASSOC);
			$linha = 0;
		}
		else
		{
			$tabela = mysql_query("SELECT * FROM questao");
			$linha = rand(1, mysql_num_rows($tabela)) - 1;
			$contador = -1;
			while(($vetor = mysql_fetch_row($tabela, MYSQL_ASSOC)))
			{
				$contador++;
				if($contador == $linha)
				break;
			}
		}
		mysql_close();
		?>
<form name="form1" method="POST" action="teste_resposta.php"><input
	type="hidden" name="id" value="<?php echo $vetor['id']?>"> <br>
<table border="0" align="center" width="900px">
	<tr>
		<td width="80%"><b><font size=2><?php echo $vetor['enunciado']?></font></b></td>
	</tr>
</table>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td><input type="radio" name="resposta" value="1"><font size=2><b>a)</b>
		<?php echo $vetor['resposta_1']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="2"><font size=2><b>b)</b>
		<?php echo $vetor['resposta_2']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="3"><font size=2><b>c)</b>
		<?php echo $vetor['resposta_3']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="4"><font size=2><b>d)</b>
		<?php echo $vetor['resposta_4']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta" value="5"><font size=2><b>e)</b>
		<?php echo $vetor['resposta_5']?></font></td>
	</tr>
	<tr>
	</tr>
</table>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td align="center"><input type="submit" value="Responder"> <input
			type="button" value="Pular Questão"
			onclick="location.href = 'teste_questao.php'"></td>
	</tr>
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