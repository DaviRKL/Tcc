-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2023 às 16:50
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
  `id_tutor` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `id_empresa` int(20) NOT NULL,
  `servico` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL CHECK (`horario` in ('09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00')),
  `status` varchar(12) DEFAULT 'Inconcluido',
  `eventColor` varchar(7) DEFAULT '#ff0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_tutor`, `id_pet`, `id_empresa`, `servico`, `data`, `horario`, `status`, `eventColor`) VALUES
(6, 2, 0, 0, 'Banha e Tobas', '2023-05-07', '10:30:00', NULL, 'blue'),
(40, 1, 6, 23456469, 'Banho', '2023-09-05', '13:00:00', NULL, 'blue'),
(44, 1, 1, 23456467, 'Banho e Tosa', '2023-09-05', '15:30:00', NULL, 'blue'),
(45, 1, 6, 23456467, 'Banho e Tosa', '2023-09-06', '10:00:00', NULL, 'blue'),
(46, 1, 1, 23456467, 'Banho e Tosa', '2023-09-07', '11:30:00', NULL, 'blue'),
(51, 1, 1, 23456467, 'Banho e Tosa', '2023-09-28', '13:30:00', NULL, 'blue'),
(53, 1, 1, 23456467, 'Banho e Tosa', '2023-09-28', '10:00:00', NULL, 'blue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrouses`
--

CREATE TABLE `carrouses` (
  `id` int(11) NOT NULL,
  `imagen_carousel` varchar(220) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `carrouses`
--

INSERT INTO `carrouses` (`id`, `imagen_carousel`, `nome`) VALUES
(1, 'slide1.jpg', 'Curso um'),
(2, 'slide3.jpg', 'Curso dois'),
(3, 'slide1.jpg', 'Artigo um'),
(4, 'slide3.jpg', 'Artigo dois');

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
  `precoTosa` int(4) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `sobre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`cnpj`, `nome`, `endereço`, `telefone`, `precoBanho`, `precoTosa`, `foto`, `sobre`) VALUES
(23456467, 'TESTAndo', 'isso ai', '23453454', 22, 24, 'banban.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaanecloremaaaaaaaaaaaaaaaaaaaaaaaa.'),
(23456468, 'Gigas Shop', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKAAAAAAA', '244324', 5, 19, 'zoi.jpg', NULL),
(23456469, 'Gigas Shop', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '', 0, 0, '', NULL),
(23456470, '', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', '', 0, 0, '', NULL),
(23456471, 'Gigas Shop', 'pokebola', '244324', 122, 21312, '', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKMMMMMMMMMMMMMMMMMMMMM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `datanasc` varchar(11) NOT NULL,
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
  `password` varchar(30) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `fk_empresas_cnpj` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `password`, `foto`, `fk_empresas_cnpj`) VALUES
(1, 'sei lakkkk', 'admin@admin.com', '12345', 'Bugatti.jpg', NULL),
(6, 'Eu mesmo', 'ahaha@gmail.com', '12345', 'sandro.jpg', NULL),
(7, 'asjifhnd]pf', 'ahha@gmail.com', '0', '', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carrouses`
--
ALTER TABLE `carrouses`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `carrouses`
--
ALTER TABLE `carrouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `cnpj` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23456472;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
