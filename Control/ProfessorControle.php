<?php
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Conexao/Conexao.php';

class ProfessorController
{


    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }
    public function insertProf(Professor $professor)
    {
        $pstmt = $this->conexao->prepare("INSERT INTO professor 
    (nome, email, matricula ,dataNasc, senha) VALUES 
    (?,?,?,?,?)");
        $pstmt->bindValue(1, $professor->getNome());
        $pstmt->bindValue(2, $professor->getEmail());
        $pstmt->bindValue(3, $professor->getMatricula());
        $pstmt->bindValue(4, $professor->getDataNasc());
        $pstmt->bindValue(5, $professor->getSenha());
        $pstmt->execute();
        var_dump($professor);
        return $pstmt;
    }


//esse é meu metodo de verificar o login como n estou usando hash na senha acredito
// que seria so verificar se é igual com o do banco
    public function selectProfessorVerificaLogin($email, $senha)
    {
        // Verifica se o email existe
        $pstmt = $this->conexao->prepare("SELECT * FROM professor WHERE email = ?");
        $pstmt->bindValue(1, $email);
        $pstmt->execute();
    
        if ($pstmt->rowCount() > 0) {
            $professor = $pstmt->fetch(PDO::FETCH_ASSOC);
            $professor = new Aluno($professor);
            
            ////var_dump($professor);
            //echo $professor;
       
            if ($senha == $professor->getSenha()) {
                $_SESSION["professor"] = serialize($professor);
                return true; 
            } else {
                return false; 
            }
        } else {
            return false; 
        }
    }
    //aqui coloquei o seu login do seu sistema mas nao estou utilizando ele
    public function login()
    {
        $login = new Login($_POST);
        $stmt = $this->conexao->prepare("SELECT * FROM aluno WHERE email = :email");
        $stmt->bindValue(":email", $login->getEmail());
        $stmt->execute();
        $linha = $stmt->fetch();
        if ($linha != null) {

            if ($linha['senha'] == $login->getSenha()) {
                $login->atualizar($linha); // Atualiza os demais atributos...
                session_start();
                session_regenerate_id();
                $sessaoID = session_id();

                $stmt = $this->conexao->prepare("UPDATE usuario SET sessaoID = :sessaoID WHERE id = :id");
                $stmt->bindValue(":sessaoID", $sessaoID);
                $stmt->bindValue(":id", $login->getId());
                $stmt->execute();

                $_SESSION['id'] = $linha['id'];
                $_SESSION['sessaoID'] = $sessaoID;

                echo "DEU CERTO:";
                header('location:../Home.php');
            } else {
                header('location:../index.php?erro');
            }
        } else {
            header('location:../index.php?erro');
        }
    }

    public function logout()
    {
        session_id($_SESSION['sessaoID']);
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location:../index.php');
    }


}
?>