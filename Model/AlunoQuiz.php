<?php
class AlunoQuizResposta
{
    private $idAluno;
    private $idQuiz;
    private $idPergunta;
    private $idResposta;

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
        return $this->idAluno;
    }

    public function setIdAluno($idAluno)
    {
        $this->idAluno = $idAluno;
    }

    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;
    }

    public function getIdPergunta()
    {
        return $this->idPergunta;
    }

    public function setIdPergunta($idPergunta)
    {
        $this->idPergunta = $idPergunta;
    }

    public function getIdResposta()
    {
        return $this->idResposta;
    }

    public function setIdResposta($idResposta)
    {
        $this->idResposta = $idResposta;
    }

    public function __toString()
    {
        return "AlunoQuizResposta[idAluno=" . $this->idAluno . ", idQuiz=" . $this->idQuiz . 
            ", idPergunta=" . $this->idPergunta . ", idResposta=" . $this->idResposta . "]";
    }
}
?>
