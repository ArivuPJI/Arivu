-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Fev-2021 às 16:23
-- Versão do servidor: 5.7.26-log
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `provas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`) VALUES
(1, 'Lucas Silva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aux`
--

DROP TABLE IF EXISTS `aux`;
CREATE TABLE IF NOT EXISTS `aux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questao` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aux`
--

INSERT INTO `aux` (`id`, `questao`, `tipo`, `tema`) VALUES
(1, 'Primeira pergunta de química para o André', 0, 'Geografia'),
(2, 'Segunda pergunta de química para o André', 0, 'Geografia'),
(3, '32323', 0, 'Geografia'),
(4, '32323', 0, 'Geografia'),
(5, '32323', 0, 'Geografia'),
(6, 'ewewe', 0, 'Geografia'),
(7, 'ewewe', 0, 'Geografia'),
(8, 'eee', 0, 'Geografia'),
(9, '4343', 0, 'Geografia'),
(10, '4343', 0, 'Geografia'),
(11, '4343', 0, ''),
(12, '32323', 0, ''),
(13, '3232324343', 0, ''),
(14, '3232324343', 0, 'Geografia'),
(15, '3232324343', 0, 'Geografia'),
(16, 'aaa', 0, 'Inglês');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_prova` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_aluno`, `id_prova`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opcoes`
--

DROP TABLE IF EXISTS `opcoes`;
CREATE TABLE IF NOT EXISTS `opcoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_questao` int(11) NOT NULL,
  `opcao` varchar(200) NOT NULL,
  `correta` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `opcoes`
--

INSERT INTO `opcoes` (`id`, `id_questao`, `opcao`, `correta`) VALUES
(1, 1, 'Pergunta 1', 'A'),
(2, 1, 'Pergunta 2', 'A'),
(3, 1, 'Pergunta 3', 'A'),
(4, 1, 'Pergunta 4', 'A'),
(5, 1, 'Pergunta 5', 'A'),
(6, 2, 'Pergunta 1', 'C'),
(7, 2, 'Pergunta 2', 'C'),
(8, 2, 'Pergunta 3', 'C'),
(9, 2, 'Pergunta 4', 'C'),
(10, 2, 'Pergunta 5', 'C'),
(11, 3, '22', 'C'),
(12, 3, '2', 'C'),
(13, 3, '2', 'C'),
(14, 3, '3', 'C'),
(15, 3, '3', 'C'),
(16, 4, '2', 'A'),
(17, 4, '4', 'A'),
(18, 4, '4', 'A'),
(19, 4, '3', 'A'),
(20, 4, '2', 'A'),
(21, 5, '2', 'A'),
(22, 5, '4', 'A'),
(23, 5, '4', 'A'),
(24, 5, '3', 'A'),
(25, 5, '2', 'A'),
(26, 6, '1', 'A'),
(27, 6, '1', 'A'),
(28, 6, '1', 'A'),
(29, 6, '1', 'A'),
(30, 6, '1', 'A'),
(31, 7, '1', 'A'),
(32, 7, '1', 'A'),
(33, 7, '1', 'A'),
(34, 7, '1', 'A'),
(35, 7, '1', 'A'),
(36, 8, '1', 'A'),
(37, 8, '1', 'A'),
(38, 8, '1', 'A'),
(39, 8, '1', 'A'),
(40, 8, '1', 'A'),
(41, 9, '3', 'C'),
(42, 9, '3', 'C'),
(43, 9, '3', 'C'),
(44, 9, '3', 'C'),
(45, 9, '3', 'C'),
(46, 10, '3', 'C'),
(47, 10, '3', 'C'),
(48, 10, '3', 'C'),
(49, 10, '3', 'C'),
(50, 10, '3', 'C'),
(51, 11, '3', 'C'),
(52, 11, '3', 'C'),
(53, 11, '3', 'C'),
(54, 11, '3', 'C'),
(55, 11, '3', 'C'),
(56, 12, 'PErgunta 1', 'A'),
(57, 12, '2', 'A'),
(58, 12, '2', 'A'),
(59, 12, '2', 'A'),
(60, 12, '2', 'A'),
(61, 13, '2', 'A'),
(62, 13, '1', 'A'),
(63, 13, '1', 'A'),
(64, 13, '1', 'A'),
(65, 13, '1', 'A'),
(66, 14, '2', 'A'),
(67, 14, '1', 'A'),
(68, 14, '1', 'A'),
(69, 14, '1', 'A'),
(70, 14, '1', 'A'),
(71, 15, '2', 'A'),
(72, 15, '1', 'A'),
(73, 15, '1', 'A'),
(74, 15, '1', 'A'),
(75, 15, '1', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

DROP TABLE IF EXISTS `provas`;
CREATE TABLE IF NOT EXISTS `provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`id`, `titulo`, `status`) VALUES
(1, 'Prova sobre PHP Orientado a Objetos', 1),
(2, 'Outra Prova', 1),
(3, 'Sua prova', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

DROP TABLE IF EXISTS `questoes`;
CREATE TABLE IF NOT EXISTS `questoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prova` int(11) NOT NULL,
  `questao` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `id_prova`, `questao`, `tipo`) VALUES
(16, 3, 'aaa', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_historico` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
