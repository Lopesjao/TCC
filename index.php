<?php
require_once 'Control/QuizController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'quiz';
$action = isset($_GET['action']) ? $_GET['action'] : 'listarQuizzes';

$quizController = new QuizController();

if ($controller == 'quiz' && $action == 'listarQuizzes') {
    //$quizController->listarQuizzes();
     $quizController->criarQuiz();
} elseif ($controller == 'quiz' && $action == 'criarQuiz') {
    $quizController->criarQuiz();
} elseif ($controller == 'quiz' && $action == 'jogarQuiz') {
    $quizController->jogarQuiz($_GET['id']);
}
?>
