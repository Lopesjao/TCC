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
        $pstmt->execute();
        return $pstmt;
    }


    public function adicionarAlunosNaTurma($idTurma, $alunos)
    {
        $pstmt = $this->conexao->prepare("INSERT INTO aluno_turma (idAluno, idTurma) VALUES (?, ?)");

        foreach ($alunos as $idAluno) {
            $pstmt->bindValue(1, $idAluno);
            $pstmt->bindValue(2, $idTurma);
            $pstmt->execute();
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


    public function getTurmasPorProfessor($idProfessor)
    {
        $pstmt = $this->conexao->prepare("SELECT * FROM turma WHERE idProfessor = ?");
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