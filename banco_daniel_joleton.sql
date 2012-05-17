-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 27/04/2012 às 02h50min
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
  KEY `login_administrador` (`login_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`codigo`, `login_administrador`, `nome`, `data`, `hora`) VALUES
(0, 'danielhba', 'Tecnologia da Informação', '2012-04-26', '20:31:38'),
(1, 'danielhba', 'Eng. Computação', '2012-04-09', '18:38:10'),
(2, 'danielhba', 'Ciência da Computação', '2012-04-09', '18:38:10'),
(3, 'danielhba', 'Eng. Elétrica', '2012-04-09', '18:41:28'),
(4, 'danielhba', 'Eng. Controle e Automação', '2012-04-09', '18:41:28'),
(5, 'danielhba', 'Eng. Eletronica', '2012-04-11', '08:08:16'),
(6, 'danielhba', 'Analise e Desenvolvimento de Sistemas', '2012-04-11', '08:08:28'),
(8, 'danielhba', 'Sistema de Informacao', '2012-04-11', '08:09:50');

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
  KEY `login_administrador` (`login_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`codigo`, `login_administrador`, `nome`, `data`, `hora`) VALUES
(0, 'danielhba', 'UML 1.0', '2012-04-26', '20:33:10'),
(1, 'danielhba', 'Termodinâmica', '2012-04-09', '18:50:51'),
(2, 'danielhba', 'Formas Normais', '2012-04-09', '18:51:32'),
(3, 'danielhba', 'Instruções de 2 Bytes', '2012-04-09', '18:53:54'),
(5, 'danielhba', 'Camada de Transporte', '2012-04-11', '08:15:12'),
(6, 'danielhba', 'Vetores e Matrizes em C', '2012-04-11', '08:15:12'),
(7, 'danielhba', 'Modelo Conceitual', '2012-04-11', '08:15:12'),
(8, 'danielhba', 'Modelo Logico', '2012-04-11', '08:15:12'),
(9, 'danielhba', 'Comandos SQL', '2012-04-11', '08:15:12'),
(10, 'danielhba', 'Projeto de Compensadores', '2012-04-11', '08:17:56'),
(11, 'danielhba', 'Camada Fisica', '2012-04-11', '08:17:56'),
(12, 'danielhba', 'Analise Nodal', '2012-04-11', '08:17:56'),
(13, 'danielhba', 'Análise de Malha', '2012-04-11', '08:17:56'),
(14, 'danielhba', 'Energia e Trabalho', '2012-04-11', '08:17:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto_refere_disciplina`
--

CREATE TABLE IF NOT EXISTS `assunto_refere_disciplina` (
  `cod_assunto` int(11) NOT NULL,
  `cod_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`cod_assunto`,`cod_disciplina`),
  KEY `cod_disciplina` (`cod_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assunto_refere_disciplina`
--

INSERT INTO `assunto_refere_disciplina` (`cod_assunto`, `cod_disciplina`) VALUES
(14, 0),
(1, 1),
(2, 2),
(7, 2),
(8, 2),
(9, 2),
(0, 3),
(3, 4),
(11, 5),
(6, 6),
(12, 7),
(13, 7),
(5, 8),
(10, 10);

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
  KEY `login_administrador` (`login_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`codigo`, `login_administrador`, `nome`, `data`, `hora`) VALUES
(0, 'danielhba', 'Fisica 1', '2012-04-26', '20:34:48'),
(1, 'danielhba', 'Física 2', '2012-04-09', '18:43:55'),
(2, 'danielhba', 'Banco de Dados 2', '2012-04-09', '18:43:55'),
(3, 'danielhba', 'Engenharia de Software 1', '2012-04-09', '18:45:16'),
(4, 'danielhba', 'Sistemas Microprocessados', '2012-04-09', '18:45:16'),
(5, 'danielhba', 'Redes de Computadores I', '2012-04-11', '08:21:13'),
(6, 'danielhba', 'Linguagem de Programacao C', '2012-04-11', '08:21:13'),
(7, 'danielhba', 'Circuitos Eletricos I', '2012-04-11', '08:21:13'),
(8, 'danielhba', 'Redes de Computadores II', '2012-04-11', '08:21:13'),
(10, 'danielhba', 'Sistema de Controle I', '2012-04-11', '08:21:43'),
(12, 'danielhba', 'Física 3', '2012-04-26', '20:34:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_refere_area`
--

CREATE TABLE IF NOT EXISTS `disciplina_refere_area` (
  `cod_disciplina` int(11) NOT NULL,
  `cod_area` int(11) NOT NULL,
  PRIMARY KEY (`cod_disciplina`,`cod_area`),
  KEY `cod_area` (`cod_area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina_refere_area`
--

INSERT INTO `disciplina_refere_area` (`cod_disciplina`, `cod_area`) VALUES
(0, 0),
(5, 0),
(6, 0),
(8, 0),
(0, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(10, 1),
(0, 2),
(1, 2),
(4, 2),
(5, 2),
(6, 2),
(0, 3),
(1, 3),
(2, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(10, 3),
(0, 4),
(1, 4),
(2, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(10, 4),
(0, 5),
(6, 5),
(7, 5),
(10, 5),
(0, 6),
(5, 6),
(6, 6),
(8, 6),
(0, 8),
(5, 8),
(6, 8),
(8, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`id`, `login_administrador`, `cod_area`, `cod_disciplina`, `cod_assunto`, `dificuldade`, `enunciado`, `resposta_1`, `resposta_2`, `resposta_3`, `resposta_4`, `resposta_5`, `alternativa_correta`, `data_cadastro`, `hora_cadastro`) VALUES
(2, 'danielhba', 3, 1, 1, '2', 'Ao aplicar um resistência de 2 ohms a tensão de 10V, há uma corrente de:', '1 A', '2 A', '3 A', '4 A', '5 A', '5', '2012-04-09', '23:19:25'),
(3, 'danielhba', 1, 2, 2, '3', 'O que é a terceira foma normal?', 'A existência de atributos multivalorados.', 'A inexistência de atributos multivalorados.', 'A existência de atributos compostos.', 'A inexistência de atributos compostos.', 'A questão b e d estão corretas.', '5', '2012-04-09', '23:19:25'),
(4, 'danielhba', 6, 2, 7, '2', 'O que descreve um modelo Conceitual?', 'Descreve o nível de Abstracao, nesta etapa sao escolhidas as estruturas lógicas.', 'representa o nivel o nivel mais baixo de abstração e descreve como os dados sao armazenados .', 'É o nivel mais alto de abstracao, fala dos objetos do mundo real e suas respectivas operações.', 'Todas as alternativas estao corretas.', 'Todas as alternativas estao incorretas', '3', '2012-04-27', '02:41:02'),
(5, 'danielhba', 0, 2, 9, '2', 'Em sql quando utilizamos a palavra chave DISTINCT na cláusula Select o que acontece?', 'As linhas retornadas da pesquisa são triplicadas', 'As linhas retornadas da pesquisa sao exibidas de forma inversa', 'As linhas retornadas da pesquisa sao concatenadas', 'As linhas retornadas da pesquisa mudam de cor', 'As linhas retornadas  da pesquisa nao apresentam duplicação', '5', '2012-04-11', '08:49:22'),
(6, 'danielhba', 1, 5, 11, '1', 'Quais caracteristicas das Fibras Monomodo estão corretas?', 'Permite propagação em linha reta, é mais cara, mas seu alcance  é muito maior que  as fibras multimodo', 'Permite propagação em angulos diferentes, é barata e possui curto alcance', 'Permite propagacao em linha reta, é barata e detém de um grande alcance', 'Todas as alternativas estão incorretas.', 'Todas as alternativas estão corretas', '1', '2012-04-27', '02:41:56'),
(7, 'danielhba', 2, 5, 5, '2', 'Caracteristicas do Protocolo UDP.', 'É um protocolo complexo  orientado à conexão. Seu cabeçalho é constituido  3 campos.', 'É um protocolo complexo não orientado à conexao, Seu cabeçalho é constituído de 4 campos', 'É um simples protocolo orientado à conexão. Seu cabeçalho é constituído de 3 campos ', 'É um simples protocolo não orientado à conexão . Seu cabeçalho é constituido de 4 campos', 'Todas as alternativas estão incorretas', '4', '2012-04-11', '09:08:41');

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
  `senha` varchar(25) NOT NULL,
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
('danielhba', NULL, 1, 'qwedsaqwe', 'Daniel Henrique Braz de Aquino', '1990-06-27', 'dhbaquino@gmail.com', 92, 32324166, 93, 81580539, 0, NULL, 'Constantino Nery', 92, 69010160, 'Centro', 'Manaus', 'RO', 'Número 153-A', '2012-04-20', '12:46:25'),
('helo', 'danielhba', 3, '123', 'Heloiza', '1988-08-07', 'smii07@hotmail.com', 92, 32324166, 92, 81816308, 0, 0, 'Rua 16', 0, 69010180, 'Parque 10', 'Manaus', 'AM', '', '2012-04-26', '22:02:10'),
('heylera', 'danielhba', 3, 'Heyler', 'Heyler', '1988-12-16', 'teste@gmail.com', 92, 65326596, 92, 32659632, 0, 0, 'Rua Teste', 0, 69010160, 'Centro', 'Manaus', 'AM', '', '2012-04-20', '16:13:17'),
('hfmn.eng', 'danielhba', 3, '123qaz123', 'Humberto Neto', '1993-06-12', 'hfmn.eng@gmail.com', 92, 32360215, 0, 92301845, NULL, NULL, 'Tamandaré', 92, 69034827, 'Cidade Nova', 'Manaus', 'AM', 'Núcleo 15', '2012-04-09', '18:33:43'),
('jdsm.eng', 'danielhba', 2, 'casadonacasa', 'Joelton dos Santos Matos', '1991-04-16', 'joelton_matos@hotmail.com', 92, 35332398, 92, 92126039, 0, NULL, 'Claude Debussy', 92, 69000000, 'Parque 10', 'Manaus', 'AM', 'Número 4', '2012-04-20', '16:42:31'),
('lucila', 'danielhba', 3, 'lucila', 'Lucila de Souza Braz', '1991-06-27', 'lucila@gmail.com', 92, 32324166, 92, 32324166, 92, 32324166, 'Daniel', 153, 69010160, 'Centro', 'Manaus', 'AM', '', '2012-04-20', '16:20:56'),
('marciovitor.enga', 'danielhba', 3, 'narutoversusbleach', 'Marcio Lira Vitor Junior', '1993-08-12', 'mveng@gmail.com', 92, 36047853, 92, 91125435, 0, NULL, 'Beto Freitas', 92, 69000000, 'Zumbi II', 'Manaus', 'AM', '', '2012-04-20', '16:13:42'),
('mateuscarlos.to', 'danielhba', 3, 'palavrasmortas', 'Mateus Carlos da Silva', '1991-11-14', 'mateus22@gmail.com', 92, 333044589, 93, 91457898, 0, NULL, 'Castelo Aguiar', 92, 69000000, 'Parque dos Indus', 'Manaus', 'AM', '', '2012-04-20', '16:14:04');

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
-- Restrições para a tabela `assunto_refere_disciplina`
--
ALTER TABLE `assunto_refere_disciplina`
  ADD CONSTRAINT `assunto_refere_disciplina_ibfk_1` FOREIGN KEY (`cod_assunto`) REFERENCES `assunto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assunto_refere_disciplina_ibfk_2` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`login_administrador`) REFERENCES `usuario` (`login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `disciplina_refere_area`
--
ALTER TABLE `disciplina_refere_area`
  ADD CONSTRAINT `disciplina_refere_area_ibfk_1` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplina_refere_area_ibfk_2` FOREIGN KEY (`cod_area`) REFERENCES `area` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
