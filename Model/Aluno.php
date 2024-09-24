<?php
class Aluno
{
    private $IDAluno;
    private $nome;
    private $email;

    private $Matricula;
    private $dataNasc;
    private $senha;
    public function __construct()
    {
        if (func_num_args() != 0) {
            $atributos = func_get_args()[0];
            foreach ($atributos as $atributo => $valor) {
                if (isset($valor) && property_exists(get_class($this), $atributo)) {
                    $this->$atributo = $valor;
                }
            }
        }
    }
    function atualizar($atributos)
    {
        foreach ($atributos as $atributo => $valor) {
            if (isset($valor) && property_exists(get_class($this), $atributo)) {
                $this->$atributo = $valor;
            }
        }
    }
    
    public function getIdAluno()
    {
        return $this->IDAluno;
    }

    public function setIdAluno($IDAluno)
    {
        $this->IDAluno = $IDAluno;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMatricula()
    {
        return $this->Matricula;
    }
    
    public function setMatricula($matricula)
    {
        $this->Matricula = $matricula;
    }
    

    public function getDataNasc()
    {
        return $this->dataNasc;
    }
    
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;
    }
    
    public function getSenha()
    {
        return $this->senha;
    }
    
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function __toString()
    {
        return "Aluno[IDAluno=". $this->IDAluno. ", nome=". $this->nome. 
        ", email=". $this->email.  ", matricula=". $this->Matricula.", dataNasc=". $this->dataNasc. ", senha=". $this->senha.  "]";
    }

    
}
?>