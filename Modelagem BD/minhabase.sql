-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jul-2014 às 02:27
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aabb`
--
CREATE DATABASE IF NOT EXISTS `aabb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `aabb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

DROP TABLE IF EXISTS `modalidade`;
CREATE TABLE IF NOT EXISTS `modalidade` (
  `id_modalidade` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc_modalidade` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id_modalidade`, `desc_modalidade`) VALUES
(1, 'Tênis'),
(2, 'Futebol 7'),
(3, 'Volei'),
(4, 'Volei de areia'),
(5, 'Futsal'),
(6, 'Basquete'),
(7, 'Natação'),
(8, 'Academia'),
(9, 'Outras'),
(10, 'Futebol'),
(11, 'Tênis de Mesa'),
(12, 'Corrida'),
(13, 'DanÃ§a'),
(14, 'Teste'),
(15, 'Cadastro'),
(16, 'mais uma'),
(17, 'testando'),
(18, 'testando outra vez');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quadra`
--

DROP TABLE IF EXISTS `quadra`;
CREATE TABLE IF NOT EXISTS `quadra` (
  `id_quadra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(10) unsigned NOT NULL,
  `desc_quadra` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `horario_base` time DEFAULT NULL,
  `horario_ini` time DEFAULT NULL,
  `horario_fim` time DEFAULT NULL,
  PRIMARY KEY (`id_quadra`),
  KEY `quadra_FKIndex1` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `quadra`
--

INSERT INTO `quadra` (`id_quadra`, `id_modalidade`, `desc_quadra`, `horario_base`, `horario_ini`, `horario_fim`) VALUES
(18, 4, 'Cancha 1', '01:00:00', '09:00:00', '22:00:00'),
(20, 4, 'Quadra 2', '03:00:00', '02:00:00', '23:00:00'),
(21, 4, 'Quadra 2', '03:00:00', '02:00:00', '23:00:00'),
(22, 4, 'Quadra 2', '03:00:00', '02:00:00', '23:00:00'),
(23, 6, 'Quadra 1', '23:01:00', '02:02:00', '03:32:00'),
(24, 5, 'Quadra 1', '01:00:00', '01:00:00', '23:00:00'),
(25, 10, 'Teste', '23:02:00', '21:00:00', '03:20:00'),
(26, 10, 'Teste', '23:02:00', '21:00:00', '03:20:00'),
(27, 7, 'ada', '12:34:00', '01:12:00', '21:02:00'),
(28, 8, 'Sala 1', '01:34:00', '09:00:00', '22:00:00'),
(29, 13, 'SalÃ£o', '01:00:00', '01:00:00', '22:00:00'),
(30, 13, 'ContemporÃ¢nea', '01:00:00', '03:00:00', '23:00:00'),
(31, 1, 'tennis', '01:30:00', '09:30:00', '22:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_quadra` int(10) unsigned NOT NULL,
  `desc_reserva` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `obs` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `dt_reserva` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_quadra` (`id_quadra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_usuario`, `id_quadra`, `desc_reserva`, `obs`, `dt_reserva`, `horario`) VALUES
(1, 1, 18, NULL, NULL, '2014-06-30', '14:00:00'),
(2, 1, 31, NULL, NULL, '2014-07-03', '11:00:00'),
(3, 1, 31, NULL, NULL, '2014-07-03', '14:00:00'),
(4, 1, 31, NULL, NULL, '2014-07-03', '15:30:00'),
(5, 2, 31, NULL, NULL, '2014-07-04', '09:30:00'),
(6, 2, 31, NULL, NULL, '2014-07-04', '12:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `restricao`
--

DROP TABLE IF EXISTS `restricao`;
CREATE TABLE IF NOT EXISTS `restricao` (
  `id_restricao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `dt_ini` date DEFAULT NULL,
  `dt_fim` date DEFAULT NULL,
  PRIMARY KEY (`id_restricao`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `id_socio` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `rg` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `dt_assoc` date DEFAULT NULL,
  `logradouro` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cep` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(45) CHARACTER SET latin1 NOT NULL,
  `obs` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tipo_usuario` int(10) unsigned DEFAULT NULL,
  `sobrenome` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `aprovacao` int(10) unsigned DEFAULT NULL,
  `telefone` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `celular` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `login` varchar(20) CHARACTER SET latin1 NOT NULL,
  `apelido` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cpf`, `nome`, `id_socio`, `rg`, `dt_nasc`, `dt_assoc`, `logradouro`, `cep`, `cidade`, `estado`, `email`, `senha`, `obs`, `tipo_usuario`, `sobrenome`, `aprovacao`, `telefone`, `celular`, `login`, `apelido`) VALUES
(1, '08214497965', 'MaurÃ­cio', NULL, '5114049', '1992-10-27', '2014-06-01', 'Rua Duque de Caxias', NULL, 'Cunha PorÃ£', 'PB', 'mauricio.secchi@gmail.com', 'mauricio', NULL, 1, 'Henrique Secchi', 1, '36460388', '91221018', 'mauricio', 'Mauricio t'),
(2, '25644854213', 'Joao', NULL, '1231515', '1992-04-03', '2000-05-20', 'Rua das Amendoas', NULL, 'ChapecÃ³', 'SC', 'joao.silva@hotmail.com', 'joao', NULL, 0, 'da Silva', 1, '4999110011', '4988002212', 'joao', 'Joaozinho');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `quadra`
--
ALTER TABLE `quadra`
  ADD CONSTRAINT `quadra_ibfk_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_quadra`) REFERENCES `quadra` (`id_quadra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `restricao`
--
ALTER TABLE `restricao`
  ADD CONSTRAINT `restricao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
