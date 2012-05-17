<html><head><title><?php 
echo (isset($_GET["codigo"]) || isset($_POST["codigo"])) ? "Editar Área": "Cadastrar Área"?>
</title>
</head>
<body>

<?php 
	if(isset($_POST["validar"])){
		$error = false;
		
		if(isset($error_nome)) unset($error_nome);
				
		$nome = trim($_POST['nome']);
		
			
		if(empty($nome)){		//comeca a validacao do nome
			$error = true;
			$error_nome = '<font color = "red">Informe o nome da área.</font>';
			
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
				$sql = "SELECT codigo FROM area WHERE codigo ='".$_POST["codigo"]."'";
				$result = mysql_query($sql, $con);
			
				if(mysql_num_rows($result)!= 0)
				$sql = "UPDATE area SET
				 				codigo = '',
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
			$sql = "INSERT INTO area VALUES(
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
<h2><?php  echo isset($_POST['codigo'])? "Edição de área" : "Cadastro de área";?></h2></center>

<center>
<h3><?php  echo isset($_POST[' codigo']) ? " Confirmação de edição":"Confirmação de cadastro de área";?></h3></center>

<center><?php echo isset($_POST['codigo'])? " Edição realizada com sucesso!":"Cadastro realizado com sucesso!"?></center>


<table border = "0" align = "center"  width = "35%">
	<tr>
		<td>
		<center><input type = "button"  value = "Voltar para lista de áreas"
				onclick = "location.href = 'area_lista.php'"> 
		</center>
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
			$sql = "SELECT * FROM area WHERE codigo =".$_GET["codigo"];
			$con = mysql_connect($host,$login,$senha);
			$bd = mysql_select_db($bd,$con);
			$result = mysql_query($sql,$con);
			$vetor = mysql_fetch_array($result,MYSQL_ASSOC);
			mysql_close($con);
		}
	}
	
	if(!isset($vetor['nome']))$vetor['nome'] = '';
	
?>
<center>
<h3>
<?php 
	echo isset($_GET["codigo"]) ? " Editar Área":" Cadastrar Área";?>
	
</h3>
</center>

<form name = "form1" method = "POST" action = "area_editar.php">
<?php 
	if(isset($_GET["codigo"]))
	{
?>	
<input type  = "hidden" name = "codigo" value = "<?php echo $_GET["codigo"]?>">
<?php 
	}
?>
<input type = "hidden" name = "validar" value = "ok">
<table border = "0" align = "center" width = "60%">
<?php 
	if(isset($error_nome))
	{
?>
	<tr>
		<td width = "40%" align = "right"></td>
		<td width = "60%"><?php  echo $error_nome ?></td> 
	</tr>
<?php 		
	}
?>
	<tr>
		<td width = "40%"> *Nome:</td>
		<td colspan = "2" width = "60%"><input type = "text" name = "nome"
		value = "<?php  echo $vetor['nome']?>" maxlength = "50" size = "50"></td>
	</tr>
	
	<tr>
		<td colspan = "3" align = "center">
		<input type = "submit" value = "gravar">
		<input type = "button"  value = "Cancelar"
		onclick = "location.href = 'area_lista.php'">
		</td>
	</tr>

</table>
</form>
</body>
</html>
