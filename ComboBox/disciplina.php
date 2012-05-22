<?php
include ("config.php");
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
	echo '<option value="-1"></option>';	
	while($row = mysql_fetch_assoc($result))
	{
		echo '<option value="'.$row['codigo'].'">'.htmlentities($row['nome']).'</option>';
	}
}
?>