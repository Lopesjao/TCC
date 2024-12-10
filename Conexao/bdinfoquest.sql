-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/12/2024 às 07:55
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
-- Estrutura para tabela `erros`
--

CREATE TABLE `erros` (
  `idErro` int(11) NOT NULL,
  `descricaoErro` text NOT NULL,
  `idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `erros`
--

INSERT INTO `erros` (`idErro`, `descricaoErro`, `idAluno`) VALUES
(1, 'o computador nao liga', 12),
(2, 'pc nao liga', 12),
(3, 'pc nao liga', 12),
(4, 'aaaaaaaaaa', 12);

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
  `id` int(11) NOT NULL,
  `pergunta` varchar(255) NOT NULL,
  `alternativa_a` varchar(255) NOT NULL,
  `alternativa_b` varchar(255) NOT NULL,
  `alternativa_c` varchar(255) NOT NULL,
  `alternativa_d` varchar(255) NOT NULL,
  `correta` char(1) NOT NULL,
  `professor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quiz`
--

INSERT INTO `quiz` (`id`, `pergunta`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`, `correta`, `professor_id`) VALUES
(1, 'aaa', 'a', 'a', 'a', 'a', 'B', NULL),
(2, 'aaa', 'a', 'a', 'a', 'a', 'B', 4),
(3, 'teste', 'aaa', 'aa', 'a', 'a', 'B', 4),
(4, 'qual a funçao do mouse', 'arrastar', 'teclar', 'digitar', 'nao sei mais', 'A', 4),
(5, 'estou louco', 'sim', 'sim 2', 'claro', 'sim com certeza', 'A', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `nome_quiz` varchar(255) NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quizzes`
--

INSERT INTO `quizzes` (`id`, `nome_quiz`, `professor_id`) VALUES
(1, 'Quiz 1', 4),
(2, 'Quiz 3', 4),
(3, 'Quiz 4', 4),
(4, 'quiz teste', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz_perguntas`
--

CREATE TABLE `quiz_perguntas` (
  `quiz_id` int(11) NOT NULL,
  `pergunta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quiz_perguntas`
--

INSERT INTO `quiz_perguntas` (`quiz_id`, `pergunta_id`) VALUES
(1, 2),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `resposta` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `respostas`
--

INSERT INTO `respostas` (`id`, `quiz_id`, `aluno_id`, `resposta`) VALUES
(1, 2, 12, 'C'),
(2, 3, 12, 'A'),
(3, 4, 12, 'A'),
(4, 5, 12, 'A'),
(5, 2, 12, 'C'),
(6, 3, 12, 'A'),
(7, 4, 12, 'A'),
(8, 5, 12, 'A'),
(9, 3, 12, 'A'),
(10, 4, 12, 'A'),
(11, 3, 12, 'A'),
(12, 4, 12, 'A'),
(13, 2, 12, 'A'),
(14, 2, 12, 'A'),
(15, 2, 12, 'A'),
(16, 2, 12, 'B'),
(17, 2, 12, 'A'),
(18, 2, 12, 'C'),
(19, 2, 12, 'C'),
(20, 3, 12, 'A'),
(21, 4, 12, 'A'),
(22, 3, 12, 'B'),
(23, 4, 12, 'A'),
(24, 3, 12, 'C'),
(25, 4, 12, 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta_erro`
--

CREATE TABLE `resposta_erro` (
  `idRespostaErro` int(11) NOT NULL,
  `idErro` int(11) NOT NULL,
  `resposta` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tipoUsuario` enum('aluno','professor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `resposta_erro`
--

INSERT INTO `resposta_erro` (`idRespostaErro`, `idErro`, `resposta`, `idUsuario`, `tipoUsuario`) VALUES
(1, 1, 'afafaf', 0, 'aluno'),
(2, 2, 'aaaaaaa', 12, 'aluno');

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
-- Índices de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`idAluno`,`idTurma`),
  ADD KEY `idTurma` (`idTurma`) USING BTREE;

--
-- Índices de tabela `erros`
--
ALTER TABLE `erros`
  ADD PRIMARY KEY (`idErro`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- Índices de tabela `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- Índices de tabela `quiz_perguntas`
--
ALTER TABLE `quiz_perguntas`
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Índices de tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `aluno_id` (`aluno_id`);

--
-- Índices de tabela `resposta_erro`
--
ALTER TABLE `resposta_erro`
  ADD PRIMARY KEY (`idRespostaErro`),
  ADD KEY `idErro` (`idErro`);

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
-- AUTO_INCREMENT de tabela `erros`
--
ALTER TABLE `erros`
  MODIFY `idErro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `resposta_erro`
--
ALTER TABLE `resposta_erro`
  MODIFY `idRespostaErro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `aluno_turma_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`),
  ADD CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`idTurma`);

--
-- Restrições para tabelas `erros`
--
ALTER TABLE `erros`
  ADD CONSTRAINT `erros_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`);

--
-- Restrições para tabelas `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`idProfessor`);

--
-- Restrições para tabelas `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`idProfessor`);

--
-- Restrições para tabelas `quiz_perguntas`
--
ALTER TABLE `quiz_perguntas`
  ADD CONSTRAINT `quiz_perguntas_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `quiz_perguntas_ibfk_2` FOREIGN KEY (`pergunta_id`) REFERENCES `quiz` (`id`);

--
-- Restrições para tabelas `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`idAluno`);

--
-- Restrições para tabelas `resposta_erro`
--
ALTER TABLE `resposta_erro`
  ADD CONSTRAINT `resposta_erro_ibfk_1` FOREIGN KEY (`idErro`) REFERENCES `erros` (`idErro`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
