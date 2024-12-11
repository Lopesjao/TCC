<?php

session_start();
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';

$prof = new Professor(unserialize($_SESSION["professor"]));
$_SESSION['usuario_sessao'] = $prof->getidProfessor();
$_SESSION['tipo'] = "prof";



$professorId = $_SESSION['usuario_sessao'];
//echo $professorId;


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Quiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style.css">
    <style>
.btn{
    margin-top: 3%;
}
    </style>
</head>

<body>
    <?php require_once "navbar.php"; ?>
    
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 800px; width: 100%;">
            <h2 class="text-center mb-4">Criar Quiz</h2>

            <!--  mensagem de sucesso na sessão -->
            <?php
          
            if (isset($_SESSION['quiz_criado']) && $_SESSION['quiz_criado'] === true) {
                echo '<div class="alert alert-success" role="alert">Quiz criado com sucesso!</div>';
                unset($_SESSION['quiz_criado']); // Limpa a mensagem após exibi-la
            }
            ?>

            <form action="criar_quiz_action.php" method="POST">
                <div class="mb-3">
                    <label for="quiz_nome" class="form-label">Nome do Quiz:</label>
                    <input type="text" id="quiz_nome" name="quiz_nome" class="form-control" required>
                </div>

                <h4>Selecione as Perguntas para o Quiz:</h4>

                <div class="mb-3">
                    <?php
                    // gambiarra.com
                    $pdo = new PDO("mysql:host=localhost;dbname=bdinfoquest;charset=utf8", "root", "");

                    // ID do professor 
                    $professor_id = $_SESSION['usuario_sessao'];

                  
                    $stmt = $pdo->prepare("SELECT * FROM quiz WHERE professor_id = :professor_id");
                    $stmt->execute(['professor_id' => $professor_id]);

                    // Exibe as perguntas 
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="form-check">';
                        echo '<input type="checkbox" class="form-check-input" name="perguntas[]" value="' . $row['id'] . '">';
                        echo '<label class="form-check-label">' . htmlspecialchars($row['pergunta']) . '</label>';
                        echo '</div>';
                    }
                    ?>
                </div>

                <button type="submit" class="btn btn-primary w-100">Criar Quiz</button>
                <a class="btn btn-primary w-100" href="exibir_quizzes.php"> Visualizar Quiz </a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <footer><?php require_once "footer.php"; ?></footer>
</body>

</html>
