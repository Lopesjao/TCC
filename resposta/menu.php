<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>PHP e Banco de Dados</title>
	<style type="text/css">
	body {
		margin:5;
		padding:5;
		background:#66FF99;
		text-align:center;	
	}
	</style>
</head>
</head>
<body>
	<?php
		include 'consultar.php';
		
		if(isset($_POST["opcao"])){
			$opcao = $_POST["opcao"];
		}else{
			header('Location: index.php');
		}
	?>
	<h1>PHP e Banco de Dados</h1>	
	<?php 
		if($opcao == "cadastrar") {
	?>
	<h2>Cadastro de Funcionários</h2>
	<form name="entrada" method="post" action="inserir.php">
		Nome:  <input type="text" name="nome"> &nbsp;
		Email: <input type="text" name="email"> &nbsp;
		Cargo: <input type="text" name="cargo"><br><br>
		<input type="submit" name="botao" value="Cadastrar">
	</form>
	<?php
		}else{	
	?>
		<h2>Consulta de Funcionários</h2>
	<?php 
			listarFuncionariosNoCombo();
			echo "<br>";
			listarCargosNoCombo();
		}
	?>	
</body>
</html>

