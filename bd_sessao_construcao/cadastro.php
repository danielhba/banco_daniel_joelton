<html>
<head>
<title>�rea Restrita do Usu�rio</title>
</head>
<body>
<center><h3>�rea Restrita do Usu�rio</h3></center>

<?php 
session_start();
include("config.php");


if($_SESSION['logado'] == 1)
{
	$sql = "SELECT * FROM usuario WHERE login ='".$_SESSION['login_user']."'";
	$consulta  =  mysql_query($sql) or die (mysql_error());
	$total = mysql_num_rows($consulta);
	
	
	if($total)
	{
		$user = mysql_fetch_array($consulta,MYSQL_ASSOC);

?>		


<?php 
		
		if($user['tipo_usuario'] == 1)
		{
		echo "STATUS: ADMINISTRADOR  ";
		
		
		}
		if($user['tipo_usuario'] == 2)
		{
		echo "STATUS: PROFESSOR  ";

		
		}
	 	else if($user['tipo_usuario'] == 3)
		{
		echo "STATUS: ALUNO";
			
		}

?>

<h5 align =left>Seja Bem Vindo,   <?php echo $user['nome']?></h5>

<?php 
		echo "<BR><a href = './logout.php'>Sair</a>";	
	}
		
	
}
else
{
	echo "DESCULPE, MAS VOC� NAO EST� LOGADO.";
	echo "<BR> TUDO OCULTO PARA VOC�";
	echo "<BR><a href = './formulario_login.php'>Retornar para Logar</a>";
}
?>

</body>
</html>
