<?php

class AlunoTurma
{
    private $id;        
    private $idAluno;    
    private $idTurma;   

   
    public function __construct($dados = null)
    {
        if ($dados) {
            $this->id = $dados['id'] ?? null;
            $this->idAluno = $dados['id_aluno'] ?? null;
            $this->idTurma = $dados['id_turma'] ?? null;
        }
    }

   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdAluno()
    {
        return $this->idAluno;
    }

    public function setIdAluno($idAluno)
    {
        $this->idAluno = $idAluno;
    }

    public function getIdTurma()
    {
        return $this->idTurma;
    }

    public function setIdTurma($idTurma)
    {
        $this->idTurma = $idTurma;
    }
}
?>
