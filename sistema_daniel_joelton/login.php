<?php
session_start();
include("config.php");
$con = mysql_connect($host, $log, $senha) or die("N�o foi poss�vel estabelecer conex�o com o Servidor");
$banco = mysql_select_db($bd, $con) or die("N�o foi poss�vel estabelecer conex�o com o banco de Dados");
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
<form action="login_autenticar.php" method="Post"><br>
<table width="900">
	<tr>
		<td align="right" width="47%">Login:</td>
		<td align="left" width="53%"><input name="login" type="text" /></td>
	</tr>
	<tr>
		<td align="right" width="47%">Senha:</td>
		<td align="left" width="53%"><input name="senha" type="password" /></td>
	</tr>
	<tr>
		<td></td>
		<td align="left"><input type="submit" value="Acessar"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>
	<?php
}
?>