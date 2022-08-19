-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25-Jun-2022 às 23:28
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
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `sobrenome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `celular`, `genero`, `senha`) VALUES
(7, 'Miguel', 'Abreu', 'de_lemos@gmail.com', '27595845125', 'MASCULINO', '$2y$10$kGi/8DPiY4AwGMJ3XQuowObHr0F7Lmf8T4ROmHVo5gv.0TS54IA.W'),
(27, 'juan', 'ferreira', 'juan@gmail.com', '27999888777', 'MASCULINO', '$2y$10$SQTv6JgZm3QkNwTVniHuH.KWBK4BsMLlDsEYl0ddIXbXP6hP7hG4a'),
(34, 'Lavinia', 'Mariano', 'Lala@outlook.com', '27 997330514', 'FEMININO', '$2y$10$pTnC2Mw.7JDkD0pXfwjC..DfuSRtv1WHE9Tt3eQxz8X.77ioy129W');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
