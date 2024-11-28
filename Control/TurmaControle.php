<?php
include_once __DIR__ . '/../Model/Turma.php';
include_once __DIR__ . '/../Conexao/Conexao.php';

class TurmaController
{
    private $conexao;

    // Construtor que inicializa a conexão com o banco de dados
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    // Método para inserir uma nova turma
    public function insertTurma(Turma $turma)
    {
        $pstmt = $this->conexao->prepare("INSERT INTO turma (nome, idProfessor) VALUES (?, ?)");
        $pstmt->bindValue(1, $turma->getNome());
        $pstmt->bindValue(2, $turma->getIdProfessor());
        $pstmt->execute();
        return $pstmt;
    }

    // Método para adicionar alunos à turma
    public function adicionarAlunosNaTurma($idTurma, $alunos)
    {
        $pstmt = $this->conexao->prepare("INSERT INTO aluno_turma (idAluno, idTurma) VALUES (?, ?)");

        foreach ($alunos as $idAluno) {
            $pstmt->bindValue(1, $idAluno);
            $pstmt->bindValue(2, $idTurma);
            $pstmt->execute();
        }
    }

    // Método para buscar todos os alunos cadastrados
    public function getAlunos()
    {
        $pstmt = $this->conexao->prepare("SELECT * FROM aluno");
        $pstmt->execute();
        return $pstmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar todas as turmas de um professor
    public function getTurmasPorProfessor($idProfessor)
    {
        $pstmt = $this->conexao->prepare("SELECT * FROM turma WHERE idProfessor = ?");
        $pstmt->bindValue(1, $idProfessor);
        $pstmt->execute();
        return $pstmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar alunos de uma turma específica
    public function getAlunosDaTurma($idTurma)
    {
        $pstmt = $this->conexao->prepare("SELECT a.* FROM aluno a
                                          JOIN aluno_turma at ON a.idAluno = at.idAluno
                                          WHERE at.idTurma = ?");
        $pstmt->bindValue(1, $idTurma);
        $pstmt->execute();
        return $pstmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
