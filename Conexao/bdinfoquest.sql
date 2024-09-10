-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2024 às 19:10
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
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `IDAdmin` int(11) NOT NULL,
  `IsAdmin` tinyint(1) DEFAULT NULL,
  `IDPessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `IDAluno` int(11) NOT NULL,
  `MatAluno` varchar(50) DEFAULT NULL,
  `IsAluno` tinyint(1) DEFAULT NULL,
  `IDPessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `IDPessoa` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Senha` varchar(50) DEFAULT NULL,
  `DataNasc` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `IDProf` int(11) NOT NULL,
  `IsProf` tinyint(1) DEFAULT NULL,
  `MatProf` varchar(50) DEFAULT NULL,
  `IDPessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `IDTurma` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `IDProf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmaaluno`
--

CREATE TABLE `turmaaluno` (
  `IDTurma` int(11) NOT NULL,
  `IDAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`IDAdmin`),
  ADD KEY `IDPessoa` (`IDPessoa`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`IDAluno`),
  ADD KEY `IDPessoa` (`IDPessoa`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`IDPessoa`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`IDProf`),
  ADD KEY `IDPessoa` (`IDPessoa`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`IDTurma`),
  ADD KEY `IDProf` (`IDProf`);

--
-- Índices para tabela `turmaaluno`
--
ALTER TABLE `turmaaluno`
  ADD PRIMARY KEY (`IDTurma`,`IDAluno`),
  ADD KEY `IDAluno` (`IDAluno`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `IDAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `IDAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `IDPessoa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `IDProf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `IDTurma` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`IDPessoa`) REFERENCES `pessoa` (`IDPessoa`);

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`IDPessoa`) REFERENCES `pessoa` (`IDPessoa`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`IDPessoa`) REFERENCES `pessoa` (`IDPessoa`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`IDProf`) REFERENCES `professor` (`IDProf`);

--
-- Limitadores para a tabela `turmaaluno`
--
ALTER TABLE `turmaaluno`
  ADD CONSTRAINT `turmaaluno_ibfk_1` FOREIGN KEY (`IDTurma`) REFERENCES `turma` (`IDTurma`),
  ADD CONSTRAINT `turmaaluno_ibfk_2` FOREIGN KEY (`IDAluno`) REFERENCES `aluno` (`IDAluno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
