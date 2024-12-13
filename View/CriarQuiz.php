<?php
// Inicia a sessão
session_start();
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';
if ( !isset($_SESSION["professor"])) {
    header("Location: login.php");
    exit;
}
$prof = new Professor(unserialize($_SESSION["professor"]));
$_SESSION['usuario_sessao'] = $prof->getidProfessor();
$_SESSION['tipo'] = "prof";



$professorId = $_SESSION['usuario_sessao'];
//echo ''. $professorId .'';
// Conexão com o banco de dados gambiarra pq n utilizei a classe conexao aqui
$host = 'localhost';
$db = 'bdinfoquest';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Configuração de conexão com PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

// Verifica se o professor está logado (se a sessão contém o ID do professor)
if (!isset($_SESSION['usuario_sessao'])) {
    echo "Você precisa estar logado para criar um quiz!";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pergunta = $_POST['pergunta'];
    $alternativa_a = $_POST['alternativa_a'];
    $alternativa_b = $_POST['alternativa_b'];
    $alternativa_c = $_POST['alternativa_c'];
    $alternativa_d = $_POST['alternativa_d'];
    $correta = $_POST['correta'];  // A, B, C, ou D
    $professor_id = $_SESSION['usuario_sessao'];  // ID do professor da sessão

    // Preparar a consulta SQL para inserir os dados na tabela quiz
    $sql = "INSERT INTO quiz (pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, correta, professor_id) 
            VALUES (:pergunta, :alternativa_a, :alternativa_b, :alternativa_c, :alternativa_d, :correta, :professor_id)";

    $stmt = $pdo->prepare($sql);

    // Vinculando os valores
    $stmt->bindParam(':pergunta', $pergunta);
    $stmt->bindParam(':alternativa_a', $alternativa_a);
    $stmt->bindParam(':alternativa_b', $alternativa_b);
    $stmt->bindParam(':alternativa_c', $alternativa_c);
    $stmt->bindParam(':alternativa_d', $alternativa_d);
    $stmt->bindParam(':correta', $correta);
    $stmt->bindParam(':professor_id', $professor_id);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Quiz criado com sucesso!";
    } else {
        echo "Erro ao criar o quiz!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Quiz</title>
   
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
.btn{
    margin-top: 3%;
}
    </style>

    
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
            <h2 class="text-center mb-4">Criar Questões</h2>

            <!-- Formulário para criar o quiz -->
            <form action="CriarQuiz.php" method="POST">
                <div class="mb-3">
                    <label for="pergunta" class="form-label">Pergunta:</label>
                    <input type="text" id="pergunta" name="pergunta" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alternativa_a" class="form-label">Alternativa A:</label>
                    <input type="text" id="alternativa_a" name="alternativa_a" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alternativa_b" class="form-label">Alternativa B:</label>
                    <input type="text" id="alternativa_b" name="alternativa_b" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alternativa_c" class="form-label">Alternativa C:</label>
                    <input type="text" id="alternativa_c" name="alternativa_c" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alternativa_d" class="form-label">Alternativa D:</label>
                    <input type="text" id="alternativa_d" name="alternativa_d" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="correta" class="form-label">Alternativa Correta:</label>
                    <select id="correta" name="correta" class="form-select" required>
                        <option value="A">Alternativa A</option>
                        <option value="B">Alternativa B</option>
                        <option value="C">Alternativa C</option>
                        <option value="D">Alternativa D</option>
                    </select>
                </div>
              
                    <button type="submit" class="btn btn-primary w-100">Criar questões</button>
                    <a class="btn btn-primary w-100" href="exibirquizprof.php"> Visualizar Quiz </a>
                    <a class="btn btn-primary w-100" href="visualizar_quiz.php"> Criar Quiz </a>
             
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <footer><?php require_once "footer.php"; ?></footer>
</body>

</html>