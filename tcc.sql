-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/10/2023 às 21:16
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
(6, 1, 1, '12.345.555/5555-55', 'Banha e Tobas', '2023-10-25', '10:30:00', NULL, 'blue'),
(40, 1, 6, '23456469', 'Banho', '2023-09-05', '13:00:00', NULL, 'blue'),
(44, 1, 1, '23456467', 'Banho e Tosa', '2023-09-05', '15:30:00', NULL, 'blue'),
(45, 1, 6, '23456467', 'Banho e Tosa', '2023-09-06', '10:00:00', NULL, 'blue'),
(46, 1, 1, '23456467', 'Banho e Tosa', '2023-09-07', '11:30:00', NULL, 'blue'),
(51, 1, 1, '23456467', 'Banho e Tosa', '2023-09-28', '13:30:00', NULL, 'blue'),
(53, 1, 1, '23456467', 'Banho e Tosa', '2023-09-28', '10:00:00', NULL, 'blue');

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
  `id_empresa` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `qtd_estrela`, `mensagem`, `created`, `modified`, `id_empresa`, `id_usuario`) VALUES
(1, 4, 'O tutorial ajudou no meu trabalho.', '2023-09-16 12:02:27', NULL, NULL, NULL),
(2, 5, 'Ótimo tutorial.', '2023-09-16 12:02:56', NULL, NULL, NULL),
(3, 5, 'KAKKAKAKAKAKAKA MUITO BOM', '2023-10-20 18:50:48', NULL, NULL, NULL),
(4, 4, 'MUITO RUIM NAAAAAAAAAAo', '2023-10-20 19:15:01', NULL, '0', NULL),
(5, 3, 'AS IDEIA KAKAKAKAKKAKAKKAKAKAKKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2023-10-20 14:36:55', NULL, NULL, NULL),
(6, 2, 'KAKAKAKKAKA', '2023-10-20 14:48:02', NULL, NULL, NULL),
(7, 4, 'KAKFNA`PSFNA agora vai', '2023-10-20 14:54:46', NULL, '0', NULL),
(8, 4, 'AGORA FOI AMEM', '2023-10-20 14:56:32', NULL, '23456467', 6),
(9, 5, 'KAKAKAKAKA FUNCIONA', '2023-10-20 22:00:04', NULL, '23456467', 7),
(10, 5, 'KAKAKKAKAKAK FOI', '2023-10-20 22:04:51', NULL, '23456467', 1),
(12, 2, 'Aqui tem outras oia', '2023-10-20 22:06:53', NULL, '23456468', 6),
(14, 4, 'Mais uma', '2023-10-21 10:40:09', NULL, '23456468', 6),
(15, 3, 'Testando id', '2023-10-21 11:12:44', NULL, '23456468', 1),
(16, 2, 'IDEEEEEEEE', '2023-10-21 11:13:57', NULL, '23456468', 1);

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
  `endereço` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `precoBanho` varchar(6) DEFAULT NULL,
  `precoTosa` varchar(6) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sobre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`cnpj`, `nome`, `endereço`, `telefone`, `precoBanho`, `precoTosa`, `foto`, `sobre`) VALUES
('12.222.222/2222-22', 'CAlma CNPJOTO', 'Rua 4', '(12) 3424-3534', '0', '0', 'Captura de tela 2022-07-22 113751.png', 'HAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
('12.345.555/5555-55', 'Super Pets', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '', '0', '0', 'cachorroagenda.jpg', 'AHAHAHHAHAHAHAHHAAHHAHHAH'),
('12.345.668/8676-66', 'Gigas Shop', 'Rua 4', '(12) 3424-3534', 'R$23', 'R$435', 'sorveteW.png', 'qwerqwerqr2q3'),
('12.354.523/3265-68', 'VAOGMO VER', 'Rua 4', '(12) 3424-3534', 'R$23', 'R$435', '', 'ISSO AI'),
('23.456.546/6000-00', 'AGORA VAAAAAAAA', 'Rua 4', '(12) 3424-3534', 'R$23', 'R$435', '', 'ISSO AI'),
('23456467', 'TESTAndo', 'isso ai', '23453454', '22', '24', 'banban.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaanecloremaaaaaaaaaaaaaaaaaaaaaaaa.'),
('23456468', 'Gigas Shop', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKAAAAAAA', '244324', '5', '19', 'zoi.jpg', NULL),
('23456470', 'PAW Patrol', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', '', '0', '0', 'paw.jpg', 'SIM isso meesmo'),
('23456471', 'Gigas Shop', 'pokebola', '244324', '122', '21312', 'ban.jpg', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKMMMMMMMMMMMMMMMMMMMMM'),
('23456472', 'Adoro Banho', 'pokebola', '244324', '540', '2345', 'woof.jpg', 'HAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
('23456473', 'Na0 de banho', 'pokebola', '214334', '1234', '3531', 'petxopi.jpg', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKMMMMMMMMMMMMMMMMMMMMM'),
('23456474', 'Mais um ', 'KAKAKA', '123123', '231421', '214748', 'desafios-administracao-petshop.jpg', 'ISSO AI'),
('23456475', 'LALALALA1', 'Pao', '3123123123', '213', '412', 'cachorro.jpg', 'HA HA HA'),
('34.645.765/7856-42', 'TESTUDA', 'Rua Mongol', '(13) 1231-2312', 'R$123', 'R$324', '', 'SEI LA'),
('34.986.980/3423-47', 'Gigas Shop', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '(12) 3424-3534', 'R$23', 'R$435', '', 'dadasdasds'),
('67.678.478/0782-21', 'TESTUDA', 'Rua Mongol', '(13) 1231-2312', 'R$123', 'R$324', '', 'SEI LA'),
('68.704.382/0005-56', 'VAMO LAAAA', 'pokebola', '(12) 3424-3534', 'R$23', 'R$435', '', 'COMON BAFSPAD');

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
(1, 1, 'Cao chupando manga', 'Cachorro', 'Macho', 'bundog', '2023-07-14 ', 'cachorroagenda.jpg'),
(6, 1, 'Happy', 'Cachorro', 'Macho', 'Macho', '2023-05-06 ', 'paw.jpg'),
(7, 6, 'Honey', 'Cachorro', 'Femêa', 'bundog', '2023-05-06 ', 'ban.jpg');

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
(1, 'sei lakkkk', 'admin@admin.com', '12345', 'Bugatti.jpg', ''),
(6, 'Eu mesmo', 'ahaha@gmail.com', '12345', 'sandro.jpg', '12.345.555/5555-55'),
(7, 'asjifhnd]pf', 'ahha@gmail.com', '0', '', ''),
(45, 'BOris Johnson', 'naosei@gmail.com', '12345', '', NULL),
(46, 'Joberson', 'naosei@gmail.com', '123232', '', NULL),
(47, 'ghgdfhg', 'naosei@gmail.com', '123', '', NULL),
(48, 'Zoro', 'naosei@gmail.com', '1231234123', '', NULL),
(49, 'Joberson', 'naosei@gmail.com', '12345', 'banco.jpg', ''),
(50, 'Joberson', 'naosei@gmail.com', '23343', '', ''),
(51, 'ghgdfhg', 'naosei@gmail.com', '213123', '', ''),
(52, 'Joberson', 'naosei@gmail.com', 'pao', '', ''),
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
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_usuarios_4` (`fk_empresas_cnpj`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `carrouses`
--
ALTER TABLE `carrouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
