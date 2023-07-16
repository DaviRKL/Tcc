-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Maio-2023 às 16:11
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wda_crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pet` varchar(50) NOT NULL,
  `loja` varchar(30) NOT NULL,
  `servico` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_usuario`, `pet`, `loja`, `servico`, `data`, `horario`) VALUES
(1, 1, 'happy', 'loja1', 'banho e tobas', '2023-05-09', '18:17:00'),
(6, 6, 'Happy', 'Loja 2', 'Banha e Tobas', '2023-05-07', '20:34:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `ano` int(11) NOT NULL,
  `datacad` datetime NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `modelo`, `marca`, `ano`, `datacad`, `foto`) VALUES
(1, 'Bugatti Chiron Super Sport 2022', 'Bugatti', 2022, '0000-00-00 00:00:00', 'Bugatti.jpg'),
(2, 'Supra', 'Toyota', 2022, '0000-00-00 00:00:00', 'Supra.jpg'),
(3, 'Mustang Shelby Heritage Edition', 'Ford', 2022, '0000-00-00 00:00:00', 'Mustang.jfif'),
(4, 'Porsche Macan T', 'Porsche', 2022, '0000-00-00 00:00:00', 'Porsche.jpg'),
(5, 'Jeep Compass', 'Jeep', 2022, '0000-00-00 00:00:00', 'Jeep_Compass.jpg'),
(6, 'GT-R 50th Aniversary', ' Nissan', 2020, '0000-00-00 00:00:00', 'gtr.jpg'),
(7, 'Corolla Cross', 'Toyota', 2022, '0000-00-00 00:00:00', 'CorollaC.jpg'),
(8, 'cacasacasc', 'Esqueci', 2000, '2023-05-06 13:52:18', 'paw.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `datanasc` varchar(11) DEFAULT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`id`, `nome`, `tipo`, `sexo`, `raca`, `datanasc`, `foto`) VALUES
(6, 'Cao chupando manga', 'Cachorro', 'Macho', 'Macho', '2023-05-06 ', 'paw.jpg'),
(7, 'Cao chupando manga', 'Cachorro', 'Macho', 'bundog', '2023-05-06 ', 'ban.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `user`, `password`, `foto`) VALUES
(1, 'sei lakkkk', 'admin', 12345, 'Bugatti.jpg'),
(6, 'Eu mesmo', 'davi', 12345, 'sandro.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
