<?php
// Inclua os arquivos necessários
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';

// Defina a quantidade de itens por página
$itensPorPagina = 5;

// Verifique se a página foi definida via GET
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Verifique se foi feita uma pesquisa
$termoBusca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

// Crie a instância do controlador de turma
$turmaController = new TurmaController();
$resultado = $turmaController->consultarTurmasComAlunos($pagina, $itensPorPagina, $termoBusca);
$turmasComAlunos = $resultado['turmas'];
$totalPaginas = $resultado['totalPaginas'];
$paginaAtual = $resultado['paginaAtual'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Turmas</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Consulta de Turmas</h1>

        <!-- Barra de Pesquisa -->
        <form method="GET" action="" class="d-flex mb-4">
            <input 
                type="text" 
                name="busca" 
                class="form-control me-2" 
                placeholder="Digite o nome da turma" 
                value="<?php echo htmlspecialchars($termoBusca); ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nome da Turma</th>
                    <th>Alunos</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($turmasComAlunos)): ?>
                    <tr>
                        <td colspan="2" class="text-center">Nenhuma turma encontrada.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($turmasComAlunos as $turma): ?>
                        <tr>
                            <td><?php echo $turma['nome']; ?></td>
                            <td>
                                <?php
                                // Exibe os alunos da turma separados por vírgulas
                                if (empty($turma['alunos'])) {
                                    echo "Nenhum aluno cadastrado.";
                                } else {
                                    $nomesAlunos = array_column($turma['alunos'], 'nome');
                                    echo implode(', ', $nomesAlunos);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>   
        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            <a class="btn btn-primary" href="verTurma.php" role="button">Visualizar Turmas</a>
            <a class="btn btn-primary" href="editarTurma.php" role="button">Gerenciar Turmas</a>
        <!-- Navegação de páginas -->
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination">
                <?php if ($paginaAtual > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=1&busca=<?php echo urlencode($termoBusca); ?>">Primeira</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $paginaAtual - 1; ?>&busca=<?php echo urlencode($termoBusca); ?>">Anterior</a>
                    </li>
                <?php endif; ?>

                <?php if ($paginaAtual < $totalPaginas): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $paginaAtual + 1; ?>&busca=<?php echo urlencode($termoBusca); ?>">Próxima</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $totalPaginas; ?>&busca=<?php echo urlencode($termoBusca); ?>">Última</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
