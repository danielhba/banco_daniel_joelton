<?php
session_start();
include("config.php");
$con = mysql_connect($host, $log, $senha) or die("Não foi possível estabelecer conexão com o Servidor");
$banco = mysql_select_db($bd, $con) or die("Não foi possível estabelecer conexão com o banco de Dados");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] != 3)){
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lista de Questões</title>
<meta name="keywords" content="keyword1, keyword2, keyword3, etc..." />
<meta name="description" content="Description of website here..." />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE ]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
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
<h3>Lista de Questões</h3>
</center>
<form name="form1" method="POST" action="questao_lista.php">
<table align="center" width="900px">
	<tr>
		<td width="15%"></td>
		<td width="85%"><font size=2><b>- A seleção de área, disciplina e
		assunto não é obrigatória; é um filtro de questões.</b></font>
		</td>
	</tr>
	<tr>
		<td width="15%"></td>
		<td width="85%"><font size=2><b>- Não marcar nível de dificuldade,
		indicará a geração de prova com todos os níveis de dificuldade.</b></font>
		</td>
	</tr>

</table>
<br>
<br>
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
		<td align="right">Dificuldade:</td>
		<td><input type="checkbox" name="dificuldade[]" value=1> 1 <input
			type="checkbox" name="dificuldade[]" value=2> 2<input type="checkbox"
			name="dificuldade[]" value=3> 3<input type="checkbox"
			name="dificuldade[]" value=4> 4<input type="checkbox"
			name="dificuldade[]" value=5> 5</td>
	</tr>
</table>
<table align="center" width="900px">
	<tr>
		<td align="center" colspan="2"><input type="submit"
			value="Buscar questão"></td>
	</tr>
</table>
</form>
			<?php
			if(isset($_POST['area'])){
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
				$sql = 'SELECT id, enunciado, dificuldade, cod_area FROM questao WHERE '.$sql_dificuldade.$sql_area.$sql_disciplina.$sql_assunto;
			}
			?>
<form name="form2" method="POST" action="questao_editar.php"><?php
if(!isset($sql)){ ?> <br>
<br>
<br>
<br>
<br>
<table align="center" width="900px">
	<tr>
		<td align="center">Para cadastrar questões.</td>
	</tr>
	<tr>
		<td colspan="5" align="center"><input type="submit"
			value="Cadastrar Questão"></td>
	</tr>
</table>
<?php
}
?> <?php
if(isset($sql)){

	include("config.php");
	$con = mysql_connect($host, $log, $senha);
	mysql_select_db($bd, $con);
	$tabela = mysql_query($sql);
	if(mysql_num_rows($tabela)==0){
		?> <br>
<br>
<br>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td align="center">Não há questões cadastradas segundo os critérios de
		busca.</td>
	</tr>
	<tr>
		<td align="center">Tente outro critério de busca.<br>
		<br>
		<br>
		<br>
		</td>
	</tr>
	<tr>
		<td align="center">Para cadastrar questão clique em Cadastrar Questão.</td>
	</tr>
	<tr>
		<td align="center"><input type="submit" value="Cadastrar Questão"></td>
	</tr>
</table>
		<?php
		exit;
	}
	?>
<table border="0" align="center" width="900px">
	<tr>
		<td colspan="5" align="right">Para cadastrar questões.</td>
	</tr>
	<tr>
		<td colspan="5" align="right"><input type="submit"
			value="Cadastrar Questão"></td>
	</tr>
</table>
<br>
<br>
<table border="0" align="center" width="900px">
	<tr>
		<td width="2%"></td>
		<td width="40%">
		<center><b>Enunciado</b></center>
		</td>
		<td width="10%">
		<center><b>Dificuldade</b></center>
		</td>
		<td width="20%">
		<center><b>Área</b></center>
		</td>
		<td width="40%">
		<center><b>Opções</b></center>
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
			value="Cadastrar Questão"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>
	<?php
}
}
else{
	header("Location: login.php");
	exit;
}
?>