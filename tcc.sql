-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12/12/2023 às 21:03
-- Versão do servidor: 10.5.20-MariaDB
-- Versão do PHP: 7.3.33

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
DROP DATABASE if exists tcc; 
CREATE DATABASE tcc;
USE tcc;

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
(85, 67, 27, '24.756.474/5345-23', 'Banho e Tosa', '2023-12-06', '11:00:00', 'concluido', 'blue'),
(86, 66, 32, '24.756.474/5345-23', 'Banho', '2023-12-16', '11:00:00', 'concluido', 'blue'),
(87, 66, 32, '24.756.474/5345-23', 'Banho', '2023-12-06', '09:30:00', 'concluido', 'blue'),
(88, 67, 27, '24.756.474/5345-23', 'Banho', '2023-12-15', '12:30:00', 'Inconcluido', '#ff0000');

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
(50, 4, 'Muito bom', '2023-12-04 14:04:37', NULL, '12.123.123/1231-23', 66),
(51, 4, 'Os funcionários são muito atenciosos', '2023-12-04 20:03:09', NULL, '12.123.123/1231-23', 67);

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
('12.123.123/1231-23', 'AgroPet', 'Rua José Fontoura Costa, 140', '(15) 9924-3534', 'R$100', 'R$120', 'sim.jpg', 'Deixe seu Pet sob nossos cuidados, e ele voltará bonito e cheiroso como nunca antes', 'Sorocaba', 'Campolim', 'São Paulo'),
('12.345.678/9012-34', 'Patas Felizes', 'Avenida das Patinhas, 678', '(51) 6789-0123', 'R$40', 'R$60', 'petbanho.jpg', 'Aqui suas patas felizes são a nossa prioridade. Cuide conosco!', 'Porto Alegre', 'Moinhos de Vento', 'Rio Grande do Sul'),
('23.456.789/0123-45', 'Pet Amigo', 'Rua dos Amigos, 789', '(41) 5678-9012', 'R$70', 'R$90', 'petamigo.jpg', 'Amamos animais tanto quanto você. Cuide bem do seu pet no Pet Amigo', 'Curitiba', 'Batel', 'Paraná'),
('24.756.474/5345-23', 'Pet Legal', 'Rua 4 de Março', '(15) 9945-8656', 'R$23', 'R$70', 'petlegal.jpg', 'Nos somos muito legai e vamos deixar seu pet legal ', 'Sorocaba', 'Cajuru do Sul', 'São Paulo'),
('32.109.876/0001-17', 'Pet Felicidade', 'Rua da Felicidade, 234', '(15) 4321-0987', 'R$75', 'R$95', 'petbrinquedo.jpg', 'Proporcione momentos de pura felicidade ao seu pet. Venha nos visitar!', 'Sorocaba', 'Jardim Santa Rosália', 'São Paulo'),
('34.567.567/5678-56', 'Pet Charme', 'Avenida das Flores, 78', '(11) 9876-5432', 'R$80', 'R$100', 'petshop2.jpg', 'Proporcionamos o melhor para o seu pet. Venha nos visitar!', 'Sorocaba', 'Vila Helena', 'São Paulo'),
('43.210.987/0001-16', 'Pet Vip Sorocaba', 'Av. VIP, 987', '(15) 7654-3210', 'R$95', 'R$115', 'petsorriso.jpg', 'Tratamento VIP para o seu pet. Garanta o conforto que ele merece!', 'Sorocaba', 'Vila Progresso', 'São Paulo'),
('45.678.901/2345-67', 'PetsFelizes', 'Rua das Alegrias, 567', '(22) 8765-4321', 'R$60', 'R$80', 'petespuma.jpg', 'Seu pet merece o melhor cuidado. Traga-o para PetsFelizes!', 'Sorocaba', 'Jardim Simus', 'Rio de Janeiro'),
('54.321.098/0001-15', 'Happy Neko', 'Avenida Felicidade, 890', '(51) 6789-0123', 'R$45', 'R$65', 'happyneko.jpg', 'Aqui, suas patas serão as mais felizes. Cuide do seu pet conosco!', 'Porto Alegre', 'Moinhos de Vento', 'Rio Grande do Sul'),
('65.432.109/0001-14', 'Charme Pet', 'Av. do Charme, 567', '(19) 3456-7890', 'R$85', 'R$105', 'petcharme.jpg', 'Seu pet merece o charme que só encontrará aqui. Venha nos conhecer!', 'Campinas', 'Cambuí', 'São Paulo'),
('67.890.123/4567-89', 'Amor aos Bichos', 'Alameda dos Bichinhos, 456', '(19) 3456-7890', 'R$90', 'R$110', 'amorgato.jpg', 'Dedicação e amor para deixar seu pet radiante. Venha nos conhecer!', 'Campinas', 'Cambuí', 'São Paulo'),
('76.543.210/0001-13', 'Bicho Chic', 'Rua da Elegância, 123', '(15) 2345-6789', 'R$80', 'R$100', 'petchique.jpg', 'No Bicho Chic, seu pet terá o tratamento mais sofisticado. Venha conferir!', 'Sorocaba', 'Wanel Ville', 'São Paulo'),
('87.654.321/0001-12', 'Pet Encanto', 'Av. da Alegria, 789', '(15) 8765-4321', 'R$90', 'R$110', 'petencanto.jpg', 'Proporcionamos momentos encantadores para o seu pet. Visite-nos agora!', 'Sorocaba', 'Jardim Europa', 'São Paulo'),
('89.012.345/6789-01', 'Cão e Gato Mimos', 'Av. dos Mimados, 123', '(31) 1234-5678', 'R$80', 'R$100', 'cagato.jpg', 'Aqui seu pet é tratado com muito carinho e atenção', 'Belo Horizonte', 'Savassi', 'Minas Gerais'),
('98.765.432/0001-11', 'Pet Amigo Sorocaba', 'Rua das Amizades, 456', '(15) 1234-5678', 'R$75', 'R$95', '', 'Cuidamos do seu pet como se fosse nosso melhor amigo. Venha nos visitar!', 'Sorocaba', 'Vila Helena', 'São Paulo');

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
(25, 67, 'Bob', 'Cachorro', 'Macho', ' Basenji ', '2023-11-28', 'petespuma.jpg'),
(26, 67, 'Tico', 'Cachorro', 'Macho', ' Akita Americano ', '2023-11-28', 'cachorro-triste-capa.png'),
(27, 67, 'Teco', 'Gato', 'Macho', 'Angorá', '2023-11-30', 'petcharme.jpg'),
(31, 67, 'Bito', 'Gato', 'Macho', 'Birmanês', '2023-11-27', 'gatinho.jpg'),
(32, 66, 'Tobias', 'Cachorro', 'Macho', ' Beagle ', '2019-09-26', 'tobias.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fk_empresas_cnpj` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `password`, `foto`, `fk_empresas_cnpj`) VALUES
(66, 'Thomas', 'Thomas12@gmail.com', '12345', 'Thomas.jpg', NULL),
(67, 'Carlinhos', 'Carlinhos12@gmail.com', '12345', 'carlinhos.jpg', NULL),
(68, 'Empresario', 'Empresario@gmail.com', '12345', 'terno.jpg', '24.756.474/5345-23');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
