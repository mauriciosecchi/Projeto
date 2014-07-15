-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jul-2014 às 01:12
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
(1, 'Tenis'),
(2, 'Futebol 7'),
(3, 'Volei'),
(4, 'Volei de areia'),
(5, 'Futsal'),
(6, 'Basquete'),
(7, 'Natacao'),
(8, 'Academia'),
(9, 'Outras'),
(10, 'Futebol');

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
