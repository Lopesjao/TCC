-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/12/2024 às 08:15
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdinfoquest`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nome`, `email`, `matricula`, `dataNasc`, `senha`) VALUES
(1, 'teste', 'jmanoelclopes1234@gmail.com', NULL, '2024-09-11', '111'),
(2, 'teste', 'jmanoelclopes1234@gmail.com', NULL, '2024-09-11', '111'),
(3, 'teste', 'jmanoelclopes1234@gmail.com', NULL, '2024-09-11', '123'),
(4, 'teste', 'jmanoelclopes1234@gmail.com', NULL, '2024-09-11', '123'),
(5, 'teste', 'jmanoelclopes1234@gmail.com', NULL, '2024-09-11', '123'),
(6, 'teste2', 'jmanoelclopes1234@gmail.com', '123', '2024-09-05', '123'),
(7, 'teste2', 'teste@gmail.com', NULL, '2024-09-07', '1234'),
(8, 'teste2', 'teste@gmail.com', NULL, '2024-09-07', '1234'),
(9, 'testemat', 'teste@gmail.com', NULL, '2024-10-04', '123'),
(10, 'aaa', 'aaa@gmail.com', '123', '2024-09-04', 'aa'),
(11, 'joao teste', 'joaoteste@gmail.com', '12345678', '1970-01-01', '123456'),
(12, 'joao teste 23', 'joao23@gmail.com', '1234567', '2004-03-25', '12345'),
(13, 'joao teste 24', 'joao24@gmail.com', '12345', '2004-03-25', '$2y$10$6NlpLvyZrGtWa'),
(14, 'joao teste 24', 'joao24@gmail.com', '12345', '2004-03-25', '$2y$10$w7JyAYZM/bNOI'),
(15, 'joao teste 24', 'joao24@gmail.com', '12345', '2004-03-25', '$2y$10$CtxgBKiCjEbQu'),
(16, 'joao teste 23', 'joao23@gmail.com', '1234567', '2004-03-25', '123456'),
(17, 'joao teste 23', 'joao23@gmail.com', '1234567', '2004-03-25', '123456'),
(18, 'joao teste 23', 'joao23@gmail.com', '1234567', '2004-03-25', '123456'),
(19, 'joao teste 23', 'joao23@gmail.com', '1234567', '2004-03-25', '123456'),
(20, 'rafael gamemaker2', 'rafael.2023001254@aluno.iffar.edu.br', '1234567', '1111-12-12', '123'),
(21, 'rafael gamemaker2', 'rafael.2023001254@aluno.iffar.edu.br', '1234567', '1111-12-12', '123'),
(22, 'rafael gamemaker2', 'rafael.2023001254@aluno.iffar.edu.br', '1234567', '1111-12-12', '123'),
(23, 'rafael gamemaker2', 'rafael.2023001254@aluno.iffar.edu.br', '1234567', '1111-12-12', '123'),
(24, 'teste 5', 'teste5@gmail.com', '1212', '1212-12-12', '12345'),
(25, 'teste 5', 'teste5@gmail.com', '1212', '1212-12-12', '12345'),
(26, 'teste 5', 'teste5@gmail.com', '1212', '1212-12-12', '12345'),
(27, 'teste 5', 'teste5@gmail.com', '1212', '1212-12-12', '12345'),
(28, 'joao aluno', 'jaluno@gmail.com', '1212', '2000-10-10', '12345'),
(29, 'joao aluno', 'jaluno@gmail.com', '1212', '2000-10-10', '12345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno_quiz_resposta`
--

CREATE TABLE `aluno_quiz_resposta` (
  `idAluno` int(11) NOT NULL,
  `idQuiz` int(11) NOT NULL,
  `idPergunta` int(11) NOT NULL,
  `idResposta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `idAluno` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`idAluno`, `idTurma`) VALUES
(1, 1),
(1, 101),
(1, 106),
(2, 1),
(3, 1),
(3, 106),
(3, 109),
(4, 1),
(5, 1),
(5, 107),
(5, 108),
(5, 110),
(10, 1),
(11, 1),
(15, 1),
(16, 1),
(16, 109),
(18, 1),
(18, 108),
(19, 112),
(21, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `idPergunta` int(11) NOT NULL,
  `idQuiz` int(11) DEFAULT NULL,
  `pergunta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nome`, `email`, `matricula`, `dataNasc`, `senha`) VALUES
(1, 'professro1', 'prof@gmail.com', '12345', '2024-10-01', '12345'),
(2, 'rafael gamemaker', 'rafael.2023001254@aluno.iffar.edu.br', '2023001254', '2003-07-02', '123'),
(3, 'professor1', 'prof2@gmail.com', '123456', '2000-12-10', '123'),
(4, 'prof teste 3', 'profteste@gmail.com', '2020', '2000-02-20', '12345'),
(5, 'joao prof', 'joaoprof@gmail.com', '1234', '2000-10-10', '12345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE `quiz` (
  `idQuiz` int(11) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

CREATE TABLE `resposta` (
  `idResposta` int(11) NOT NULL,
  `idPergunta` int(11) DEFAULT NULL,
  `resposta` text NOT NULL,
  `isCorreta` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `nome`, `idProfessor`) VALUES
(1, 'turma 19', NULL),
(2, 'turma 19', NULL),
(10, 'turma teste 2', 2),
(25, 'aaa', NULL),
(26, 'aaa', NULL),
(27, 'turma teste de agora 100', NULL),
(30, '', 1),
(31, '', 1),
(32, 'rafael gamemaker', 1),
(50, 'turma 4', 4),
(51, 'turma prof alecson', 4),
(53, 'turma ads 18', 4),
(54, '', 4),
(56, '', 4),
(57, 'turma prof joao7', 5),
(58, 'turma agora', 5),
(59, 'aaaaaaaa', 5),
(60, 'aaaaaaaa', 5),
(61, 'turma prof joao', 5),
(62, 'aaaaaaaa', 5),
(63, 'tetse333', 5),
(64, 'turma 18', 5),
(65, 'teste', 5),
(66, 'teste', 5),
(67, 'aaaaaaaaaaa', 5),
(68, 'aaaaaaaaaaa', 5),
(69, 'aaaaaaaaaaa', 5),
(70, 'aaaaaaaaaaa', 5),
(71, 'turma algma cosia', 5),
(72, 'turma algma cosia', 5),
(73, 'turma algma cosia', 5),
(74, 'turma teste aaa', 5),
(75, 'turma teste nova 0', 5),
(76, 'turma teste nova 0', 5),
(77, 'turma prof 5', 5),
(78, 'turma prof 5', 5),
(79, 'turma teste aaaaaaaaa', 5),
(80, 'turma teste nova 0', 5),
(81, 'turma nova g', 5),
(82, 'turma nova g', 5),
(83, 'turma 18', 5),
(84, 'testeeeee', 5),
(85, 'ttttt', 5),
(86, 'aaaaaa', 5),
(87, 'aaaaaa', 5),
(88, 'aaaaaa', 5),
(89, 'aaaaaa', 5),
(90, 'assdugfiqpw', 5),
(91, 'assdugfiqpw', 5),
(92, 'assdugfiqpw', 5),
(93, 'aaaaaaaaa', 5),
(94, 'aaaaaaaaa', 5),
(95, 'aaaaaaaaa', 5),
(96, 'ysrt', 5),
(97, 'turmaeadha', 5),
(98, 'sasvs', 5),
(99, 'aaaaaaaaa', 5),
(100, 'twht', 5),
(101, 'ddddddddddddd', 5),
(102, 'turma f', 5),
(103, 'turma f', 5),
(104, 'turma k', 5),
(105, 'aaaaaaa', 5),
(106, 'aaaaaaaaa', 5),
(107, 'turmahj', 5),
(108, 'turma lala', 5),
(109, 'turma sexo', 5),
(110, 'ads 28', 5),
(111, 'turma dus da manha', 4),
(112, 'oita bem', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`);

--
-- Índices de tabela `aluno_quiz_resposta`
--
ALTER TABLE `aluno_quiz_resposta`
  ADD PRIMARY KEY (`idAluno`,`idQuiz`,`idPergunta`),
  ADD KEY `idQuiz` (`idQuiz`),
  ADD KEY `idPergunta` (`idPergunta`),
  ADD KEY `idResposta` (`idResposta`);

--
-- Índices de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`idAluno`,`idTurma`),
  ADD KEY `idTurma` (`idTurma`) USING BTREE;

