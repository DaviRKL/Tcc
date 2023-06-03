-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Maio-2017 às 21:25
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelaimg`
--
create wda_crud;
use wda_crud;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `ano` int(11) NOT NULL,
  `datacad` datetime NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tabelaimg`
--

INSERT INTO `carros` (`id`, `modelo`, `marca`, `ano`, `datacad`, `foto`) VALUES
(1, 'Bugatti Chiron Super Sport 2022', 'Bugatti',  '2022', '30/10/2022', 'Bugatti.jpg'),
(2, 'Supra', 'Toyota', '2022', '30/10/2022', 'Supra.jpg'),
(3, 'Mustang Shelby Heritage Edition', 'Ford', '2022', '30/10/2022', 'Mustang.jfif'),
(4, 'Porsche Macan T', 'Porsche','2022', '30/10/2022','Porsche.jpg'),
(5,'Jeep Compass', 'Jeep', '2022', '30/10/2022', 'Jeep_Compass.jpg'),
(6, 'GT-R 50th Aniversary', ' Nissan',  '2020', '30/10/2022', 'gtr.jpg'),
(7,'Corolla Cross', 'Toyota', '2022', '30/10/2022', 'CorollaC.jpg');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE IF NOT EXISTS `pets` ( `id` int(11) NOT NULL AUTO_INCREMENT, `nome` varchar(50) NOT NULL, `tipo` varchar(10) NOT NULL, `sexo` varchar(7) NOT NULL, `raca` varchar(50) NOT NULL, `datanasc` datetime NOT NULL, `foto` varchar(30) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;