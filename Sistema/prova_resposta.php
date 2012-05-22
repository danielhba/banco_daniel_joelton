<html>
<head>
<title>Teste - Resposta</title>
</head>
<body>
<center>
<h3>Teste - Resposta</h3>
</center>
<?php
$total_acerto = 0;
if(isset($_POST["quantidade"])){
	for($i = 1; $i <= $_POST["quantidade"]; $i++)
	{
		include("config.php");
		$con = mysql_connect($host, $log, $senha);
		mysql_select_db($bd, $con);
		$tabela = mysql_query("SELECT alternativa_correta, resposta_1, resposta_2, resposta_3, resposta_4, resposta_5, enunciado FROM questao WHERE id= '".$_POST["id"."$i"]."'");
		$correto = mysql_fetch_row($tabela);
		if (isset($_POST["resposta"."$i"]) && $correto[0] == $_POST["resposta"."$i"])
		{ $total_acerto++;
		?>
<br>
<table>
	<tr>
		<td width="80%"><b><?php echo "Acertado ". $total_acerto ." de " . $_POST["quantidade"] . "."?></b>
		</td>
	</tr>
	<tr>
		<td width="80%"><?php echo $i."º) ".$correto[6]?></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td>a) <?php if($correto[0] == 1) echo "<b> ".$correto[1]."</b>"; else echo $correto[1] ?></td>
	</tr>
	<tr>
		<td>b) <?php if($correto[0] == 2) echo "<b> ".$correto[2]."</b>"; else echo $correto[2] ?></td>
	</tr>
	<tr>
		<td>c) <?php if($correto[0] == 3) echo "<b> ".$correto[3]."</b>"; else echo $correto[3] ?></td>
	</tr>
	<tr>
		<td>d) <?php if($correto[0] == 4) echo "<b> ".$correto[4]."</b>"; else echo $correto[4] ?></td>
	</tr>
	<tr>
		<td>e) <?php if($correto[0] == 5) echo "<b> ".$correto[5]."</b>"; else echo $correto[5] ?></td>
	</tr>
</table>
<br>
		<?php
		}
		else{
			?>
<br>
<table>
	<tr>
		<td width="80%"><b><?php echo "Acertado ". $total_acerto ." de " . $_POST["quantidade"] . "."?></b>
		</td>
	</tr>
	<tr>
		<td width="80%"><?php echo $i."º) ".$correto[6]?></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td>a) <?php if($correto[0] == 1) echo "<font color=\"red\"><b> ".$correto[1]."</b></font>"; else echo $correto[1] ?></td>
	</tr>
	<tr>
		<td>b) <?php if($correto[0] == 2) echo "<font color=\"red\"><b> ".$correto[2]."</b></font>"; else echo $correto[2] ?></td>
	</tr>
	<tr>
		<td>c) <?php if($correto[0] == 3) echo "<font color=\"red\"><b> ".$correto[3]."</b></font>"; else echo $correto[3] ?></td>
	</tr>
	<tr>
		<td>d) <?php if($correto[0] == 4) echo "<font color=\"red\"><b> ".$correto[4]."</b></font>"; else echo $correto[4] ?></td>
	</tr>
	<tr>
		<td>e) <?php if($correto[0] == 5) echo "<font color=\"red\"><b> ".$correto[5]."</b></font>"; else echo $correto[5] ?></td>
	</tr>
</table>
			<?php
		}
	}
	?>
<br>

<table border="0" align="center" width="100%">
	<tr>
		<td><b><?php echo "Total de acertos: " . $total_acerto . " de " . $_POST["quantidade"]."."?></b>
		</td>
	</tr>
</table>
	<?php
}
?>
<br>
<form name="form1" method="post" action="prova_questao.php">
<table border="0" align="center" width="100%">
	<tr>
		<td align="center"><input type="submit" value="Realizar outra prova"></td>
	</tr>
</table>
</form>
</body>
</html>