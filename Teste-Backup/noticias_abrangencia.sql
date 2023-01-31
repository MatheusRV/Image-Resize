-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30-Jan-2023 às 16:54
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
-- Estrutura da tabela `noticias_abrangencia`
--

CREATE TABLE `noticias_abrangencia` (
  `id` int(10) UNSIGNED NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titulo` varchar(240) NOT NULL DEFAULT '',
  `identificador` varchar(240) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias_abrangencia`
--

INSERT INTO `noticias_abrangencia` (`id`, `pdate`, `titulo`, `identificador`) VALUES
(1, '2015-02-17 18:11:09', 'Içara', 'icara'),
(2, '2015-02-17 18:11:20', 'Região', 'regiao'),
(3, '2015-02-17 18:11:28', 'Estado', 'santa-catarina'),
(4, '2015-02-17 18:11:36', 'Brasil', 'brasil'),
(5, '2015-02-17 18:11:42', 'Mundo', 'mundo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias_abrangencia`
--
ALTER TABLE `noticias_abrangencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdate` (`pdate`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias_abrangencia`
--
ALTER TABLE `noticias_abrangencia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
