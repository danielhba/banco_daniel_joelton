<?php
session_start();
include("config.php");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] == 1)){
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php 
echo (isset($_GET["codigo"]) || isset($_POST["codigo"])) ? "Editar Assunto": "Cadastrar Assunto"?></title>
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
	<li><a href="logout.php">SAIR</a></li>
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
		if(isset($_POST["validar"])){
			$error = false;

			if(isset($error_nome)) unset($error_nome);

			$nome = trim($_POST['nome']);


			if(empty($nome)){		//comeca a validacao do nome
				$error = true;
				$error_nome = '<font size=2 color = "red">Informe o nome do assunto.</font>';
			}
			else
			{
				include("./config.php");
				$sql = "SELECT codigo FROM assunto WHERE nome ='".$nome."'";
				$result = mysql_query($sql);
				$codigo_pesquisado = mysql_fetch_row($result);
				if(mysql_num_rows($result) == 1)
				{
					if(isset($_POST["codigo"]))
					{
						if(trim($_POST["codigo"]) != $codigo_pesquisado[0])
						{
							$error = true;
							$error_nome = '<font size=2 color = "red">Este nome de assunto já está cadastrado. Digite outro.</font>';
						}
					}
					else
					{
						$error = true;
						$error_nome = '<font size=2 color = "red">Este nome de assunto já está cadastrado. Digite outro.</font>';
					}
				}
				mysql_close($con);
			}


			//verifica se houve erros de validacao
			if($error == false)
			{
				$data_sistema = 20 . date("y-m-d");
				$hora_sistema = date("H:i:s");
				$usuario = 'danielhba';
					
				include("./config.php");

				if(isset($_POST["codigo"]))
				{
					$sql = "SELECT codigo FROM assunto WHERE codigo ='".$_POST["codigo"]."'";
					$result = mysql_query($sql, $con);

					if(mysql_num_rows($result)!= 0)
					$sql = "UPDATE assunto SET
				 				login_administrador = '".$usuario."',
								nome = '".$nome."',
								data = '".$data_sistema."',
								hora = '".$hora_sistema."'
				WHERE codigo = '".$_POST["codigo"]."'";

					mysql_query($sql,$con);
					mysql_close($con);
				}
				else
				{
					$sql = "INSERT INTO assunto VALUES(
					'',
					'".$usuario."',
					'".$nome."',
					'".$data_sistema."',
					'".$hora_sistema."')"; 

					mysql_query($sql,$con);
					mysql_close($con);

				}
				unset($error);
				?>
<center>
<h2><?php  echo isset($_POST['codigo'])? "Edição de assunto" : "Cadastro de assunto";?></h2>
</center>

<center>
<h3><?php  echo isset($_POST[' codigo']) ? " Confirmação de edição":"Confirmação de cadastro de assunto";?></h3>
</center>

<center><?php echo isset($_POST['codigo'])? " Edição realizada com sucesso!":"Cadastro realizado com sucesso!"?></center>


<table border="0" align="center" width="35%">
	<tr>
		<td>
		<center><input type="button" value="Votar para lista de assuntos"
			onclick="location.href = 'assunto_lista.php'"></center>
		</td>
	</tr>
</table>
				<?php
				exit;
			}
			else
			{
				if(isset($_POST["codigo"]))
				{
					$_GET['codigo'] = $_POST['codigo'];
				}
				$vetor['nome'] = $nome;
			}
			unset($_POST["validar"]);
		}
		if(isset($_GET["codigo"]))
		{
			if(!isset($error)) //se nao tem erro
			{
				include("./config.php");
				$sql = "SELECT * FROM assunto WHERE codigo =".$_GET["codigo"];
				$con = mysql_connect($host,$log,$senha);
				$bd = mysql_select_db($bd,$con);
				$result = mysql_query($sql,$con);
				$vetor = mysql_fetch_array($result,MYSQL_ASSOC);
				mysql_close($con);
			}
		}
		if(!isset($vetor['nome']))$vetor['nome'] = '';
		?>
<center>
<h3><?php 
echo isset($_GET["codigo"]) ? " Editar Assunto":" Cadastrar Assunto";?>
</h3>
</center>
<form name="form1" method="POST" action="assunto_editar.php"><?php 
if(isset($_GET["codigo"]))
{
	?> <input type="hidden" name="codigo"
	value="<?php echo $_GET["codigo"]?>"> <?php 
}
?> <input type="hidden" name="validar" value="ok">
<table border="0" width="900px">
<?php
if(isset($error_nome))
{
	?>
	<tr>
		<td width="40%"></td>
		<td width="60%"><?php  echo $error_nome ?></td>
	</tr>
	<?php
}
?>
	<tr>
		<td width="40%" align="right">*Nome:</td>
		<td width="60%" align="left"><input type="text" name="nome"
			value="<?php  echo $vetor['nome']?>" maxlength="50" size="50"></td>
	</tr>
	<tr>
		<td width="40%"></td>
		<td width="60%"><input type="submit" value="gravar"><input
			type="button" value="Cancelar"
			onclick="location.href = 'assunto_lista.php'"></td>
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