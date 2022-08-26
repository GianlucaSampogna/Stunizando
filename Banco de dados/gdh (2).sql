-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Ago-2022 às 13:16
-- Versão do servidor: 5.6.51
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gdh`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `meu_plano_estudo`
--

CREATE TABLE `meu_plano_estudo` (
  `inicio_data` date NOT NULL,
  `data_prova` date NOT NULL,
  `portugues` int(11) NOT NULL,
  `matematica` int(11) NOT NULL,
  `geografia` int(11) NOT NULL,
  `historia` int(11) NOT NULL,
  `quimica` int(11) NOT NULL,
  `fisica` int(11) NOT NULL,
  `biologia` int(11) NOT NULL,
  `hrs_seg` int(11) NOT NULL,
  `hrs_ter` int(11) NOT NULL,
  `hrs_qua` int(11) NOT NULL,
  `hrs_qui` int(11) NOT NULL,
  `hrs_sex` int(11) NOT NULL,
  `hrs_sab` int(11) NOT NULL,
  `hrs_dom` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(100) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `sobrenome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `celular`, `genero`, `senha`) VALUES
(7, 'Miguel', 'Abreu', 'de_lemos@gmail.com', '27595845125', 'MASCULINO', '$2y$10$kGi/8DPiY4AwGMJ3XQuowObHr0F7Lmf8T4ROmHVo5gv.0TS54IA.W'),
(27, 'juan', 'ferreira', 'juan@gmail.com', '27999888777', 'MASCULINO', '$2y$10$SQTv6JgZm3QkNwTVniHuH.KWBK4BsMLlDsEYl0ddIXbXP6hP7hG4a'),
(34, 'Lavinia', 'Mariano', 'Lala@outlook.com', '27 997330514', 'FEMININO', '$2y$10$pTnC2Mw.7JDkD0pXfwjC..DfuSRtv1WHE9Tt3eQxz8X.77ioy129W'),
(35, 'fdssdsacdsa', 'adsc', 'Lala@outlook.com', '27 997330514', 'MASCULINO', '$2y$10$7zH9w560HVV317h7.Bwq1ulkuvBUJNU/XU4V6zSSV/TmpuZjvLE4W'),
(36, 'Gianluca', 'Sampogna', 'gianlucascalzisampogna@gmail.com', '27997330514', 'MASCULINO', '$2y$10$Ha8OeIB78GXRLmMdk.KF6ejEGqO.gmhyDQZ3zdNNBtNOG4cCBwvl.'),
(37, 'asd', 'asd', 'asd@a.c', '27 997330514', 'P', '$2y$10$94X5OUjkWoBoWJqg7JGdGezFRDgBob8bRKL5B6gYbN4ptYv/vknAy'),
(38, 'bruno', 'atila', 'brunoatila@gmail.com', '27999994855', 'MASCULINO', '$2y$10$j87gQk6Sp.4huyn3cBKq3eFq0s6XbWb7vQlgP7uwaJ93mXbYOcJq.'),
(39, 'gian', 'liuca', 'gian@gmail.com', '25154145145', 'MASCULINO', '$2y$10$o.JNBeLiZqS0WidWmd76feL1WIFdpFPE/lLDmaLYDZiGlQqjztogW'),
(40, 'dsad', 'asdas', 'gian@gmail.com', '145145145', 'MASCULINO', '$2y$10$.uMxWXwLDj3hkTzCvCcMWunzoymndVM3EBNkKBpeODFEeMnUJCGgS'),
(41, 'gianluca', 'sampogna', 'gianlucascalzisampogna@gmail.com', '27997330514', 'MASCULINO', '$2y$10$czMj3Y8H92mmKre1y6xdfu/LbEPlYjndN9SVeoF8atgqUUNhf0SN2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `meu_plano_estudo`
--
ALTER TABLE `meu_plano_estudo`
  ADD PRIMARY KEY (`id`,`data_prova`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `meu_plano_estudo`
--
ALTER TABLE `meu_plano_estudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
