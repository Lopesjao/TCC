<?php
	echo '<style type="text/css">
		body {
			margin:5;
			padding:5;
			background:#66FF99;
			text-align:center;
		}
		</style>';

	if(isset($_POST['combo'])){	
		$op = $_POST['combo'];
		if($op != "0"){
			// Faz a consulta por nome
			consultarNome($op);
		}
		// Bot�o para voltar ao index.php
		echo '<br><form name="volar" method="post" action="index.php">
			  <input type="submit" name="botao" value="Voltar"></form>';
	}else{
		if(isset($_POST['combocargo'])){
			$op = $_POST['combocargo'];
			if($op != "0"){
				// Faz a consulta por nome
				consultarCargo($op);
			}
			// Bot�o para voltar ao index.php
			echo '<br><form name="volar" method="post" action="index.php">
			  <input type="submit" name="botao" value="Voltar"></form>';
		}
	}


	function listarCargosNoCombo(){
		// Cria o comboBox, para exibir os cargos
		echo '<center><form name="menucargo" method="post" action="consultar.php">
		<select name="combocargo">
		<option value="0" selected>(selecione um cargo:)</option>';
	
		// Cria a conex�o com o Banco de Dados;
		$conexao = conectar("agenda", "root", "");
		// Cria o comando SQL a ser executado.
		$sql = "SELECT DISTINCT cargo FROM Funcionario order by cargo";
		// Cria um Prepared Statement com o comando SQL anterior.
		$pstmt = $conexao->prepare($sql);
		// Executa o comando.
		$pstmt->execute();
		// Resgata todas as linhas de resultados da consulta e preenche o combo.
		while($linha = $pstmt->fetch()) {
			echo '<option value="'.$linha["cargo"].'">'.$linha["cargo"].'</option>';
		}
		// Encerra a conex�o.
		$conexao = encerrar();
	
		// Fecha o comboBox
		echo '</select> <input type="submit" value="Consultar"></form></center>';
	}
	
	function consultarCargo($cargo){
		$conexao = conectar("agenda", "root", "");
		$sql = "SELECT * FROM Funcionario where cargo = :cargo";
		$pstmt = $conexao->prepare($sql);
		$pstmt->bindValue(":cargo", $cargo);
		$pstmt->execute();
	
		echo "<h2>Registro encontrado com sucesso: </h2>";
		echo "<center><table border=1><tr><th>ID</th><th>Nome</th><th>Email</th><th>Cargo</th></tr>";
		while($linha = $pstmt->fetch()) {
			echo "<tr>";
			echo "<td>" . $linha["id"] . "</td>";
			echo "<td>" . $linha["nome"] . "</td>";
			echo "<td>" . $linha["email"] . "</td>";
			echo "<td>" . $linha["cargo"] . "</td>";
			echo "</tr>";
		}
		echo "</table></center><br>";
	
		$conexao = encerrar();
	}
	
	function listarFuncionariosNoCombo(){
		// Cria o comboBox, para exibir os nomes
		echo '<center><form name="menu" method="post" action="consultar.php">
		<select name="combo">
		<option value="0" selected>(selecione um nome:)</option>';
		
		// Cria a conex�o com o Banco de Dados;
		$conexao = conectar("agenda", "root", "");
		// Cria o comando SQL a ser executado.
		$sql = "SELECT nome FROM Funcionario order by nome";
		// Cria um Prepared Statement com o comando SQL anterior.
		$pstmt = $conexao->prepare($sql);
		// Executa o comando.
		$pstmt->execute();
		// Resgata todas as linhas de resultados da consulta e preenche o combo.
		while($linha = $pstmt->fetch()) {
			echo '<option value="'.$linha["nome"].'">'.$linha["nome"].'</option>';
		}
		// Encerra a conex�o.
		$conexao = encerrar();
		
		// Fecha o comboBox
		echo '</select> <input type="submit" value="Consultar"></form></center>';
	}

	function consultarNome($nome){
		$conexao = conectar("agenda", "root", "");
		$sql = "SELECT * FROM Funcionario where nome = :nome";
		$pstmt = $conexao->prepare($sql);
		$pstmt->bindValue(":nome", $nome);
		$pstmt->execute();
	
		echo "<h2>Registro encontrado com sucesso: </h2>";
		echo "<center><table border=1><tr><th>ID</th><th>Nome</th><th>Email</th><th>Cargo</th></tr>";
		while($linha = $pstmt->fetch()) {
			echo "<tr>";
			echo "<td>" . $linha["id"] . "</td>";
			echo "<td>" . $linha["nome"] . "</td>";
			echo "<td>" . $linha["email"] . "</td>";
			echo "<td>" . $linha["cargo"] . "</td>";
			echo "</tr>";
		}
		echo "</table></center><br>";
	
		$conexao = encerrar();
	}
	
	// Função para criar uma conexão com o Banco de Dados.
	function conectar($bd, $usuario, $senha){
		return new PDO("mysql:host=localhost; dbname=$bd", $usuario, $senha);
	}
	
	// Função para encerrar a conexão com o Banco de Dados.
	function encerrar(){
		return null;
	}
?>