-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jul-2014 às 17:09
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
(10, 'Futebol'),
(11, 'TÃªnis de Mesa'),
(12, 'Surfe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quadra`
--

DROP TABLE IF EXISTS `quadra`;
CREATE TABLE IF NOT EXISTS `quadra` (
  `id_quadra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(10) unsigned NOT NULL,
  `desc_quadra` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horario_base` time DEFAULT NULL,
  `horario_ini` time DEFAULT NULL,
  `horario_fim` time DEFAULT NULL,
  PRIMARY KEY (`id_quadra`),
  UNIQUE KEY `desc_quadra` (`desc_quadra`),
  KEY `quadra_FKIndex1` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `quadra`
--

INSERT INTO `quadra` (`id_quadra`, `id_modalidade`, `desc_quadra`, `horario_base`, `horario_ini`, `horario_fim`) VALUES
(34, 1, 'Quadra 1', '01:30:00', '08:00:00', '22:00:00'),
(39, 11, 'Mesa 1', '01:30:00', '08:00:00', '22:30:00'),
(42, 11, 'Mesa 2', '01:00:00', '07:00:00', '18:00:00'),
(43, 2, 'Cancha 1', '01:00:00', '09:00:00', '23:00:00'),
(44, 11, 'Mesa 3', '00:30:00', '07:30:00', '12:30:00'),
(45, 11, 'Mesa 4', '00:30:00', '08:00:00', '22:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_usuario`, `id_quadra`, `desc_reserva`, `obs`, `dt_reserva`, `horario`) VALUES
(8, 5, 34, 'Quadra 1', '', '2014-07-16', '11:00:00'),
(9, 4, 34, 'Quadra 1', '', '2014-07-17', '09:30:00'),
(10, 5, 34, 'Quadra 1', 'Vou jogar com o Fulano', '2014-07-21', '20:00:00'),
(12, 4, 34, 'Quadra 1', 'Teste', '2014-07-24', '11:00:00'),
(13, 4, 34, 'Quadra 1', 'Teste', '2014-07-24', '11:00:00'),
(21, 8, 34, 'Quadra 1', 'Reserva 3', '2014-07-26', '15:30:00'),
(22, 5, 34, 'Quadra 1', 'Jogo com o Ciclano', '2014-07-25', '12:30:00'),
(23, 5, 34, 'Quadra 1', 'Jogo com beltrano', '2014-07-26', '11:00:00'),
(24, 7, 34, 'Quadra 1', 'Jogar com o Djoko', '2014-07-21', '08:00:00'),
(25, 7, 34, 'Quadra 1', 'Jogar com o Djoko e o Nadal', '2014-07-21', '08:00:00'),
(26, 5, 34, 'Quadra 1', 'Vou jogar com o Fulano.', '2014-07-24', '15:30:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cpf`, `nome`, `id_socio`, `rg`, `dt_nasc`, `dt_assoc`, `logradouro`, `cep`, `cidade`, `estado`, `email`, `senha`, `obs`, `tipo_usuario`, `sobrenome`, `aprovacao`, `telefone`, `celular`, `login`, `apelido`) VALUES
(4, '07520429989', 'Fulano ', NULL, '121212', '1977-12-31', '2011-08-31', 'R. Taipa', NULL, 'Chapeco', 'SC', 'sdsds@fddfd.com', 'fulano', NULL, 0, 'de Tal', 1, '5555', '', 'fulano', 'Fulaninho'),
(5, '27778685493', 'Joao', NULL, '8888', '2000-02-05', '2006-01-01', 'Rua das Hortencias', NULL, 'Maravilha', 'PA', 'gropu@sdfsdf.com', 'joao', NULL, 0, 'das Couves', 1, '1828481212', '1243567687', 'joao', 'Joaozinho'),
(6, '83540889442', 'Mariana', NULL, '12389712', '1990-05-14', '2006-07-06', 'Avenida Candelaria', NULL, 'Chapeco', 'RJ', 'mariana.pereira_@hotmail.com', 'mariana', NULL, 0, 'Pereira', 1, '55555', '82182818', 'mariana', 'Marianinha'),
(7, '54888867968', 'Denio', NULL, '121212', '2000-07-15', '2010-01-02', 'R. Taipa', NULL, 'Chapeco', 'GO', 'duarte.denio@gmail;com', 'aabb10', NULL, 0, 'Duarte', 1, '73737317', '82182818', 'denio', 'Denio'),
(8, '18825715684', 'Administrador', NULL, '131255', '1990-05-04', '2010-05-31', 'Rua das Hortencias', NULL, 'Cunha PorÃ£', 'CE', 'aabbchapeco@gmail.com', 'admin', NULL, 1, 'AABB', 1, '73737317', '91029010', 'admin', 'Admin'),
(9, '08214497965', 'Pedro', NULL, '55555', '1980-02-09', '2000-01-02', 'R. das Flores', NULL, 'Maravilha', 'CE', 'gropu@sdfsdf.com', 'pedro', NULL, 0, 'Augusto da SIlva', 1, '880022010', '82182818', 'pedro', 'PedrÃ£o');

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
