<?php
	if(isset($_POST["botao"])){
		if(!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["cargo"])){
			
			echo '<style type="text/css">
					body {
						margin:5;
						padding:5;
						background:#66FF99;
						text-align:center;	
					}
				 </style>';
		
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$cargo = $_POST["cargo"];
		
			// Chama o método criado para inserir dados.
			inserir($nome, $email, $cargo);
		
			echo "<h2>Cadastro realizado com sucesso: </h2>";
			// Chama o método para consultar e verificar.
			consultarNome($nome);
		
			// Botão para voltar ao index.php
			echo '<br><form name="voltar" method="post" action="index.php">
				  <input type="submit" name="botao" value="Voltar"></form>';
		}else{
			header('Location: index.php');
		}
	}
	
	function inserir($nome, $email, $cargo){
		$conexao = conectar("agenda", "root", "");
		$sql = "INSERT INTO Funcionario (nome, email, cargo) values (:nome, :email, :cargo)";
		$pstmt = $conexao->prepare($sql);
		$pstmt->bindValue(":nome", $nome);
		$pstmt->bindValue(":email", $email);
		$pstmt->bindValue(":cargo", $cargo);
		$pstmt->execute();	
		$conexao = encerrar();
	}

	
	function consultarNome($nome){
		$conexao = conectar("agenda", "root", "");
		$sql = "SELECT * FROM Funcionario where nome = :nome";
		$pstmt = $conexao->prepare($sql);
		$pstmt->bindValue(":nome", $nome);
		$pstmt->execute();
	
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