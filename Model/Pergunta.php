<?php
class Pergunta
{
    private $idPergunta;
    private $idQuiz;
    private $pergunta;

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

    public function getIdPergunta()
    {
        return $this->idPergunta;
    }

    public function setIdPergunta($idPergunta)
    {
        $this->idPergunta = $idPergunta;
    }

    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;
    }

    public function getPergunta()
    {
        return $this->pergunta;
    }

    public function setPergunta($pergunta)
    {
        $this->pergunta = $pergunta;
    }

    public function __toString()
    {
        return "Pergunta[idPergunta=" . $this->idPergunta . ", idQuiz=" . $this->idQuiz . ", pergunta=" . $this->pergunta . "]";
    }
}
?>
