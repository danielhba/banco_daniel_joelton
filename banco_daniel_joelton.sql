-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/05/2012 às 00h59min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `banco_daniel_joelton`
--
CREATE DATABASE `banco_daniel_joelton` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `banco_daniel_joelton`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `login_administrador` varchar(25) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `nome` (`nome`),
  KEY `login_administrador` (`login_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`codigo`, `login_administrador`, `nome`, `data`, `hora`) VALUES
(0, 'danielhba', 'Sistema de Informação', '2012-05-02', '15:14:35'),
(1, 'danielhba', 'Eng. Computação', '2012-05-15', '00:01:42'),
(2, 'danielhba', 'Física', '2012-05-16', '18:53:52'),
(3, 'danielhba', 'Eng. Elétrica', '2012-05-02', '15:19:30'),
(4, 'danielhba', 'Eng. Controle e Automação', '2012-04-09', '18:41:28'),
(5, 'danielhba', 'Eng. Eletronica', '2012-04-11', '08:08:16'),
(6, 'danielhba', 'Analise e Desenvolvimento de Sistemas', '2012-05-17', '05:20:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE IF NOT EXISTS `assunto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `login_administrador` varchar(25) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `nome` (`nome`),
  KEY `login_administrador` (`login_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`codigo`, `login_administrador`, `nome`, `data`, `hora`) VALUES
(0, 'danielhba', 'UML 1.0', '2012-05-16', '19:29:19'),
(1, 'danielhba', 'Termodinâmica', '2012-05-16', '19:13:27'),
(2, 'danielhba', 'Formas Normais', '2012-05-16', '19:12:47'),
(3, 'danielhba', 'Instruções de 2 Bytes', '2012-05-16', '19:12:53'),
(6, 'danielhba', 'Vetores e Matrizes em C', '2012-05-16', '19:13:06'),
(7, 'danielhba', 'Modelo Conceitual', '2012-05-16', '19:12:58'),
(8, 'danielhba', 'Modelo Logico', '2012-05-16', '19:13:37'),
(9, 'danielhba', 'Comandos SQL', '2012-05-16', '19:12:38'),
(10, 'danielhba', 'Projeto de Compensadores', '2012-05-16', '19:13:31'),
(11, 'danielhba', 'Camada Fisica', '2012-05-17', '05:20:43'),
(14, 'danielhba', 'Energia e Trabalho', '2012-05-16', '19:12:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto_refere_disciplina`
--

CREATE TABLE IF NOT EXISTS `assunto_refere_disciplina` (
  `cod_assunto` int(11) NOT NULL,
  `cod_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`cod_assunto`,`cod_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assunto_refere_disciplina`
--

INSERT INTO `assunto_refere_disciplina` (`cod_assunto`, `cod_disciplina`) VALUES
(0, 2),
(0, 6),
(0, 7),
(0, 15),
(1, 0),
(1, 1),
(1, 12),
(1, 15),
(2, 1),
(2, 3),
(2, 7),
(3, 5),
(3, 6),
(3, 8),
(6, 4),
(7, 4),
(7, 10),
(8, 0),
(8, 1),
(8, 12),
(9, 1),
(9, 2),
(9, 3),
(9, 5),
(9, 6),
(9, 7),
(9, 12),
(9, 15),
(10, 0),
(10, 6),
(10, 12),
(11, 2),
(11, 3),
(11, 7),
(11, 15),
(14, 1),
(15, 0),
(15, 1),
(15, 2),
(15, 3),
(15, 7),
(15, 12),
(15, 15),
(16, 2),
(16, 3),
(16, 7),
(16, 15),
(17, 0),
(17, 2),
(17, 3),
(17, 7),
(17, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `login_administrador` varchar(25) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `nome` (`nome`),
  KEY `login_administrador` (`login_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`codigo`, `login_administrador`, `nome`, `data`, `hora`) VALUES
(0, 'danielhba', 'Fisica 1', '2012-05-16', '18:06:13'),
(2, 'danielhba', 'Banco de Dados 2', '2012-05-16', '18:53:06'),
(3, 'danielhba', 'Engenharia de Software 1', '2012-05-17', '05:20:49'),
(4, 'danielhba', 'Sistemas Microprocessados', '2012-05-16', '19:16:01'),
(5, 'danielhba', 'Redes de Computadores I', '2012-05-16', '19:15:44'),
(6, 'danielhba', 'Linguagem de Programacao C', '2012-05-16', '19:15:41'),
(7, 'danielhba', 'Circuitos Eletricos I', '2012-05-16', '19:15:21'),
(8, 'danielhba', 'Redes de Computadores II', '2012-05-16', '19:37:17'),
(10, 'danielhba', 'Sistema de Controle I', '2012-05-16', '19:15:56'),
(12, 'danielhba', 'Física 3', '2012-05-16', '20:27:22'),
(15, 'danielhba', 'Banco de Dados 1', '2012-05-16', '19:15:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_refere_area`
--

CREATE TABLE IF NOT EXISTS `disciplina_refere_area` (
  `cod_disciplina` int(11) NOT NULL,
  `cod_area` int(11) NOT NULL,
  PRIMARY KEY (`cod_disciplina`,`cod_area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina_refere_area`
--

INSERT INTO `disciplina_refere_area` (`cod_disciplina`, `cod_area`) VALUES
(0, 1),
(0, 6),
(1, 0),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(2, 3),
(2, 5),
(3, 0),
(3, 2),
(4, 0),
(4, 2),
(5, 1),
(5, 3),
(5, 4),
(5, 6),
(6, 0),
(6, 2),
(7, 0),
(7, 2),
(8, 0),
(8, 2),
(10, 3),
(10, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(15, 1),
(15, 3),
(15, 4),
(15, 6),
(25, 1),
(25, 6),
(26, 1),
(26, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE IF NOT EXISTS `questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_administrador` varchar(25) DEFAULT NULL,
  `cod_area` int(11) DEFAULT NULL,
  `cod_disciplina` int(11) DEFAULT NULL,
  `cod_assunto` int(11) DEFAULT NULL,
  `dificuldade` enum('1','2','3','4','5') NOT NULL,
  `enunciado` varchar(500) NOT NULL,
  `resposta_1` varchar(500) NOT NULL,
  `resposta_2` varchar(500) NOT NULL,
  `resposta_3` varchar(500) NOT NULL,
  `resposta_4` varchar(500) NOT NULL,
  `resposta_5` varchar(500) NOT NULL,
  `alternativa_correta` enum('1','2','3','4','5') NOT NULL,
  `data_cadastro` date NOT NULL,
  `hora_cadastro` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login_administrador` (`login_administrador`),
  KEY `cod_area` (`cod_area`),
  KEY `cod_disciplina` (`cod_disciplina`),
  KEY `cod_assunto` (`cod_assunto`),
  KEY `dificuldade` (`dificuldade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`id`, `login_administrador`, `cod_area`, `cod_disciplina`, `cod_assunto`, `dificuldade`, `enunciado`, `resposta_1`, `resposta_2`, `resposta_3`, `resposta_4`, `resposta_5`, `alternativa_correta`, `data_cadastro`, `hora_cadastro`) VALUES
(2, 'danielhba', 3, NULL, 1, '2', 'Ao aplicar um resistência de 2 ohms a tensão de 10V, há uma corrente de:', '1A', '2A', '3A', '4A', '5A', '5', '2012-04-28', '00:23:35'),
(3, 'danielhba', 1, 2, 2, '3', 'O que é a terceira foma normal?', 'A existência de atributos multivalorados.', 'A inexistência de atributos multivalorados.', 'A existência de atributos compostos.', 'A inexistência de atributos compostos.', 'A questão b e d estão corretas.', '5', '2012-05-10', '05:52:40'),
(4, 'danielhba', 6, 2, 7, '2', 'O que descreve um modelo Conceitual?', 'Descreve o nível de Abstracao, nesta etapa sao escolhidas as estruturas lógicas.', 'representa o nivel o nivel mais baixo de abstração e descreve como os dados sao armazenados .', 'É o nivel mais alto de abstracao, fala dos objetos do mundo real e suas respectivas operações.', 'Todas as alternativas estao corretas.', 'Todas as alternativas estao incorretas', '3', '2012-04-27', '02:41:02'),
(5, 'danielhba', NULL, 2, 9, '2', 'Em sql quando utilizamos a palavra chave DISTINCT na cláusula Select o que acontece?', 'As linhas retornadas da pesquisa são triplicadas', 'As linhas retornadas da pesquisa sao exibidas de forma inversa', 'As linhas retornadas da pesquisa sao concatenadas', 'As linhas retornadas da pesquisa mudam de cor', 'As linhas retornadas  da pesquisa nao apresentam duplicação', '5', '2012-04-11', '08:49:22'),
(6, 'danielhba', 1, 5, 11, '1', 'Quais caracteristicas das Fibras Monomodo estão corretas?', 'Permite propagação em linha reta, é mais cara, mas seu alcance  é muito maior que  as fibras multimodo', 'Permite propagação em angulos diferentes, é barata e possui curto alcance', 'Permite propagacao em linha reta, é barata e detém de um grande alcance', 'Todas as alternativas estão incorretas.', 'Todas as alternativas estão corretas', '1', '2012-04-27', '02:41:56'),
(7, 'danielhba', 2, 8, NULL, '2', 'Caracteristicas do Protocolo UDP.', 'É um protocolo complexo  orientado à conexão. Seu cabeçalho é constituido  3 campos.', 'É um protocolo complexo não orientado à conexao, Seu cabeçalho é constituído de 4 campos', 'É um simples protocolo orientado à conexão. Seu cabeçalho é constituído de 3 campos', 'É um simples protocolo não orientado à conexão . Seu cabeçalho é constituido de 4 campos', 'Todas as alternativas estão incorretas', '2', '2012-04-27', '05:53:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `Tipo` int(1) NOT NULL,
  PRIMARY KEY (`Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`Tipo`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(25) NOT NULL,
  `login_administrador` varchar(25) DEFAULT NULL,
  `tipo_usuario` int(1) DEFAULT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone_ddd` int(2) NOT NULL,
  `telefone` int(8) NOT NULL,
  `celular_1_ddd` int(2) NOT NULL,
  `celular_1` int(8) NOT NULL,
  `celular_2_ddd` int(2) DEFAULT NULL,
  `celular_2` int(8) DEFAULT NULL,
  `end_rua` varchar(50) NOT NULL,
  `end_numero` int(5) DEFAULT NULL,
  `end_cep` int(8) NOT NULL,
  `end_bairro` varchar(50) NOT NULL,
  `end_cidade` varchar(50) NOT NULL,
  `end_estado` varchar(2) NOT NULL,
  `end_complemento` varchar(50) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `hora_cadastro` time NOT NULL,
  PRIMARY KEY (`login`),
  KEY `login_administrador` (`login_administrador`),
  KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `login_administrador`, `tipo_usuario`, `senha`, `nome`, `data_nascimento`, `email`, `telefone_ddd`, `telefone`, `celular_1_ddd`, `celular_1`, `celular_2_ddd`, `celular_2`, `end_rua`, `end_numero`, `end_cep`, `end_bairro`, `end_cidade`, `end_estado`, `end_complemento`, `data_cadastro`, `hora_cadastro`) VALUES
('danielhba', NULL, 1, '63dfcda7649d4790def22071920806ba', 'Daniel Henrique Braz de Aquino', '1990-06-27', 'dhbaquino@gmail.com', 92, 32324166, 93, 81580539, 0, NULL, 'Constantino Nery', 92, 69010160, 'Centro', 'Manaus', 'RO', 'Número 153-A', '2012-05-18', '00:57:24'),
('helo', 'danielhba', 3, '202cb962ac59075b964b07152d234b70', 'Heloiza', '1988-08-07', 'smii07@hotmail.com', 92, 32324166, 92, 81816308, 92, 92091355, 'Rua 16', 0, 69010180, 'Parque 10', 'Manaus', 'AM', '', '2012-05-10', '01:31:27'),
('heylera', 'danielhba', 3, '86ad50e70c349ce7426b547e160b7102', 'Heyler', '1988-12-16', 'teste@gmail.com', 92, 65326596, 92, 32659632, 0, 0, 'Rua Teste', 0, 69010160, 'Centro', 'Manaus', 'AM', '', '2012-04-20', '16:13:17'),
('hfmn.eng', 'danielhba', 3, '9ce48d8fc4574f10c3c8e72ea65238bb', 'Humberto Neto', '1993-06-12', 'hfmn.eng@gmail.com', 92, 32360215, 92, 92301845, 0, 0, 'Tamandaré', 92, 69034827, 'Cidade Nova', 'Manaus', 'AM', 'Núcleo 15', '2012-05-16', '23:55:32'),
('jdsm.eng', 'danielhba', 2, '157904a4317f8454845ababbe4b91c97', 'Joelton dos Santos Matos', '1991-04-16', 'joelton_matos@hotmail.com', 92, 35332398, 92, 92126039, 0, 0, 'Claude Debussy', 92, 69000000, 'Parque 10', 'Manaus', 'AM', 'Número 4', '2012-05-16', '23:54:57'),
('lucila', 'danielhba', 3, '1d8d7866bb67da8cd6fd50e9c9d59241', 'Lucila de Souza Braz', '1991-06-27', 'lucila@gmail.com', 92, 32324166, 92, 32324166, 92, 32324166, 'Daniel', 153, 69010160, 'Centro', 'Manaus', 'AM', '', '2012-04-20', '16:20:56'),
('marciovitor.enga', 'danielhba', 3, '33ea6f999ba65f322620c7b44299bed6', 'Marcio Lira Vitor Junior', '1993-08-12', 'mveng@gmail.com', 92, 36047853, 92, 91125435, 0, NULL, 'Beto Freitas', 92, 69000000, 'Zumbi II', 'Manaus', 'AM', '', '2012-04-20', '16:13:42'),
('mateuscarlos.to', 'danielhba', 3, '442cb777bec707f68803544c0d4b56ec', 'Mateus Carlos da Silva', '1991-11-14', 'mateus22@gmail.com', 92, 333044589, 93, 91457898, 0, NULL, 'Castelo Aguiar', 92, 69000000, 'Parque dos Indus', 'Manaus', 'AM', '', '2012-04-20', '16:14:04'),
('teste', 'danielhba', 2, '698dc19d489c4e4db73e28a713eab07b', 'qwe', '1991-06-27', 'danilu@gmail.com', 92, 32324166, 92, 81580539, 0, 0, 'Constantino Nery', 0, 69010160, 'Centro', 'Manaus', 'RO', '', '2012-05-18', '00:24:22');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`login_administrador`) REFERENCES `usuario` (`login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `assunto`
--
ALTER TABLE `assunto`
  ADD CONSTRAINT `assunto_ibfk_1` FOREIGN KEY (`login_administrador`) REFERENCES `usuario` (`login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`login_administrador`) REFERENCES `usuario` (`login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `questao_ibfk_1` FOREIGN KEY (`login_administrador`) REFERENCES `usuario` (`login`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questao_ibfk_2` FOREIGN KEY (`cod_area`) REFERENCES `area` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questao_ibfk_3` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questao_ibfk_4` FOREIGN KEY (`cod_assunto`) REFERENCES `assunto` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`login_administrador`) REFERENCES `usuario` (`login`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo` (`Tipo`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
