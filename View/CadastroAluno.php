<?php
//include_once "../Conexao/Conexao.php"; 
//include_once '../Conexao/ConfigConexao.php'; 


//$db = "bdinfoquest";
//$usuario = "root";
//$senha = " ";
//$conexao = conectar($db, $usuario, $senha);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $datanasc = $_POST['datanasc'];
    $matAluno = $_POST['matricula'];

  
    if (!empty($nome) && !empty($email) && !empty($datanasc) && !empty($matAluno)) {
       
        $sql = "INSERT INTO Aluno (Nome, Email, Dataliasc, MatAluno) VALUES (:nome, :email, :datanasc, :matAluno)";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':datanasc', $datanasc);
        $stmt->bindParam(':matAluno', $matAluno);
        
      
        if ($stmt->execute()) {
            echo "Aluno cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar aluno.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>
    <form action="CadastroAluno.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="datanasc">Data de Nascimento:</label>
        <input type="date" id="datanasc" name="datanasc" required><br><br>

        <label for="matricula">Matrícula (MatAluno):</label>
        <input type="text" id="matricula" name="matricula" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
