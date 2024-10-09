<?php
class Professor
{
    private $idProfessor;
    private $nome;
    private $email;

    private $matricula;
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
    
    public function getidProfessor()
    {
        return $this->idProfessor;
    }

    public function setidProfessor($idProfessor)
    {
        $this->idProfessor = $idProfessor;
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
        return $this->matricula;
    }
    
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
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
        return "Professor[idProfessor=". $this->idProfessor. ", nome=". $this->nome. 
        ", email=". $this->email.  ", matricula=". $this->matricula.", dataNasc=". $this->dataNasc. ", senha=". $this->senha.  "]";
    }

    
}
?>