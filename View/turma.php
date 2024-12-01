<?php
session_start(); // Inicia a sessão

// Verificar se o professor está logado
if (!isset($_SESSION['idProfessor'])) {
    // Se não estiver logado, redireciona para a página de login
    //header('Location: login.php');
    exit();
}

// A partir daqui, você já pode acessar o ID do professor
$idProfessor = $_SESSION['idProfessor'];

// Agora, no momento de inserir a turma, você pode passar o $idProfessor para o controlador
?>
<form action="CadastroTurma.php" method="POST">
    <input type="text" name="nome" placeholder="Nome da Turma" required />
    <button type="submit" name="cadastrar">Cadastrar</button>
</form>

<?php
// No código do seu controlador, você vai pegar o ID do professor da sessão
if (isset($_POST['cadastrar'])) {
    // Criando a turma
    $turma = new Turma();
    $turma->setNome($_POST['nome']);
    $turma->setIdProfessor($idProfessor); // Atribuindo o ID do professor logado

    // Chame o método para inserir a turma
    $turmaController = new TurmaController();
    $turmaController->insertTurma($turma);
}
?>
