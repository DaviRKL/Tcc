-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2023 às 16:25
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `id_empresa` varchar(20) NOT NULL,
  `servico` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL CHECK (`horario` in ('09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00')),
  `status` varchar(12) DEFAULT 'Inconcluido',
  `eventColor` varchar(7) DEFAULT '#ff0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_tutor`, `id_pet`, `id_empresa`, `servico`, `data`, `horario`, `status`, `eventColor`) VALUES
(61, 45, 13, '12.222.222/2222-22', 'banho e tobas', '2023-05-09', '10:00:00', 'Inconcluido', '#ff0000'),
(62, 45, 13, '12.222.222/2222-22', 'banho e tobas', '2023-12-11', '10:00:00', 'Inconcluido', '#ff0000'),
(63, 45, 13, '12.222.222/2222-22', 'banho e tobas', '2023-11-12', '10:00:00', 'Inconcluido', '#ff0000'),
(64, 45, 13, '12.345.555/5555-55', 'Banho', '2023-11-13', '10:30:00', 'Inconcluido', '#ff0000'),
(65, 45, 13, '12.222.222/2222-22', 'Banho e Tosa', '2023-11-22', '11:00:00', 'Inconcluido', '#ff0000'),
(66, 45, 13, '12.345.668/8676-66', 'Banho e Tosa', '2023-11-14', '11:30:00', 'Inconcluido', '#ff0000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `qtd_estrela` int(11) NOT NULL,
  `mensagem` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `id_empresa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `qtd_estrela`, `mensagem`, `created`, `modified`, `id_empresa`, `id_usuario`) VALUES
(19, 4, 'ahfdhdfhd', '2023-11-12 10:44:26', NULL, '23456468', 6),
(28, 4, '1312323sdfsdg', '2023-11-12 11:14:12', NULL, '12.345.555/5555-55', 6),
(29, 4, 'LALALA', '2023-11-12 11:16:11', NULL, '12.345.555/5555-55', 6),
(30, 4, 'LALALA', '2023-11-12 11:16:29', NULL, '12.345.555/5555-55', 6),
(31, 4, 'LALALA', '2023-11-12 11:19:32', NULL, '12.345.555/5555-55', 6),
(32, 4, 'sdgdsfg', '2023-11-12 11:19:36', NULL, '12.345.555/5555-55', 6),
(33, 4, 'sdgdsfg', '2023-11-12 11:21:03', NULL, '12.345.555/5555-55', 6),
(34, 3, 'q34234234', '2023-11-12 11:21:08', NULL, '12.345.555/5555-55', 6),
(35, 3, 'q34234234', '2023-11-12 11:21:49', NULL, '12.345.555/5555-55', 6),
(36, 3, '4r23423423', '2023-11-12 11:21:53', NULL, '12.345.555/5555-55', 6),
(37, 3, '4r23423423', '2023-11-12 11:26:39', NULL, '12.345.555/5555-55', 6),
(38, 4, 'aweqwqw', '2023-11-12 11:26:43', NULL, '12.345.555/5555-55', 6),
(39, 4, 'aweqwqw', '2023-11-12 11:27:21', NULL, '12.345.555/5555-55', 6),
(40, 4, 'qweq', '2023-11-12 11:27:25', NULL, '12.345.555/5555-55', 6),
(41, 4, 'qweq', '2023-11-12 11:32:15', NULL, '12.345.555/5555-55', 6),
(42, 4, 'LALALA', '2023-11-12 11:32:28', NULL, '12.345.555/5555-55', 6),
(43, 4, 'LALALA', '2023-11-12 11:35:07', NULL, '12.345.555/5555-55', 6),
(44, 4, 'LALALA', '2023-11-12 11:35:28', NULL, '12.345.555/5555-55', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrouses`
--

CREATE TABLE `carrouses` (
  `id` int(11) NOT NULL,
  `imagen_carousel` varchar(220) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `carrouses`
--

INSERT INTO `carrouses` (`id`, `imagen_carousel`, `nome`) VALUES
(1, 'slide1.jpg', 'Curso um'),
(2, 'slide3.jpg', 'Curso dois'),
(3, 'slide1.jpg', 'Artigo um'),
(4, 'slide3.jpg', 'Artigo dois');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `cnpj` varchar(20) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `endereço` varchar(500) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `precoBanho` varchar(6) DEFAULT NULL,
  `precoTosa` varchar(6) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sobre` varchar(500) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`cnpj`, `nome`, `endereço`, `telefone`, `precoBanho`, `precoTosa`, `foto`, `sobre`, `cidade`, `bairro`, `estado`) VALUES
('12.222.222/2222-22', 'CAlma CNPJOTO', 'Rua 4', '(12) 3424-3534', '0', '0', 'Captura de tela 2022-07-22 113751.png', 'HAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', NULL, NULL, NULL),
('12.345.555/5555-55', 'Super Pets', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '', '0', '0', 'cachorroagenda.jpg', 'AHAHAHHAHAHAHAHHAAHHAHHAH', 'Campinas', 'Nao sei', 'São Paulo'),
('12.345.668/8676-66', 'Gigas Shop', 'Rua 4', '(12) 3424-3534', 'R$23', 'R$435', 'Ban.jpg', 'qwerqwerqr2q3', 'Sorocaba', 'Campolim', 'São Paulo'),
('12.480.235/7459-03', 'Cidades ', 'pokebola', '(12) 3124-3534', 'R$123', 'R$123', '', '42342452345re´gi0o9~hkudfhgedf´ger', 'Sorocaba', 'Sei la', 'São Paulo'),
('23456467', 'TESTAndo', 'isso ai', '23453454', '22', '24', 'banban.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaanecloremaaaaaaaaaaaaaaaaaaaaaaaa.', NULL, NULL, NULL),
('23456468', 'Gigas Shop', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKAAAAAAA', '244324', '5', '19', 'zoi.jpg', NULL, NULL, NULL, NULL),
('23456470', 'PAW Patrol', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', '', '0', '0', 'paw.jpg', 'SIM isso meesmo', NULL, NULL, NULL),
('23456471', 'Gigas Shop', 'pokebola', '244324', '122', '21312', 'ban.jpg', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKMMMMMMMMMMMMMMMMMMMMM', NULL, NULL, NULL),
('23456472', 'Adoro Banho', 'pokebola', '244324', '540', '2345', 'woof.jpg', 'HAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', NULL, NULL, NULL),
('23456473', 'Na0 de banho', 'pokebola', '214334', '1234', '3531', 'petxopi.jpg', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKMMMMMMMMMMMMMMMMMMMMM', NULL, NULL, NULL),
('23456474', 'Mais um ', 'KAKAKA', '123123', '231421', '214748', 'desafios-administracao-petshop.jpg', 'ISSO AI', NULL, NULL, NULL),
('23456475', 'LALALALA1', 'Pao', '3123123123', '213', '412', 'cachorro.jpg', 'HA HA HA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pets`
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
-- Despejando dados para a tabela `pets`
--

INSERT INTO `pets` (`id`, `id_tutor`, `nome`, `tipo`, `sexo`, `raca`, `datanasc`, `foto`) VALUES
(7, 6, 'Honey', 'Cachorro', 'Femêa', 'bundog', '2023-05-06 ', 'ban.jpg'),
(13, 45, 'Cao chupando manga', 'Cachorro', 'Macho', ' American Bully ', '2023-11-11', 'sim.jpg'),
(14, 45, 'Cao chupando manga 2', 'Gato', 'Femea', 'Bobtail Americano', '2023-11-13', 'sim.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `fk_empresas_cnpj` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `password`, `foto`, `fk_empresas_cnpj`) VALUES
(6, 'Eu mesmo', 'ahaha@gmail.com', '12345', 'sandro.jpg', '12.345.555/5555-55'),
(45, 'BOris Johnson', 'naosei@gmail.com', '12345', '', NULL),
(46, 'Joberson', 'naosei@gmail.com', '123232', '', NULL),
(47, 'ghgdfhg', 'naosei@gmail.com', '123', '', NULL),
(48, 'Zoro', 'naosei@gmail.com', '1231234123', '', NULL),
(53, 'ghgdfhg', 'naosei@gmail.com', 'paofea', '', '12.345.555/5555-55'),
(54, 'Zoro', 'naosei@gmail.com', '12321312', '', '12.345.555/5555-55'),
(55, 'teste senha', 'naosei@gmail.com', '12123123', 'bdlogo.jpg', NULL),
(56, 'Joberson', '', '123123123', 'banco.jpg', NULL),
(57, 'Zoro', 'naosei@gmail.com', 'asdrfasfdas', '', NULL),
(58, 'ghgdfhg', 'naosei@gmail.com', '12343423', 'desenvolvimento-web-linguagens', '12.345.555/5555-55');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tutor` (`id_tutor`),
  ADD KEY `id_pet` (`id_pet`,`id_empresa`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `carrouses`
--
ALTER TABLE `carrouses`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices de tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_usuarios_4` (`fk_empresas_cnpj`),
  ADD KEY `fk_empresas_cnpj` (`fk_empresas_cnpj`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `carrouses`
--
ALTER TABLE `carrouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamentos_ibfk_3` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`cnpj`);

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`cnpj`);

--
-- Restrições para tabelas `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_empresas_cnpj`) REFERENCES `empresas` (`cnpj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
