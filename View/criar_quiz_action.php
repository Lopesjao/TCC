<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=localhost;dbname=bdinfoquest;charset=utf8", "root", "");

    // Recupera os dados do formulário
    $quiz_nome = $_POST['quiz_nome'];
    $professor_id = $_SESSION['usuario_sessao'];
    echo $professor_id;
    $perguntas = $_POST['perguntas']; // Perguntas selecionadas pelo professor

    // Insere o novo quiz
    $stmt = $pdo->prepare("INSERT INTO quizzes (nome_quiz, professor_id) VALUES (:quiz_nome, :professor_id)");
    $stmt->execute(['quiz_nome' => $quiz_nome, 'professor_id' => $professor_id]);

    // Recupera o ID do quiz recém-criado
    $quiz_id = $pdo->lastInsertId();

    // Associa as perguntas selecionadas ao quiz
    foreach ($perguntas as $pergunta_id) {
        $stmt = $pdo->prepare("INSERT INTO quiz_perguntas (quiz_id, pergunta_id) VALUES (:quiz_id, :pergunta_id)");
        $stmt->execute(['quiz_id' => $quiz_id, 'pergunta_id' => $pergunta_id]);
    }

    $_SESSION['quiz_criado'] = true;

    // Redireciona de volta para a página de visualização do quiz
    header("Location: visualizar_quiz.php");
    exit();
}
?>
