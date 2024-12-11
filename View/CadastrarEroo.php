<?php
session_start();
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';

// Verifica se o usuário está logado como aluno
if (!isset($_SESSION["aluno"]) && !isset($_SESSION["professor"])) {
    header("Location: login.php");
    exit;
}
$aluno = new Aluno(unserialize($_SESSION["aluno"]));
$idAluno = $aluno->getidAluno();

// Conexão com o banco de dados
$pdo = new PDO("mysql:host=localhost;dbname=bdinfoquest;charset=utf8", "root", "");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricaoErro = $_POST['descricaoErro'];

    // Insere o erro no banco de dados
    $stmt = $pdo->prepare("INSERT INTO erros (descricaoErro, idAluno) VALUES (:descricaoErro, :idAluno)");
    $stmt->bindParam(':descricaoErro', $descricaoErro, PDO::PARAM_STR);
    $stmt->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $mensagem = "Erro cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar o erro. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Erro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<style>
.btn{
    margin-top: 3%;
}
    </style>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastrar Erro</h2>

        <?php if (isset($mensagem)): ?>
            <div class="alert alert-info">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="descricaoErro" class="form-label">Descreva o erro:</label>
                <textarea id="descricaoErro" name="descricaoErro" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cadastrar Erro</button>
            <a class="btn btn-primary w-100"href="Vererro.php">Ver Erros</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <footer><?php require_once "footer.php"; ?></footer>
</body>
</html>
