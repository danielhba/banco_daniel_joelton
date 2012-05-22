<?php
session_start();
include("config.php");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] != 0)){
	header("Location: home.php");
	exit;
}
else {

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
<div id="leftMain"><a href="home.php"><img src="images/logo.png"
	alt="Estude e Estude" border="0" /></a></div>
<div id="mainphotos">
<center><img src="images/picture1.jpg" alt="Photo 1" width="119"
	height="54" /><img src="images/picture2.jpg" alt="Photo 2" width="119"
	height="54" /><img src="images/learning-is-fun.gif"
	alt="Learning is Fun" width="119" height="54" /><img
	src="images/picture3.jpg" alt="Photo 3" width="119" height="54" /></center>
<center><img src="images/welcome.png" alt="Welcome" /></center>
<center>
<h2>LOGIN</h2>
</center>
	<?php
	if(isset($_POST["login"]) && isset($_POST["senha"])){
		include("config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);
		$login = addslashes($_POST["login"]);
		$senha = addslashes($_POST["senha"]);
		$sql = "SELECT * from  usuario WHERE  login = '$login'  AND senha = '$senha'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) == 1 )
		{
			$user = mysql_fetch_array($rs);
			$logado = $user['tipo_usuario'];
			$login_user = $user['login'];
			session_start();
			$_SESSION["login_user"] = $login_user;
			$_SESSION["logado"] = $logado;
			$_SESSION["nome"] = $user["nome"];
			header("Location: home.php");
			exit;
		}
		else
		{
			echo "<center><br><b>Usuário ou senha inválido. Tente novamente.</b></center>";
			echo "<center><a href = './login.php'>Voltar</a></center>";
		}
	}
	else
	{
		header("Location: home.php");
		exit;
	}
	?></div>
</body>
</html>
	<?php
}
?>