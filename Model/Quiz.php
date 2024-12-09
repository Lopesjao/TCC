<?php
class Quiz
{
    private $idQuiz;
    private $idProfessor;
    private $idTurma;
    private $titulo;

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

    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;
    }

    public function getIdProfessor()
    {
        return $this->idProfessor;
    }

    public function setIdProfessor($idProfessor)
    {
        $this->idProfessor = $idProfessor;
    }

    public function getIdTurma()
    {
        return $this->idTurma;
    }

    public function setIdTurma($idTurma)
    {
        $this->idTurma = $idTurma;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function __toString()
    {
        return "Quiz[idQuiz=" . $this->idQuiz . ", idProfessor=" . $this->idProfessor . 
            ", idTurma=" . $this->idTurma . ", titulo=" . $this->titulo . "]";
    }
}
?>
