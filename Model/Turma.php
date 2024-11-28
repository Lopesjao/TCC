<?php

class Turma {
    private $idTurma;
    private $nome;
    private $idProfessor;

    // Construtor
    public function __construct($data = null) {
        if ($data) {
            $this->idTurma = $data['idTurma'] ?? null;
            $this->nome = $data['nome'] ?? '';
            $this->idProfessor = $data['idProfessor'] ?? '';
        }
    }

    // Getters e Setters
    public function getIdTurma() {
        return $this->idTurma;
    }

    public function setIdTurma($idTurma) {
        $this->idTurma = $idTurma;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdProfessor() {
        return $this->idProfessor;
    }

    public function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }
}
