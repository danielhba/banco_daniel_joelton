<?php
session_start();
include("config.php");
$con = mysql_connect($host, $log, $senha) or die("Não foi possível estabelecer conexão com o Servidor");
$banco = mysql_select_db($bd, $con) or die("Não foi possível estabelecer conexão com o banco de Dados");
if (isset($_SESSION['logado']) &&($_SESSION['logado'] != 0) && isset($_POST['nome_area'])){
	$nome_area= $_POST['nome_area'];
	$sql = "SELECT codigo, nome FROM disciplina WHERE codigo IN (
SELECT cod_disciplina FROM disciplina_refere_area WHERE (cod_area = $nome_area))";
	$result = mysql_query($sql, $con) or die(mysql_error());

	if(mysql_num_rows($result) == 0)
	{
		echo '<option value = "0">'.htmlentities("Não há disciplinas à área").'</option>';
	}
	else
	{
		echo '<option value="-1">Selecione a Disciplina</option>';
		while($row = mysql_fetch_assoc($result))
		{
			echo '<option value="'.$row['codigo'].'">'.htmlentities($row['nome']).'</option>';
		}
	}
}
?>