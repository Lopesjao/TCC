<?php
include_once __DIR__ . '/../Model/Quiz.php';
include_once __DIR__ . '/../Conexao/Conexao.php';

class QuizController
{
    private $quiz;
    private $pergunta;
    private $resposta;
    private $alunoQuizResposta;

    public function __construct()
    {
        $this->quiz = new Quiz();
        $this->pergunta = new Pergunta();
        $this->resposta = new Resposta();
        $this->alunoQuizResposta = new AlunoQuizResposta();
    }

    public function adicionarQuiz($dadosQuiz, $dadosPerguntas, $dadosRespostas)
    {
        // Adicionar Quiz
        $this->quiz->setIdProfessor($dadosQuiz['idProfessor']);
        $this->quiz->setIdTurma($dadosQuiz['idTurma']);
        $this->quiz->setTitulo($dadosQuiz['titulo']);
        
        // Inserir o quiz no banco (usando seu método de inserção no banco)
        $idQuiz = $this->inserirQuizNoBanco($this->quiz);

        // Adicionar Perguntas
        foreach ($dadosPerguntas as $dadosPergunta) {
            $this->pergunta->setIdQuiz($idQuiz);
            $this->pergunta->setPergunta($dadosPergunta['pergunta']);
            $idPergunta = $this->inserirPerguntaNoBanco($this->pergunta);

            // Adicionar Respostas
            foreach ($dadosPergunta['respostas'] as $dadosResposta) {
                $this->resposta->setIdPergunta($idPergunta);
                $this->resposta->setResposta($dadosResposta['resposta']);
                $this->resposta->setIsCorreta($dadosResposta['isCorreta']);
                $this->inserirRespostaNoBanco($this->resposta);
            }
        }
    }

    private function inserirQuizNoBanco($quiz)
    {
        // Lógica para inserir o quiz no banco
        // Retornar o id do quiz inserido
    }

    private function inserirPerguntaNoBanco($pergunta)
    {
        // Lógica para inserir a pergunta no banco
        // Retornar o id da pergunta inserida
    }

    private function inserirRespostaNoBanco($resposta)
    {
        // Lógica para inserir a resposta no banco
    }
}
?>
