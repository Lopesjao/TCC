<?php
//include_once __DIR__ . "../Conexao/Conexao.php"; 
include_once __DIR__ . '/../Conexao/ConfigConexao.php'; 


//$db = "bdinfoquest";
//$usuario = "root";
//$senha = " ";
//$conexao = conectar($db, $usuario, $senha);

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
    
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
