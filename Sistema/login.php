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
<div id="leftMain"><a href="index.html"><img src="images/logo.png"
	alt="Estude e Estude" border="0" /></a></div>
<div id="main">
<div></div>
<div id="mainphotos"><img src="images/picture1.jpg" alt="Photo 1"
	width="119" height="54" /><img src="images/picture2.jpg" alt="Photo 2"
	width="119" height="54" /><img src="images/learning-is-fun.gif"
	alt="Learning is Fun" width="119" height="54" /><img
	src="images/picture3.jpg" alt="Photo 3" width="119" height="54" /></div>
<div id="maintext"><img src="images/welcome.png" alt="Welcome" />
<center>
<h2>LOGIN</h2>
</center>
<form action="login_autenticar.php" method="Post"><br>
<table align="center" width="100%">
	<tr align="center">
		<td align="right">Login:</td>
		<td align="left"><input name="login" type="text" /></td>
	</tr>
	<tr align="center">
		<td align="right">Senha:</td>
		<td align="left"><input name="senha" type="password" /></td>
	</tr>
	<tr align="center">
		<td></td>
		<td align="left"><input type="submit" value="Acessar"></td>
	</tr>
</table>
</form>
</div>
</div>
</body>
</html>
	<?php
}
?>