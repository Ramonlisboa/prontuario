-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Fev-2017 às 16:54
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prontuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cid`
--

CREATE TABLE IF NOT EXISTS `cid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cid` int(11) NOT NULL,
  `descricao` TEXT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dtnascimento` date NOT NULL,
  `flstatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cad_unico` (`nome`,`dtnascimento`) COMMENT 'Nome e Data de nascimento nao podem ser iguais'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(100),
	`crm` VARCHAR(6),
	`especialidade` VARCHAR(25),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE IF NOT EXISTS prontuario(
	id INT(11) NOT NULL AUTO_INCREMENT,
	id_paciente INT(11) NOT NULL,
	dt_cad DATE,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario_item`
--

CREATE TABLE IF NOT EXISTS prontuario_item(
	id INT(11) NOT NULL AUTO_INCREMENT,
	id_prontuario INT(11) NOT NULL,
	id_paciente INT(11) NOT NULL,
	id_medico INT(11) NOT NULL,
	id_cid INT(11) NOT NULL,
	dt_cad DATE,
	parecer_medico TEXT,	
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
