<?php
session_start();

if (!isset($_SESSION["aluno"]) && !isset($_SESSION["professor"])) {
    header("Location: login.php");
    exit;
}
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Model/Professor.php';

include_once __DIR__ . '/../Control/ProfessorControle.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
// Conexão com o banco de dados
$pdo = new PDO("mysql:host=localhost;dbname=bdinfoquest;charset=utf8", "root", "");

// Recupera todos os quizzes disponíveis para os alunos
$stmt = $pdo->prepare("SELECT * FROM quizzes");
$stmt->execute();
//$aluno = new Aluno(unserialize($_SESSION["aluno"]));
//$_SESSION['usuario_sessao'] = $aluno->getNome();
$professor = new Professor(unserialize($_SESSION['professor']));
$_SESSION['usuario_sessao'] = $professor->getNome();

$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Quizzes</title>
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
.btn{
    margin-top: 3%;
}
    </style>
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container justify-content-center align-items-center">
        <h2 class="text-center mb-4">Quizzes Criados por  <?php echo htmlspecialchars($_SESSION['usuario_sessao']); ?></h2>

        <?php if (count($quizzes) > 0): ?>
            <div class="list-group">
                <?php foreach ($quizzes as $quiz): ?>
                    <a href="responderQuiz.php?quiz_id=<?php echo $quiz['id']; ?>" class="list-group-item list-group-item-action">
                        <?php echo htmlspecialchars($quiz['nome_quiz']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Não há quizzes disponíveis no momento.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <footer><?php require_once "footer.php"; ?></footer>
   

</body>

</html>
