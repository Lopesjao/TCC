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


    public function adicionarAlunosNaTurma($idTurma, $alunosSelecionados) {
        try {
            
            $sql = "INSERT INTO aluno_turma (idTurma, idAluno) VALUES (:idTurma, :idAluno)";
            $stmt = $this->conexao->prepare($sql);
    
            foreach ($alunosSelecionados as $alunoId) {
          
                $stmt->bindValue(':idTurma', $idTurma, PDO::PARAM_INT);
                $stmt->bindValue(':idAluno', $alunoId, PDO::PARAM_INT);
                $stmt->execute();  
            }
    
        } catch (Exception $e) {
         
            error_log("Erro ao adicionar alunos na turma: " . $e->getMessage());
            throw new Exception("Erro ao adicionar alunos na turma.");
        }
    }
    
    public function getUltimaTurmaInserida()
    {
        return $this->conexao->lastInsertId();
    }
    public function getAlunosDaTurma($idTurma)
    {
        try {
            $pstmt = $this->conexao->prepare("SELECT a.* FROM aluno a
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


    public function getAlunos()
    {
        $pstmt = $this->conexao->prepare("SELECT nome FROM aluno");
        // $pstmt->bindValue(1, $idAluno);
        $pstmt->execute();
        return $pstmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTurmasPorProfessor($idProfessor) {
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
    
    public function getTurmas($idProfessor)
    {
        $pstmt = $this->conexao->prepare("SELECT nome FROM turma");
        $pstmt->bindValue(1, $idProfessor);
        $pstmt->execute();
        return $pstmt->fetchAll(PDO::FETCH_ASSOC);
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