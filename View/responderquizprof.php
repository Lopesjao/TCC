<?php
session_start();
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';


$aluno = new Aluno(unserialize($_SESSION["aluno"]));
$_SESSION['usuario_sessao'] = $aluno->getidAluno();

$aluno_id = $_SESSION['usuario_sessao'];
$quiz_id = isset($_GET['quiz_id']) ? $_GET['quiz_id'] : null;

if ($quiz_id === null) {
    echo "Quiz não encontrado!";
   // exit;
}

$pdo = new PDO("mysql:host=localhost;dbname=bdinfoquest;charset=utf8", "root", "");

// Busca perguntas do quiz
$stmt = $pdo->prepare("SELECT p.id, p.pergunta, p.alternativa_a, p.alternativa_b, p.alternativa_c, p.alternativa_d
                       FROM quiz p
                       JOIN quiz_perguntas qp ON p.id = qp.pergunta_id
                       WHERE qp.quiz_id = :quiz_id");
$stmt->bindParam(':quiz_id', $quiz_id, PDO::PARAM_INT);
$stmt->execute();
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$resultado = null; // Variável para armazenar o resultado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respostas = $_POST['respostas'];  // Respostas enviadas pelo aluno
    $corretas = 0;

    foreach ($respostas as $pergunta_id => $resposta_aluno) {
        // Verifica a resposta correta
        $stmt = $pdo->prepare("SELECT correta FROM quiz WHERE id = :pergunta_id");
        $stmt->bindParam(':pergunta_id', $pergunta_id, PDO::PARAM_INT);
        $stmt->execute();
        $resposta_correta = $stmt->fetchColumn();

        // Verifica se a resposta está correta
        if ($resposta_aluno === $resposta_correta) {
            $corretas++;
        }

        // Registra a resposta do aluno na tabela 'respostas'
        $stmt = $pdo->prepare("INSERT INTO respostas (quiz_id, aluno_id, resposta) 
                               VALUES (:quiz_id, :aluno_id, :resposta)");
        $stmt->bindParam(':quiz_id', $pergunta_id);
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->bindParam(':resposta', $resposta_aluno);
        $stmt->execute();
    }

    // Armazena o resultado na variável
    $resultado = "<div class='alert alert-info mt-4'>
                    <h3>Você acertou $corretas de " . count($perguntas) . " questões!</h3>
                  </div>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responder Quiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Responda o Quiz</h2>

        <form method="POST">
            <?php foreach ($perguntas as $pergunta): ?>
                <fieldset class="mb-4">
                    <legend><?php echo htmlspecialchars($pergunta['pergunta']); ?></legend>
                    
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="respostas[<?php echo $pergunta['id']; ?>]" value="A" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($pergunta['alternativa_a']); ?></label>
                    </div>
                    
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="respostas[<?php echo $pergunta['id']; ?>]" value="B">
                        <label class="form-check-label"><?php echo htmlspecialchars($pergunta['alternativa_b']); ?></label>
                    </div>
                    
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="respostas[<?php echo $pergunta['id']; ?>]" value="C">
                        <label class="form-check-label"><?php echo htmlspecialchars($pergunta['alternativa_c']); ?></label>
                    </div>
                    
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="respostas[<?php echo $pergunta['id']; ?>]" value="D">
                        <label class="form-check-label"><?php echo htmlspecialchars($pergunta['alternativa_d']); ?></label>
                    </div>
                </fieldset>
            <?php endforeach; ?>
            
            <button type="submit" class="btn btn-primary w-100">Enviar Respostas</button>
        </form> 

        <?php if ($resultado): ?>
            <?php echo $resultado; ?>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <footer><?php require_once "footer.php"; ?></footer>
</body>

</html>
