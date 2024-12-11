<?php
session_start();

include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';

$tipoAutor = ''; // Inicializa a variável do tipoAutor
$usuario_id = 0; // Inicializa a variável usuario_id

// Verifica se o usuário está logado como aluno ou professor
if (!isset($_SESSION["aluno"]) && !isset($_SESSION["professor"])) {
    header("Location: login.php");
    exit;
}

// Conexão com o banco de dados
$pdo = new PDO("mysql:host=localhost;dbname=bdinfoquest;charset=utf8", "root", "");

// Verifica se o formulário de resposta foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idErro = $_POST['idErro'];
    $resposta = $_POST['resposta'];

    // Identifica se o usuário é aluno ou professor
    if (isset($_SESSION["aluno"])) {
        $aluno = new Aluno(unserialize($_SESSION["aluno"]));
        $usuario_id = $aluno->getidAluno();
        $tipoAutor = 'aluno';
    } elseif (isset($_SESSION["professor"])) {
        $professor = new Professor(unserialize($_SESSION["professor"]));
        $usuario_id = $professor->getidProfessor();
        $tipoAutor = 'professor';
    }

    // Insere a resposta no banco
    $stmt = $pdo->prepare("INSERT INTO resposta_erro (idErro, resposta, idUsuario, tipoUsuario) 
                           VALUES (:idErro, :resposta, :idUsuario, :tipoUsuario)");
    $stmt->bindParam(':idErro', $idErro, PDO::PARAM_INT);
    $stmt->bindParam(':resposta', $resposta, PDO::PARAM_STR);
    $stmt->bindParam(':idUsuario', $usuario_id, PDO::PARAM_INT);
    $stmt->bindParam(':tipoUsuario', $tipoAutor, PDO::PARAM_STR);
    $stmt->execute();

    $mensagem = "Resposta enviada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erros Cadastrados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Erros Cadastrados</h2>

        <?php if (isset($mensagem)): ?>
            <div class="alert alert-info">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>

        <?php
        // Recupera todos os erros cadastrados
        $stmt = $pdo->query("SELECT e.idErro, e.descricaoErro, a.nome AS nomeAluno 
                             FROM erros e
                             JOIN aluno a ON e.idAluno = a.idAluno");
        $erros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php if (count($erros) > 0): ?>
            <?php foreach ($erros as $erro): ?>
                <div class="card mb-3">
                    <div class="card-body">
                 
                        <p class="card-text"><strong>Descrição:</strong> <?php echo htmlspecialchars($erro['descricaoErro']); ?></p>
                        <p class="card-text"><small class="text-muted">Cadastrado por: <?php echo htmlspecialchars($erro['nomeAluno']); ?></small></p>

                        <!-- Respostas já cadastradas -->
                        <?php
                        $stmt = $pdo->prepare("SELECT resposta
                                               FROM resposta_erro 
                                               WHERE idErro = :idErro");
                        $stmt->bindParam(':idErro', $erro['idErro'], PDO::PARAM_INT);
                        $stmt->execute();
                        $respostas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php if (count($respostas) > 0): ?>
                            <div class="mt-3">
                                <h6>Respostas:</h6>
                                <ul>
                                    <?php foreach ($respostas as $resposta): ?>
                                        <li>
                                            <?php echo htmlspecialchars($resposta['resposta']); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Formulário para responder -->
                        <form method="POST" class="mt-3">
                            <input type="hidden" name="idErro" value="<?php echo $erro['idErro']; ?>">
                            <div class="mb-3">
                                <textarea name="resposta" class="form-control" rows="2" placeholder="Digite sua solução..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar Resposta</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Nenhum erro cadastrado no momento.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <footer><?php require_once "footer.php"; ?></footer>
</body>
</html>
