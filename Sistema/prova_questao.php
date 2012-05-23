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
<title>Prova</title>
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
<div id="mainphotos" align="right">
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
<h3>Prova</h3>
</center>
<form name="form1" method="POST" action="prova_resposta.php"><?php
if(isset($_POST['area'])){
	$questao_quantidade = $_POST['quantidade'];?> <input type="hidden"
	name="quantidade" value="<?php echo $questao_quantidade?>"> <?php
	include("config.php");

	if($_POST['area'] == '-1')
	{
		$sql_area = " ";
		$sql_disciplina = " ";
		$sql_assunto = " ";
	}
	else
	{
		$sql_area = ' AND cod_area = "'.$_POST['area'].'"';
		if($_POST['disciplina'] == -1)
		{
			$sql_disciplina = " ";
			$sql_assunto = " ";
		}
		else
		{
			$sql_disciplina = ' AND cod_disciplina = "'.$_POST['disciplina'].'"';
			if($_POST['assunto'] == -1)
			{
				$sql_assunto = " ";
			}
			else
			{
				$sql_assunto = ' AND cod_assunto = "'.$_POST['assunto'].'"';
			}
		}
	}
	if(isset($_POST['dificuldade']))
	{
		$dificuldade = $_POST['dificuldade'];
	}
	else
	{
		$dificuldade = array('1','2','3','4','5');
	}

	$sql_dificuldade = "dificuldade IN(";
	for($i = 0; $i< sizeof($dificuldade); $i++){
		if($i == sizeof($dificuldade)-1)
		{
			$sql_dificuldade = $sql_dificuldade . $dificuldade[$i].')';
		}
		else
		{
			$sql_dificuldade = $sql_dificuldade . $dificuldade[$i].',';
		}
	}

	for($i = 1; $i <= $questao_quantidade; $i++){
		$con = mysql_connect($host, $log, $senha);
		$sql = "SELECT * FROM questao WHERE ".$sql_dificuldade.$sql_area.$sql_disciplina.$sql_assunto;
		$tabela = mysql_query($sql);
		if(mysql_num_rows($tabela) > 0)
		{
			$linha = rand(1, mysql_num_rows($tabela)) - 1;
			$contador = -1;
			while(($vetor = mysql_fetch_row($tabela, MYSQL_ASSOC)))
			{
				$contador++;
				if($contador == $linha)
				break;
			}
			?> <input type="hidden" name="id<?php echo $i?>"
	value="<?php echo $vetor['id']?>"> <br>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td width="80%"><b><font size="2"><?php echo $i. "º) ". $vetor['enunciado']?></font></b></td>
	</tr>
</table>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="1"><font
			size="2"><b>a)</b> <?php echo $vetor['resposta_1']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="2"><font
			size="2"><b>b)</b> <?php echo $vetor['resposta_2']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="3"><font
			size="2"><b>c)</b> <?php echo $vetor['resposta_3']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="4"><font
			size="2"><b>d)</b> <?php echo $vetor['resposta_4']?></font></td>
	</tr>
	<tr>
		<td><input type="radio" name="resposta<?php echo $i?>" value="5"><font
			size="2"><b>e)</b> <?php echo $vetor['resposta_5']?></font></td>
	</tr>
	<tr>
	</tr>
</table>
			<?php
		}
		else
		{
			$not_question = true;
			break;
		}
	}
	if(isset($not_question)){
		?>
<table align="center" width="900px">
	<tr align="center">
		<td><font size=2>Não foram encontradas questões segundo os critérios
		de pesquisa.</font></td>
	</tr>
	<tr align="center">
		<td><font size=2>Clique em <b><a href='./prova_gerar.php'>Gerar outra
		prova</a></b> para gerar outra prova, usando outros critérios de
		filtro.</font></td>
	</tr>
</table>
		<?php
	}
	mysql_close();
	?> <br>
<br>
	<?php
	if(!isset($not_question)){
		?>
<table border="0" align="center" width="900px">
	<tr>
		<td align="center"><input type="submit" value="Finalizar Prova"> <input
			type="button" value="Gerar outra prova"
			onclick="location.href = 'prova_gerar.php'"></td>
	</tr>
</table>
		<?php
	}
}
else
{ ?>
<table align="center" width="900px">
	<tr align="center">
		<td><font size=2>Não foram encontradas questões segundo os critérios
		de pesquisa.</font></td>
	</tr>
	<tr align="center">
		<td><font size=2>Clique em <b><a href='./prova_gerar.php'>Gerar outra
		prova</a></b> para gerar outra prova, usando outros critérios de
		filtro.</font></td>
	</tr>
</table>
<?php
}
?></form>
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