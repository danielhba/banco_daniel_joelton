<?php
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
	//conferindo login e senha para seguranca do sistema
	if($login == $user['login'])
	{
		if($senha == $user['senha'])
		{
		$logado = "1";
		$login_user = $user['login'];
		
		//criar sessao
		session_start();
		
		$_SESSION["login_user"] = $login_user;
		$_SESSION["logado"] = $logado;
		//redirecionar para pagina privada
		
		header("Location: cadastro.php");
		exit;	
		}
		else
		{
			echo "A senha nao confere";	
			exit;
		}	
	}
	else	
	{
		echo "usuario nao confere";	
		
	}
	
}

else
{
	echo "<h3>Usuário ou Senha Inválido!!. Tente Novamente</h3>";
	echo "<BR><a href = './formulario_login.php'>Retornar</a>";
	
}
?>