--
-- Índices de tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`idPergunta`),
  ADD KEY `idQuiz` (`idQuiz`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`idQuiz`),
  ADD KEY `idProfessor` (`idProfessor`),
  ADD KEY `idTurma` (`idTurma`);

--
-- Índices de tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`idResposta`),
  ADD KEY `idPergunta` (`idPergunta`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idTurma`),
  ADD KEY `idProfessor` (`idProfessor`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `idQuiz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno_quiz_resposta`
--
ALTER TABLE `aluno_quiz_resposta`
  ADD CONSTRAINT `aluno_quiz_resposta_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`),
  ADD CONSTRAINT `aluno_quiz_resposta_ibfk_2` FOREIGN KEY (`idQuiz`) REFERENCES `quiz` (`idQuiz`),
  ADD CONSTRAINT `aluno_quiz_resposta_ibfk_3` FOREIGN KEY (`idPergunta`) REFERENCES `pergunta` (`idPergunta`),
  ADD CONSTRAINT `aluno_quiz_resposta_ibfk_4` FOREIGN KEY (`idResposta`) REFERENCES `resposta` (`idResposta`);

--
-- Restrições para tabelas `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `aluno_turma_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`),
  ADD CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`idTurma`);

--
-- Restrições para tabelas `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`idQuiz`) REFERENCES `quiz` (`idQuiz`);

--
-- Restrições para tabelas `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`idTurma`);

--
-- Restrições para tabelas `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`idPergunta`) REFERENCES `pergunta` (`idPergunta`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
