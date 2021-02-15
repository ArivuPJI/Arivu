-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Fev-2021 às 15:54
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
-- Estrutura da tabela `criar_provas`
--

DROP TABLE IF EXISTS `criar_provas`;
CREATE TABLE IF NOT EXISTS `criar_provas` (
  `Pergunta` varchar(200) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Tema` varchar(40) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Materia` varchar(20) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Id_Prova` int(3) NOT NULL AUTO_INCREMENT,
  `Alternativa_A` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Alternativa_B` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Alternativa_C` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Alternativa_D` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Alternativa_E` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`Id_Prova`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `criar_provas`
--

INSERT INTO `criar_provas` (`Pergunta`, `Tema`, `Materia`, `Id_Prova`, `Alternativa_A`, `Alternativa_B`, `Alternativa_C`, `Alternativa_D`, `Alternativa_E`) VALUES
('eee', 'Selecionar', 'Matemática', 1, '', '', '', '', ''),
('op', 'Selecionar', 'Matemática', 2, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `sigla` varchar(5) COLLATE utf8_general_mysql500_ci NOT NULL,
  `nome` varchar(40) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`sigla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`sigla`, `nome`) VALUES
('BDD', 'Banco de dados'),
('LP1', 'Linguagem de programação'),
('MAT', 'Matemática'),
('PJI', 'Projeto integrado'),
('RDI', 'Redes');

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
-- Estrutura da tabela `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `cor` varchar(7) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `Nome`, `inicio`, `fim`, `cor`) VALUES
(1, 'teste', '0000-00-00', '2011-11-11', '#0000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed`
--

