-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Ago-2022 às 13:14
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

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `meu_plano_estudo`
--
ALTER TABLE `meu_plano_estudo`
  ADD PRIMARY KEY (`id`,`data_prova`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `meu_plano_estudo`
--
ALTER TABLE `meu_plano_estudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
