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

    public function consultarPorNome($nome)
    {
        $pstmt = $this->conexao->prepare("SELECT * FROM aluno WHERE nome = :nome");
        $pstmt->bindValue(':nome', $nome);
        $pstmt->execute();
    
        // Retorna todos os registros encontrados
        $resultados = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultados; // Retorna um array com os registros ou um array vazio se não encontrar
    }
    public function getAlunoById($conn, $idAluno)
    {
        try {
            $pstmt = $conn->prepare("SELECT * FROM aluno WHERE idAluno = ?");
            $pstmt->bindValue(1, $idAluno);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            return new Aluno($result);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }
    public function getAlunoByNome($conn, $nome)
    {
        try {
            $pstmt = $conn->prepare("SELECT * FROM aluno WHERE nome = ?");
            $pstmt->bindValue(1, $nome);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            return new Aluno($result);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    // CRUD - Update
    public function updateAluno($aluno)
    {
        try {
            $pstmt = $aluno->prepare("UPDATE aluno SET nome = ?, email = ?, matricula = ?, dataNasc = ?, senha = ? WHERE idAluno = ?");
            $pstmt->bindValue(1, $aluno->getNome());
            $pstmt->bindValue(2, $aluno->getEmail());
            $pstmt->bindValue(3, $aluno->getMatricula());
            $pstmt->bindValue(4, $aluno->getDataNasc());
            $pstmt->bindValue(5, $aluno->getSenha());
            $pstmt->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    // CRUD - Delete
    public function deleteAluno($conn)
    {
        try {
            $pstmt = $conn->prepare("DELETE FROM aluno WHERE idAluno = ?");
            $pstmt->bindValue(1, $conn->getNome());
            $pstmt->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    // Método para listar alunos de uma turma específica
    public function getAlunosPorTurma($conn, $idTurma)
    {
        try {
            $pstmt = $conn->prepare("SELECT a.idAluno, a.nome, a.email FROM aluno a 
                                     JOIN turma_aluno ta ON a.idAluno = ta.idAluno
                                     WHERE ta.idTurma = ?");
            $pstmt->bindValue(1, $idTurma);
            $pstmt->execute();
            $resultados = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados; // Retorna uma lista de alunos dessa turma
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }



    public function consultarTodos()
{
    $pstmt = $this->conexao->prepare("SELECT idAluno, nome FROM aluno");
    $pstmt->execute();
    return $pstmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function getAlunos()
    {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM aluno";
        $pstmt = $conn->prepare($sql);
        $pstmt->execute();
        //while($linha = $pstmt->fetch()){
        return $pstmt;


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