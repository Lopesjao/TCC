<?php
// Inclua os arquivos necessários
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';

// Defina a quantidade de itens por página
$itensPorPagina = 5;

// Verifique se a página foi definida via GET
$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

// Crie a instância do controlador de turma
$turmaController = new TurmaController();
$resultado = $turmaController->consultarTurmasComAlunos($pagina, $itensPorPagina);
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
        <table class="table table-bordered mt-4">
            <thead>
                <tr>

                    <th>Nome da Turma</th>

                    <th>Alunos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turmasComAlunos as $turma): ?>
                    <tr>

                        <td><?php echo $turma['nome']; ?></td>
                      
                        <td>
                            <?php
                            // Exibe os alunos da turma
                            if (empty($turma['alunos'])) {
                                echo "Nenhum aluno cadastrado.";
                            } else {
                                echo "<ul>";
                                foreach ($turma['alunos'] as $aluno) {
                                    echo "<li>{$aluno['nome']}</li>";
                                }
                                echo "</ul>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Navegação de páginas -->
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination">
                <?php if ($paginaAtual > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=1">Primeira</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $paginaAtual - 1; ?>">Anterior</a>
                    </li>
                <?php endif; ?>

                <?php if ($paginaAtual < $totalPaginas): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $paginaAtual + 1; ?>">Próxima</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $totalPaginas; ?>">Última</a>
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