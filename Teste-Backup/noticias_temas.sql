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
-- Estrutura da tabela `noticias_temas`
--

CREATE TABLE `noticias_temas` (
  `id` int(10) UNSIGNED NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titulo` varchar(240) NOT NULL DEFAULT '',
  `identificador` varchar(240) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias_temas`
--

INSERT INTO `noticias_temas` (`id`, `pdate`, `titulo`, `identificador`) VALUES
(1, '2012-07-13 01:53:12', 'Economia', 'Economia'),
(2, '2012-07-13 02:00:34', 'Esportes', 'Esportes'),
(3, '2012-07-13 02:00:40', 'Cotidiano', 'Cotidiano'),
(4, '2012-07-13 02:00:51', 'Segurança', 'Segurança'),
(5, '2012-07-13 02:00:58', 'Opinião', 'Opinião'),
(6, '2012-07-13 02:01:11', 'Política', 'Política'),
(7, '2012-07-13 02:01:16', 'Saúde', 'Saúde'),
(8, '2012-07-13 02:01:25', 'Variedades', 'Variedades'),
(9, '2013-11-28 12:19:40', 'Região', 'Região'),
(10, '2019-05-31 21:08:26', 'Conteúdo Publicitário', 'Conteúdo Publicitário');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias_temas`
--
ALTER TABLE `noticias_temas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdate` (`pdate`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias_temas`
--
ALTER TABLE `noticias_temas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
