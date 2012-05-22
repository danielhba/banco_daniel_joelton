<html>
<head>
<title>COMBO</title>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select[name=area]").change(function(){
		$("select[name=disciplina]").html('<option value="-1" disabled="disabled">Selecione a área primeiro</option>');
		$.post("disciplina.php",
			{nome_area:$(this).val()},
			function(valor)
			{
				$("select[name=disciplina]").html(valor);
			}
		);
		$("select[name=assunto]").html('<option value="-1" disabled="disabled">Selecione a disciplina primeiro</option>');
		$.post("assunto.php",
			{nome_disciplina:$(this).val()}
		);
	});
	$("select[name=disciplina]").change(function(){
		$("select[name=assunto]").html('<option value="-1" disabled="disabled">Selecione a disciplina primeiro</option>');
		$.post("assunto.php",
			{nome_disciplina:$(this).val()},
			function(valor)
			{
				$("select[name=assunto]").html(valor);
			}
		);
		});
	});
</script>
</head>
<body>
<form action="" method="post">
<table align="center" width="900px">
	<tr>
		<td align="right" width="40%">Área:</td>
		<td width="60%"><select name="area">

			<option value="-1">Escolha uma area</option>
			<?php
			include("config.php");
			$result = "SELECT * FROM area ORDER BY nome";
			$ql = mysql_query($result);
			if(!$ql)
			{
				echo "Nao foi possivel executar a query ($sql):	".mysql_error();
			}
			if(mysql_num_rows($ql) == 0)
			{
				echo "Não há áreas cadastradas";
				exit;
			}
			while($ln = mysql_fetch_assoc($ql))
			{
				echo '<option value = "'.$ln['codigo'].'">'.$ln['nome'].'</option>';
			}
			?>
		</select></td>
	</tr>
	<tr>
		<td align="right">Disciplina:</td>
		<td><select name="disciplina">
			<option value="0" disabled="disabled">Escolha uma área primeiro</option>
		</select></td>
	</tr>
	<tr>
		<td align="right">Assunto:</td>
		<td><select name="assunto">
			<option value="0" disabled="disabled">Escolha uma disciplina primeiro</option>
		</select></td>
	</tr>
	<tr>
		<td align="right">Dificuldade:</td>
		<td><input type="checkbox" name="dificuldade[]" value=1> 1 <input
			type="checkbox" name="dificuldade[]" value=1> 2 <input
			type="checkbox" name="dificuldade[]" value=1> 3 <input
			type="checkbox" name="dificuldade[]" value=1> 4 <input
			type="checkbox" name="dificuldade[]" value=1> 5</td>
	</tr>
</table>
</form>
</body>
</html>