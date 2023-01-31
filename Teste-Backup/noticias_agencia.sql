-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30-Jan-2023 às 16:55
-- Versão do servidor: 5.5.68-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `canalicara_bdportal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_agencia`
--

CREATE TABLE `noticias_agencia` (
  `id` int(10) UNSIGNED NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titulo` varchar(240) NOT NULL DEFAULT '',
  `identificador` varchar(240) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias_agencia`
--

INSERT INTO `noticias_agencia` (`id`, `pdate`, `titulo`, `identificador`) VALUES
(1, '2013-11-01 02:21:39', 'Jornal da Manhã', 'jornal-da-manha'),
(2, '2013-11-01 02:21:51', 'Jornal Agora', 'jornal-agora'),
(3, '2013-11-01 02:22:04', 'Jornal Gazeta', 'jornal-gazeta'),
(4, '2013-11-01 02:22:23', 'Rádio Cidadania Digital (104,9 FM)', 'radio-cidadania-digital'),
(5, '2014-06-17 02:40:02', 'Jornal do Rincão', 'jornal-do-rincao'),
(6, '2014-07-30 16:43:56', 'WebTV Semar', 'webtv-semear'),
(7, '2016-01-08 00:26:25', 'Jornal Diário de Notícias', 'jornal-diario-de-noticias'),
(8, '2016-01-08 00:26:39', 'Rádio Difusora', 'radio-difusora'),
(9, '2017-11-15 17:52:57', 'Inoova Comunicação', 'inoova-comunicacao'),
(10, '2019-09-27 12:45:18', 'Jornal Nosso Rincão', 'jornal-nosso-rincao'),
(11, '2020-12-06 21:36:45', 'Inoova - CDL de Içara', 'inoova-cdlicara'),
(12, '2020-12-06 21:37:02', 'Inoova - ACI Içara', 'inoova-aciicara'),
(13, '2020-12-06 21:37:21', 'Inoova - Hospital São Donato', 'inoova-hospitalsaodonato'),
(14, '2020-12-06 21:37:46', 'Inoova - Sindilojas de Içara e Região', 'inoova-sindilojasicaraeregiao');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias_agencia`
--
ALTER TABLE `noticias_agencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdate` (`pdate`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias_agencia`
--
ALTER TABLE `noticias_agencia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
