<?php
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Conexao/Conexao.php';

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
    (nome, email, matricula ,dataNasc, senha) VALUES 
    (?,?,?,?,?)");
        $pstmt->bindValue(1, $aluno->getNome());
        $pstmt->bindValue(2, $aluno->getEmail());
        $pstmt->bindValue(3, $aluno->getMatricula());
        $pstmt->bindValue(4, $aluno->getDataNasc());
        $pstmt->bindValue(5, $aluno->getSenha());
        $pstmt->execute();
        //var_dump($aluno);
        return $pstmt;
    }

    public function getAlunos() {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM aluno";
        $result = $conn->query($sql);
        
        $alunos = [];
        while ($row = $result->fetch()) {
            $alunos[] = $row;
        }
        
        return $alunos;
    }

//esse é meu metodo de verificar o login como n estou usando hash na senha acredito
// que seria so verificar se é igual com o do banco
    public function selectAlunoVerificaLogin($email, $senha)
    {
        // Verifica se o email existe
        $pstmt = $this->conexao->prepare("SELECT * FROM aluno WHERE email = ?");
        $pstmt->bindValue(1, $email);
        $pstmt->execute();
    
        if ($pstmt->rowCount() > 0) {
            $aluno = $pstmt->fetch(PDO::FETCH_ASSOC);
            $aluno = new Aluno($aluno);
            
            ////var_dump($aluno);
            //echo $aluno;
       
            if ($senha == $aluno->getSenha()) {
                $_SESSION["aluno"] = serialize($aluno);
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