<?php
class Resposta
{
    private $idResposta;
    private $idPergunta;
    private $resposta;
    private $isCorreta;

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

    public function getIdResposta()
    {
        return $this->idResposta;
    }

    public function setIdResposta($idResposta)
    {
        $this->idResposta = $idResposta;
    }

    public function getIdPergunta()
    {
        return $this->idPergunta;
    }

    public function setIdPergunta($idPergunta)
    {
        $this->idPergunta = $idPergunta;
    }

    public function getResposta()
    {
        return $this->resposta;
    }

    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    }

    public function getIsCorreta()
    {
        return $this->isCorreta;
    }

    public function setIsCorreta($isCorreta)
    {
        $this->isCorreta = $isCorreta;
    }

    public function __toString()
    {
        return "Resposta[idResposta=" . $this->idResposta . ", idPergunta=" . $this->idPergunta . 
            ", resposta=" . $this->resposta . ", isCorreta=" . $this->isCorreta . "]";
    }
}
?>
