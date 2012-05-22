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
<title>Prova - Gerar Prova</title>
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
<h3>Prova - Gerar Prova</h3>
</center>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script> <script
	type="text/javascript">
	$(document).ready(function(){
		$("select[name=area]").change(function(){
		$("select[name=disciplina]").html('<option value="-1" disabled="disabled">Selecione a área primeiro</option>');
		$.post("listar_disciplina.php",
			{nome_area:$(this).val()},
			function(valor)
			{
				$("select[name=disciplina]").html(valor);
			}
		);
		$("select[name=assunto]").html('<option value="-1" disabled="disabled">Selecione a disciplina primeiro</option>');
		$.post("listar_assunto.php",
			{nome_disciplina:$(this).val()}
		);
	});
	$("select[name=disciplina]").change(function(){
		$("select[name=assunto]").html('<option value="-1" disabled="disabled">Selecione a disciplina primeiro</option>');
		$.post("listar_assunto.php",
			{nome_disciplina:$(this).val()},
			function(valor)
			{
				$("select[name=assunto]").html(valor);
			}
		);
		});
	});
</script>
<form action="prova_questao.php" method="post">
<br>
<table align="center" width="900px">
<tr>
<td width="15%"></td>
<td width="85%">
<font size=2><b>- A seleção de área, disciplina e assunto não é obrigatória; é um filtro de geração de questões.</b></font>
</td>
<tr>
<td width="15%"></td>
<td width="85%">
<font size=2><b>- Não marcar nível de dificuldade, indicará a geração de prova com todos os níveis de dificuldade.</b></font>
</td>
</tr>
</table>
<br><br>
<table align="center" width="900px">
	<tr>
		<td align="right" width="40%">Área:</td>
		<td width="60%"><select name="area">

			<option value="-1" selected="selected">Escolha uma area</option>
			<?php
			include("config.php");
			$result = "SELECT * FROM area ORDER BY nome";
			$ql = mysql_query($result);
			if(!$ql)
			{
				echo "Nao foi possivel executar a query ($sql):	".mysql_error();
			}
			if(mysql_num_rows($ql) == 0)
			{
				echo "Não há áreas cadastradas";
				exit;
			}
			while($ln = mysql_fetch_assoc($ql))
			{
				echo '<option value = "'.$ln['codigo'].'">'.$ln['nome'].'</option>';
			}
			?>
		</select></td>
	</tr>
	<tr>
		<td align="right">Disciplina:</td>
		<td><select name="disciplina">
			<option value="0" disabled="disabled">Escolha uma área primeiro</option>
		</select></td>
	</tr>
	<tr>
		<td align="right">Assunto:</td>
		<td><select name="assunto">
			<option value="0" disabled="disabled">Escolha uma disciplina primeiro</option>
		</select></td>
	</tr>
	<tr>
		<td align="right">Quantidade:</td>
		<td><select name="quantidade">
			<option value=5>5</option>
			<option value=10>10</option>
			<option value=20>20</option>
		</select></td>
	</tr>
	<tr>
		<td align="right">Dificuldade:</td>
		<td><input type="checkbox" name="dificuldade[]" value=1> 1 <input
			type="checkbox" name="dificuldade[]" value=2> 2<input type="checkbox"
			name="dificuldade[]" value=3> 3<input type="checkbox"
			name="dificuldade[]" value=4> 4<input type="checkbox"
			name="dificuldade[]" value=5> 5</td>
	</tr>
</table>
<br>
<table align="center" width="900px">
	<tr>
		<td align="center" colspan="2"><input type="submit"
			value="Gerar Prova"></td>
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