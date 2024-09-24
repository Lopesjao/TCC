<?php
include_once __DIR__ . '/../Model/Aluno.php';
include_once  __DIR__ . '/../Conexao/Conexao.php';

class AlunoController
{


    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }
    public function insertAluno(Aluno $aluno)
    {
        $pstmt = $this->conexao->prepare("INSERT INTO aluno 
    (nome, email, Matricula ,dataNasc, senha) VALUES 
    (?,?,?,?,?)");
        $pstmt->bindValue(1, $aluno->getNome());
        $pstmt->bindValue(2, $aluno->getEmail());
        $pstmt->bindValue(3, $aluno->getMatricula());
        $pstmt->bindValue(4, $aluno->getDataNasc());
        $pstmt->bindValue(5, $aluno->getSenha());
        $pstmt->execute();
        var_dump($aluno);
        return $pstmt;
    }
    
    
    
    public function selectAlunoVerficaLogin($email, $senha){
        // Verifica se o email existe
        $pstmt = $this->conexao->prepare("SELECT * FROM aluno WHERE email = ?");
        $pstmt->bindValue(1, $email);
        $pstmt->execute();
    
        if ($pstmt->rowCount() > 0) {
            // Se o email existe, verificar a senha
            $user = $pstmt->fetch(PDO::FETCH_ASSOC);
            
            // Use password_verify para comparar a senha
            if ($senha == $user['senha']) {
                $_SESSION["IDAluno"] = $user['IDAluno'];
                return true; // Login bem-sucedido
            } else {
                return "senha_incorreta"; // Senha incorreta
            }
        } else {
            return "email_nao_encontrado"; // Email não encontrado
        }
    }



}
?>