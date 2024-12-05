-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Dez-2024 às 19:11
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
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
(27, 'teste 5', 'teste5@gmail.com', '1212', '1212-12-12', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `idAluno` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nome`, `email`, `matricula`, `dataNasc`, `senha`) VALUES
(1, 'professro1', 'prof@gmail.com', '12345', '2024-10-01', '12345'),
(2, 'rafael gamemaker', 'rafael.2023001254@aluno.iffar.edu.br', '2023001254', '2003-07-02', '123'),
(3, 'professor1', 'prof2@gmail.com', '123456', '2000-12-10', '123'),
(4, 'prof teste 3', 'profteste@gmail.com', '2020', '2000-02-20', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
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
(32, 'rafael gamemaker', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`);

--
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`idAluno`,`idTurma`),
  ADD KEY `idTurma` (`idTurma`) USING BTREE;

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idTurma`),
  ADD KEY `idProfessor` (`idProfessor`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `aluno_turma_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`idAluno`),
  ADD CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`idTurma`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