DROP TABLE IF EXISTS `feed`;
CREATE TABLE IF NOT EXISTS `feed` (
  `Id_Feed` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Materia` varchar(25) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `feed`
--

INSERT INTO `feed` (`Id_Feed`, `Titulo`, `Materia`, `Descricao`, `Estado`, `Cidade`, `Referencia`, `Data`, `Horario`, `Tema`, `Conteudo`, `Restricao`, `Topico`, `Id_Quem_Postou`) VALUES
(21, 'Teste de novo evento', '', 'Um pequeno evento beneficente para todas as minhas turmas.', 'São Paulo', 'São Paulo', 'Câmara', '2020-04-10', '10:00:00', 'Array', NULL, 'Turmas', 'Evento', 1),
(22, 'Teste de editor', 'Física', 'teste', 'São Paulo', 'São Paulo', 'Testando aqui, meu bom', '1111-11-28', '11:11:00', 'Array', NULL, 'Escola', 'Evento', 1),
(23, 'Teste do criar', 'Educação Física', 'Opa', NULL, NULL, NULL, NULL, NULL, 'Será que o tema vai?', NULL, 'Publico', 'Resumo', 1),
(24, '3', 'Geografia', '', NULL, NULL, NULL, NULL, NULL, '3', NULL, '', 'Resumo', 1),
(25, '4', 'Biologia', '', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', 'Resumo', 1),
(26, 'Resumo de teste', 'Física', 'AAAAAA', NULL, NULL, NULL, NULL, NULL, 'Pamonha', NULL, 'Publico', 'Resumo', 1),
(27, 'TESTE PARA AS QUESTÕES ', '', '', NULL, NULL, NULL, NULL, NULL, 'Opa amigão, tá bem?', NULL, 'Publico', 'Resumo', 1),
(28, 'Teste de editor', 'Matemática', 'wwwww', NULL, NULL, NULL, NULL, NULL, 'Será que o tema vai?', NULL, 'Publico', 'Resumo', 1),
(29, 'Exclui, ainda dá certo?', 'História', 'ok', NULL, NULL, NULL, NULL, NULL, 'teste ', NULL, 'Publico', 'Resumo', 1),
(30, 'Marcador', 'Matemática', 'ioioi', NULL, NULL, NULL, NULL, NULL, 'Será que o tema vai?', NULL, 'Publico', 'Resumo', 1),
(31, 'Pamonha é bom', 'Educação Física', 'É uma bela tarde de sol, está calor e o Arthur gosta de uvas verdes com caroço pq ele engole. Sim, ele é estranho...', 'São Paulo', 'São Paulo', 'Testando aqui, meu bom', '2020-11-18', '00:22:00', 'Array', NULL, 'Todos', 'Evento', 1),
(32, 'André', 'Química', 'O André é uma pessoa interessante porém as vezes me irrita.', NULL, NULL, NULL, NULL, NULL, 'O André é chato', NULL, 'Publico', 'Resumo', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_aluno`, `id_prova`) VALUES
(1, 1, 2),
(2, 1, 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
CREATE TABLE IF NOT EXISTS `perguntas` (
  `Id_Pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `Materia` varchar(25) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Tema` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Ano` varchar(20) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Restricao` varchar(15) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Pergunta` text COLLATE utf8_general_mysql500_ci,
  `Alternativa_A` text COLLATE utf8_general_mysql500_ci,
  `Alternativa_B` text COLLATE utf8_general_mysql500_ci,
  `Alternativa_C` text COLLATE utf8_general_mysql500_ci,
  `Alternativa_D` text COLLATE utf8_general_mysql500_ci,
  `Alternativa_E` text COLLATE utf8_general_mysql500_ci,
  `Correto` varchar(40) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Pergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`Id_Pergunta`, `Materia`, `Tema`, `Ano`, `Restricao`, `Pergunta`, `Alternativa_A`, `Alternativa_B`, `Alternativa_C`, `Alternativa_D`, `Alternativa_E`, `Correto`) VALUES
(1, 'Matemática', 'Selecionar', 'Segundo', 'Professor', 'eee', NULL, NULL, NULL, NULL, NULL, 'A'),
(2, 'Matemática', 'Selecionar', 'Segundo', 'Professor', 'op', NULL, NULL, NULL, NULL, NULL, 'B'),
(3, 'Geografia', 'Selecionar', 'Primeiro', 'Todos', 'rrr', NULL, NULL, NULL, NULL, NULL, 'D'),
(4, 'Geografia', 'Selecionar', 'Segundo', 'Professor', 'ok', 'Pergunta 1', 'Pergunta 2', 'Pergunta 3', 'Pergunta 4', 'Pergunta 5', 'C'),
(5, 'Geografia', 'Selecionar', 'Segundo', 'Todos', 'Teste', 'Pergunta 1', 'Pergunta 2', 'Pergunta 3', 'Pergunta 4', 'Pergunta 5', 'A'),
(6, 'Geografia', 'Teste3', 'Vestibular', 'Professor', 'A RESPOSTA CORRETA É A LETRA E!', 'Pergunta 1', 'Pergunta 2', 'Pergunta 3', 'Pergunta 4', 'Pergunta 5', 'E'),
(7, 'Matemática', '', 'Segundo', '', '', '', '', '', '', '', 'C'),
(8, 'Geografia', 'Teste3', 'Vestibular', 'Professor', 'teste', 'teste', 'Pergunta 2', 'Pergunta 3', 'Pergunta 4', 'Pergunta 5', 'C'),
(9, 'Português', 'Selecionar', 'Primeiro', 'Todos', 'Essa é a pergunta inicial de português. É o nosso primeiro teste e a resposta correta é a 2 (ou a letra B).', 'Essa seria a questão 1 do PRIMEIRO teste', 'Essa seria a questão 2 do PRIMEIRO teste', 'Essa seria a questão 3 do PRIMEIRO teste', 'Essa seria a questão 4 do PRIMEIRO teste', 'Essa seria a questão 5 do PRIMEIRO teste', 'B'),
(10, 'Português', 'Selecionar', 'Primeiro', 'Todos', 'Esse é o nosso segundo teste. A resposta correta é a 4 (letra D). PORTUGUÊS 1º anooo.', 'Essa seria a questão 1 do SEGUNDO teste', 'Essa seria a questão 2 do SEGUNDO teste', 'Essa seria a questão 3 do SEGUNDO teste', 'Essa seria a questão 4 do SEGUNDO teste', 'Essa seria a questão 5 do SEGUNDO teste', 'D'),
(11, 'Português', 'Selecionar', 'Primeiro', 'Todos', 'Opa, port aqui', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'História', 'Selecionar', 'Segundo', 'Todos', 'rerererererere', 'Pergunta 1', 'Pergunta 2', 'Pergunta 3', 'Pergunta 4', 'Pergunta 5', 'A'),
(13, 'Biologia', '', 'Segundo', 'Todos', 'tereretetew', 'Pergunta 1', 'Pergunta 2', 'Pergunta 3', 'Pergunta 4', 'Pergunta 5', 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova`
--

DROP TABLE IF EXISTS `prova`;
CREATE TABLE IF NOT EXISTS `prova` (
  `cod_prova` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`cod_prova`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `prova`
--

INSERT INTO `prova` (`cod_prova`, `nome`, `descricao`) VALUES
(1, 'MAT', 'Prova de matemática'),
(2, 'BDD', 'Prova de banco de dados'),
(3, 'LG1', 'Prova de lógica'),
(4, 'MAT', 'Prova de matemática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

DROP TABLE IF EXISTS `questao`;
CREATE TABLE IF NOT EXISTS `questao` (
  `cod_questao` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `cod_prova` int(11) NOT NULL,
  `cod_tema` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_questao`),
  KEY `fk_prova` (`cod_prova`),
  KEY `fk_tema` (`cod_tema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `redacoes`
--

DROP TABLE IF EXISTS `redacoes`;
CREATE TABLE IF NOT EXISTS `redacoes` (
  `Id_Redação` int(11) NOT NULL,
  `Tema` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Título` varchar(60) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Redação` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Nome_Aluno` varchar(60) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Nome_Professor` varchar(60) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Id_Aluno` int(11) DEFAULT NULL,
  `Id_Professor` int(11) DEFAULT NULL,
  `Estado` varchar(10) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Correção` text COLLATE utf8_general_mysql500_ci,
  PRIMARY KEY (`Id_Redação`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

DROP TABLE IF EXISTS `tema`;
CREATE TABLE IF NOT EXISTS `tema` (
  `cod_tema` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `sigla_disciplina` varchar(5) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`cod_tema`),
  KEY `fk_disciplina` (`sigla_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `tema`
--

INSERT INTO `tema` (`cod_tema`, `nome`, `sigla_disciplina`) VALUES
(1, 'Matrizes', 'MAT'),
(2, 'Sistemas', 'MAT'),
(3, 'Sistemas lineares', 'MAT'),
(4, 'Gráficos', 'MAT'),
(5, 'Equações', 'MAT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temas`
--

DROP TABLE IF EXISTS `temas`;
CREATE TABLE IF NOT EXISTS `temas` (
  `Id_Tema` int(11) NOT NULL,
  `Materia` varchar(25) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Tema` varchar(40) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Tema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `temas`
--

INSERT INTO `temas` (`Id_Tema`, `Materia`, `Tema`) VALUES
(1, 'Matemática', 'Teste1'),
(2, 'Matemática', 'Teste2'),
(3, 'Geografia', 'Teste3'),
(4, 'Português', 'Teste de Port');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temas_redação`
--

DROP TABLE IF EXISTS `temas_redação`;
CREATE TABLE IF NOT EXISTS `temas_redação` (
  `Id_Tema` int(11) NOT NULL,
  `Tema` varchar(60) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Tema`),
  UNIQUE KEY `Id_Tema` (`Id_Tema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `temas_redação`
--

INSERT INTO `temas_redação` (`Id_Tema`, `Tema`) VALUES
(1, 'Primeira guerra'),
(2, 'Revolução indutrial'),
(3, 'Valorização do SUS'),
(4, 'Os impactos das fake news na sociedade brasileira'),
(5, 'Saúde mental'),
(6, 'O acesso à informação na sociedade brasileira'),
(7, 'Saúde nutricional no Brasil em debate'),
(8, 'Brasil acima do peso: o que fazer?'),
(9, 'A disseminação da violência urbana no Brasil'),
(10, 'O envelhecimento e os direitos da população idosa no Brasil');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `fk_prova` FOREIGN KEY (`cod_prova`) REFERENCES `prova` (`cod_prova`),
  ADD CONSTRAINT `fk_tema` FOREIGN KEY (`cod_tema`) REFERENCES `tema` (`cod_tema`);

--
-- Limitadores para a tabela `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_disciplina` FOREIGN KEY (`sigla_disciplina`) REFERENCES `disciplina` (`sigla`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
