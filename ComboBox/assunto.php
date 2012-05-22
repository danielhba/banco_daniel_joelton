<?php
include ("config.php");
$nome_disciplina = $_POST['nome_disciplina'];
$sql = "SELECT codigo, nome FROM assunto WHERE codigo IN (
SELECT cod_assunto FROM assunto_refere_disciplina WHERE (cod_disciplina = $nome_disciplina))";
$result = mysql_query($sql, $con) or die(mysql_error());

if(mysql_num_rows($result) == 0)
{
	echo '<option value = "0">'.htmlentities("Não há disciplinas à área").'</option>';
}
else
{
	echo '<option value="-1"></option>';	
	while($row = mysql_fetch_assoc($result))
	{
		echo '<option value="'.$row['codigo'].'">'.htmlentities($row['nome']).'</option>';
	}
}
?>