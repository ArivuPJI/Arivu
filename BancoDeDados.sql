-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Ago-2020 às 15:26
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
-- Banco de dados: `desespero`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente`
--

DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `id_docente` int(11) NOT NULL,
  `Nome_Completo` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Nacionalidade` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Sexo` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Disciplina` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Email_academico` varchar(200) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Email_pessoal` varchar(200) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Telefone_de_Contato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante`
--

DROP TABLE IF EXISTS `estudante`;
CREATE TABLE IF NOT EXISTS `estudante` (
  `id_estudante` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(150) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Data_de_nascimento` date DEFAULT NULL,
  `Nascionalidade` varchar(32) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Sexo` varchar(1) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Nome_do_responsável` varchar(60) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Email_academico` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Telefone_de_contato` int(11) DEFAULT NULL,
  `Email_pessoal` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`id_estudante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed`
--

DROP TABLE IF EXISTS `feed`;
CREATE TABLE IF NOT EXISTS `feed` (
  `Id_Feed` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  Materia varchar(25),
  `Descricao` varchar(300) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Estado` varchar(25) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Cidade` varchar(25) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Referencia` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Horario` time DEFAULT NULL,
  `Tema` varchar(25) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Conteudo` text COLLATE utf8_general_mysql500_ci,
  `Restricao` varchar(15) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Topico` varchar(20) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Id_Quem_Postou` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Feed`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `feed`
--

INSERT INTO `feed` (`Id_Feed`, `Titulo`, `Descricao`, `Estado`, `Cidade`, `Referencia`, `Data`, `Horario`, `Tema`, `Conteudo`, `Restricao`, `Topico`, `Id_Quem_Postou`) VALUES
(1, '1', NULL, '1', '1', NULL, NULL, NULL, 'Física', NULL, NULL, NULL, NULL),
(2, 'Teste de editor', NULL, '1', '1', '1', NULL, NULL, 'Português', NULL, NULL, NULL, NULL),
-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_usuario` int(11) NOT NULL,
  `Nome_Completo` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Sexo` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Disciplina` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Email_academico` varchar(200) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Email_pessoal` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Telefone_de_Contato` int(11) DEFAULT NULL,
  `Restricao` varchar(9) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Senha` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`Email_pessoal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_usuario`, `Nome_Completo`, `Sexo`, `Disciplina`, `Email_academico`, `Email_pessoal`, `Telefone_de_Contato`, `Restricao`, `Senha`) VALUES
(2, 'Teste do Estudante', 'F', NULL, 'ok', 'Estudante', 47837483, 'Estudante', '$2y$10$d8Hpwwj/DENEW4sBuUDvUuCw4/2QgEoWvs8YlAXASltHqw5w7vKDm'),
(1, 'Teste do Professor', 'F', NULL, 'ok', 'Professor', 47837483, 'Professor', '$2y$10$d8Hpwwj/DENEW4sBuUDvUuCw4/2QgEoWvs8YlAXASltHqw5w7vKDm'),
(3, 'Sem Conta', 'F', NULL, 'ok', 'Sem Conta', 47837483, 'Sem Conta', '$2y$10$d8Hpwwj/DENEW4sBuUDvUuCw4/2QgEoWvs8YlAXASltHqw5w7vKDm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
