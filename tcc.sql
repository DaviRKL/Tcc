-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jul-2023 às 23:04
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
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `id_pet` int(11) DEFAULT NULL,
  `pet` varchar(50) DEFAULT NULL,
  `empresa` varchar(30) DEFAULT NULL,
  `servico` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_tutor`, `id_pet`, `pet`, `empresa`, `servico`, `data`, `horario`) VALUES
(1, 1, NULL, 'happy', 'loja1', 'banho e tobas', '2023-05-09', '18:17:00'),
(6, 2, NULL, 'Happy', 'Loja 2', 'Banha e Tobas', '2023-05-07', '20:34:00'),
(7, 1, NULL, '', 'Loja 1', 'Banho e Tosa', '2023-07-26', '02:11:00'),
(18, 1, 1, 'Array', 'Loja 3', 'Banho e Tosa', '2023-07-31', '17:14:00'),
(19, 1, 6, 'Array', 'Loja 3', 'Banho e Tosa', '2023-07-10', '22:24:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `cnpj` int(20) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `endereço` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `precoBanho` int(4) DEFAULT NULL,
  `precoTosa` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `datanasc` varchar(11) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`id`, `id_tutor`, `nome`, `tipo`, `sexo`, `raca`, `datanasc`, `foto`) VALUES
(1, 1, 'Cao chupando manga', 'Cachorro', 'Macho', 'bundog', '2023-07-14 ', 'cachorroagenda.jpg'),
(6, 1, 'Happy', 'Cachorro', 'Macho', 'Macho', '2023-05-06 ', 'paw.jpg'),
(7, 6, 'Honey', 'Cachorro', 'Femêa', 'bundog', '2023-05-06 ', 'ban.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` int(30) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `fk_empresas_cnpj` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `password`, `foto`, `fk_empresas_cnpj`) VALUES
(1, 'sei lakkkk', 'admin', 12345, 'Bugatti.jpg', NULL),
(6, 'Eu mesmo', 'ahaha@gmail.com', 12345, 'sandro.jpg', NULL),
(7, 'asjifhnd]pf', 'ahha@gmail.com', 0, '', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices para tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_usuarios_4` (`fk_empresas_cnpj`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `cnpj` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_usuarios_4` FOREIGN KEY (`fk_empresas_cnpj`) REFERENCES `empresas` (`cnpj`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
