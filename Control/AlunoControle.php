<?php
include_once 'Model/Aluno.php';
include_once 'Conexao/Conexao.php';

class AlunoController {


    private $conexao;
    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }
public function insertAluno(Aluno $aluno){
    $pstmt = $this->conexao->prepare("INSERT INTO aluno 
    (nome, email, matricula ,dataNasc) VALUES 
    (?,?,?,?)");
    $pstmt->bindValue(1, $aluno->getNome());
    $pstmt->bindValue(2, $aluno->getDataNasc());
    $pstmt->bindValue(3, $aluno->getSenha());
    $pstmt->bindValue(4, $aluno->getEmail());
    $pstmt->bindValue(5, $aluno->getGrauVicio());
    $pstmt->execute();
    return $pstmt;
}




}
?>
