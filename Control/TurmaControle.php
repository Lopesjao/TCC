<?php
include_once __DIR__ . '/../Model/Turma.php';
include_once __DIR__ . '/../Conexao/Conexao.php';

class TurmaController
{
    private $conexao;


    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }


    public function insertTurma(Turma $turma)
    {
        $pstmt = $this->conexao->prepare("INSERT INTO turma (nome, idProfessor) VALUES (?, ?)");
        $pstmt->bindValue(1, $turma->getNome());
        $pstmt->bindValue(2, $turma->getIdProfessor());
        // echo "ID PROFESSOR::::",$turma->getIdProfessor();
        $pstmt->execute();
        return $pstmt;
    }
    public function insertTurma2(Turma $turma) {
        // Prepara a consulta SQL para inserir a turma
        $pstmt = $this->conexao->prepare("INSERT INTO turma (nome, idProfessor) VALUES (?, ?)");
        $pstmt->bindValue(1, $turma->getNome());
        $pstmt->bindValue(2, $turma->getIdProfessor());
        
        // Executa a inserção
        $pstmt->execute();
    
        // Obtém o ID da última inserção (da turma)
        $idTurma = $this->conexao->lastInsertId();
    
        return $idTurma; // Retorna o ID da turma inserida
    }
    

public function adicionarAlunosNaTurma($idTurma, $alunos) {
    $pstmt = $this->conexao->prepare("INSERT INTO aluno_turma (idAluno, idTurma) VALUES (?, ?)");
    foreach ($alunos as $idAluno) {
        $pstmt->bindValue(1, $idAluno);
        $pstmt->bindValue(2, $idTurma);
        $pstmt->execute();
    }
}
    public function cadastrarTurma(Turma $turma)
    {
        $sql = "INSERT INTO turma(nome, descricao, professorid ) VALUES(:enome, :eprofessorid);";
        $pstmt = $this->conexao->prepare($sql);
        $pstmt->bindValue(':enome', $turma->getNome());
        $pstmt->bindValue(':eprofessorid', $turma->getIdProfessor());
        $result = $pstmt->execute();
        return $result;
    }



    public function adicionarAlunosNaTurma2($idTurma, $alunosSelecionados)
    {
        // Prepara a query para inserir os alunos na turma
        $pstmt = $this->conexao->prepare("INSERT INTO aluno_turma (idTurma, idAluno) VALUES (?, ?)");
    
        // Itera sobre os alunos selecionados e insere cada um
        foreach ($alunosSelecionados as $idAluno) {
            // Aqui você está fazendo o bind corretamente com os valores
            $pstmt->bindValue(1, $idTurma);
            $pstmt->bindValue(2, $idAluno);
    
            // Executa a inserção
            $pstmt->execute();
        }
    
        // Retorna o objeto PDOStatement para possível validação, ou você pode omitir
        return true; // O retorno pode ser um valor booleano ou o resultado, dependendo da lógica
    }
    



    public function adicionarAlunosNaTurma3($idTurma, $alunosSelecionados) {
        try {
            $sqlVerificar = "SELECT COUNT(*) FROM aluno_turma WHERE idTurma = :idTurma AND idAluno = :idAluno";
            $sqlInserir = "INSERT INTO aluno_turma (idTurma, idAluno) VALUES (:idTurma, :idAluno)";
            
            $stmtVerificar = $this->conexao->prepare($sqlVerificar);
            $stmtInserir = $this->conexao->prepare($sqlInserir);
    
            foreach ($alunosSelecionados as $alunoId) {
                // Verifica se o aluno já está na turma
                $stmtVerificar->bindValue(':idTurma', $idTurma, PDO::PARAM_INT);
                $stmtVerificar->bindValue(':idAluno', $alunoId, PDO::PARAM_INT);
                $stmtVerificar->execute();
    
                // Certifique-se de que estamos obtendo um número de registros
                $exists = (int)$stmtVerificar->fetchColumn(); // Converte para inteiro
    
                if ($exists === 0) {
                    // Insere o aluno somente se não estiver na turma
                    $stmtInserir->bindValue(':idTurma', $idTurma, PDO::PARAM_INT);
                    $stmtInserir->bindValue(':idAluno', $alunoId, PDO::PARAM_INT);
                    $stmtInserir->execute();
                }
            }
        } catch (Exception $e) {
            error_log("Erro ao adicionar alunos na turma: " . $e->getMessage());
            throw new Exception("Erro ao adicionar alunos na turma: " . $e->getMessage());
        }
    }
    
 

    public function getUltimaTurmaInserida()
    {
        return $this->conexao->lastInsertId();
    }





    public function consultarTurmasComAlunos($pagina = 1, $itensPorPagina = 5) {
        // Calcula o limite de início para a consulta
        $inicio = ($pagina - 1) * $itensPorPagina;
    
        // Consulta todas as turmas com limite de resultados
        $queryTurmas = "SELECT * FROM turma LIMIT :inicio, :itensPorPagina";
        $stmtTurmas = $this->conexao->prepare($queryTurmas);
        $stmtTurmas->bindParam(':inicio', $inicio, PDO::PARAM_INT);
        $stmtTurmas->bindParam(':itensPorPagina', $itensPorPagina, PDO::PARAM_INT);
        $stmtTurmas->execute();
        $turmas = $stmtTurmas->fetchAll(PDO::FETCH_ASSOC);
    
        // Array para armazenar turmas e seus alunos
        $turmasComAlunos = [];
    
        // Para cada turma, consulte os alunos associados
        foreach ($turmas as $turma) {
            $idTurma = $turma['idTurma'];
    
            // Consulta os alunos que pertencem a essa turma
            $queryAlunos = "SELECT * FROM aluno INNER JOIN aluno_turma ON aluno.idAluno = aluno_turma.idAluno WHERE aluno_turma.idTurma = ?";
            $stmtAlunos = $this->conexao->prepare($queryAlunos);
            $stmtAlunos->bindValue(1, $idTurma);
            $stmtAlunos->execute();
            $alunos = $stmtAlunos->fetchAll(PDO::FETCH_ASSOC);
    
            // Adiciona os alunos à turma
            $turma['alunos'] = $alunos;
    
            // Adiciona a turma e seus alunos ao array
            $turmasComAlunos[] = $turma;
        }
    
        // Contar o total de turmas para calcular o número de páginas
        $queryTotal = "SELECT COUNT(*) FROM turma";
        $stmtTotal = $this->conexao->prepare($queryTotal);
        $stmtTotal->execute();
        $totalTurmas = $stmtTotal->fetchColumn();
    
        // Número total de páginas
        $totalPaginas = ceil($totalTurmas / $itensPorPagina);
    
        return [
            'turmas' => $turmasComAlunos,
            'totalPaginas' => $totalPaginas,
            'paginaAtual' => $pagina
        ];
    }
    
    
    public function getAlunosDaTurma($idTurma)
    {
        try {
            $pstmt = $this->conexao->prepare("SELECT a.idAluno, a.nome FROM aluno a
                                              JOIN aluno_turma at ON a.idAluno = at.idAluno
                                              WHERE at.idTurma = ?");
            $pstmt->bindValue(1, $idTurma);
            $pstmt->execute();
            return $pstmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar alunos: " . $e->getMessage();
            return [];
        }
    }
    public function getAlunosDaTurma2($turmaId) {
        $conn = Conexao::getConexao();
        $query = "SELECT a.idAluno, a.nome FROM aluno a JOIN aluno_turma at ON a.idAluno = at.idAluno WHERE at.idTurma = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$turmaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function getAlunosDaTurmapg($turmaId, $limite, $offset) {
        $conn = Conexao::getConexao();
        $query = "SELECT a.idAluno, a.nome, a.matricula, a.dataNasc 
                  FROM aluno a 
                  JOIN aluno_turma at ON a.idAluno = at.idAluno
                  WHERE at.idTurma = ? 
                  LIMIT ? OFFSET ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$turmaId, $limite, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarAlunosDaTurma($turmaId) {
        $conn = Conexao::getConexao();
        $query = "SELECT COUNT(*) FROM aluno_turma WHERE idTurma = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$turmaId]);
        return $stmt->fetchColumn();
    }

    public function getAlunos()
    {
        $pstmt = $this->conexao->prepare("SELECT nome FROM aluno");
        // $pstmt->bindValue(1, $idAluno);
        $pstmt->execute();
        return $pstmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarTurmasProfessor($idprofessor)
    {
        $stmt = $this->conexao->prepare("SELECT * FROM turma WHERE professorid = :idprofessor");
        $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_INT);
        $stmt->execute();
        $anuncios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $anuncios;
    }
    public function getTurmasPorProfessor($idProfessor)
    {
        $query = "SELECT * FROM turma WHERE idProfessor = :idProfessor";
        try {
            $stmt = $this->conexao->prepare($query);
            $stmt->bindParam(':idProfessor', $idProfessor, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Debugging
            var_dump($result); // Verifique os resultados
            return $result;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return [];
        }
    }


    public function getTurmasDoProfessor2($professorId, $nomeTurma = '') {
        $conn = Conexao::getConexao();
        $query = "SELECT * FROM Turma WHERE idProfessor = ? AND Nome LIKE ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$professorId, "%$nomeTurma%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getTurmasDoProfessor($professorId) {
        $conn = Conexao::getConexao();
        $query = "SELECT * FROM Turma WHERE idProfessor = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$professorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTurmas($idProfessor)
    {
        $pstmt = $this->conexao->prepare("SELECT nome FROM turma");
        $pstmt->bindValue(1, $idProfessor);
        $pstmt->execute();
        return $pstmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function alterarNomeTurma($turmaId, $novoNome) {
        $conn = Conexao::getConexao();
        $query = "UPDATE turma SET nome = ? WHERE idTurma = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$novoNome, $turmaId]);
    }

    // Função para remover aluno de uma turma
    public function removerAlunoDaTurma2($turmaId, $alunoId) {
        $conn = Conexao::getConexao();
        $query = "DELETE FROM AlunoTurma WHERE idTurma = ? AND idAluno = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$turmaId, $alunoId]);
    }

    public function removerAlunoDaTurma($idAluno, $idTurma)
    {
        $pstmt = $this->conexao->prepare("DELETE FROM aluno_turma WHERE idAluno = ? AND idTurma = ?");
        $pstmt->bindValue(1, $idAluno);
        $pstmt->bindValue(2, $idTurma);
        return $pstmt->execute();
    }

}
?>