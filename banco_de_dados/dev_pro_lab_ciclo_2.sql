-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Ago-2019 às 00:09
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_pro_lab_ciclo_2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pai` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_pai`, `nome`, `login`, `senha`, `status`) VALUES
(1, 0, 'Henrique', 'hacrbatista', 'e10adc3949ba59abbe56e057f20f883e', 'Ativo'),
(2, 1, 'Fernando', 'fernando', 'e10adc3949ba59abbe56e057f20f883e', 'Ativo'),
(4, 1, 'Alex Pontes', 'alex', 'e10adc3949ba59abbe56e057f20f883e', 'Ativo'),
(5, 1, 'Bruno', 'bruno', 'e10adc3949ba59abbe56e057f20f883e', 'Ativo'),
(6, 1, 'Pablo', 'pablo_2', 'e10adc3949ba59abbe56e057f20f883e', 'Inativo'),
(7, 1, 'Caio', 'lokocaio', 'e10adc3949ba59abbe56e057f20f883e', 'Ativo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
