<?php
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';



if (isset($_POST['cadastrar'])) {
    /*  $nome = $_POST['nome'];
      $email = $_POST['email'];
      $matricula = $_POST['matricula'];
      $dataNasc = $_POST['datanasc'];
      $senha = $_POST['senha'];

      $aluno = new Aluno();
      $aluno->setNome($nome);
      $aluno->setEmail($email);
     
      $aluno->setDataNasc($dataNasc);
      $aluno->setSenha($senha);
  */

    $aluno = new Aluno($_POST);
//converter data para o mysql
    $aluno->setDataNasc(date("Y-m-d H:i:s",strtotime($_POST['datanasc'])));
   var_dump($_POST);
    $alunoController = new AlunoController();
    $resultado = $alunoController->insertAluno($aluno);

    if ($resultado) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar aluno!";
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

        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="Matricula" required><br><br>

        <label for="datanasc">Data de Nascimento:</label>
        <input type="date" id="datanasc" name="datanasc" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
</body>

</html>